<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Validator;
use Redirect;
use Illuminate\Support\Str;
use App\Modals\Order;
use App\Modals\OrderTicket;
use App\Modals\History;
use App\User;
use App\Modals\Task;

class OrderController extends Controller
{
    public function __construct()
    {
        // echo "<pre>";print_r(Auth::user()->role_id);exit;
        if (!isset(auth()->user()->role_id)) {
            Redirect::to('/admin/')->send();
        }
    }
    /**
     * Display a listing of Orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::new()->get();
        return response()->json(['msg' => 'Orders Listing','detail' => $orders], 200);
    }
    /*
     * Add Order
     *
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $id = $request->id;
        if($id && $id != '') {
            $order = $this->update($request,$id);
            return response()->json(['msg' => 'Order Updated Successfully', 'detail' => $order], 200);
        }else{
            $data = $this->uploadData($request);
            $orders = Order::orderBy('id', 'desc')->take(count($data))->get();
            return response()->json(['msg' => 'Order Added Successfully','detail' => $orders], 200);
        }
    }

    function orderView(){
        $users = User::presale()->get();
        $user = auth()->user();
        // echo "<pre>";print_r(auth()->user()->id);exit;
        return View('support.upload',compact('users','user'));
    }

    function show($id){
        $order = Order::find($id);
        return response()->json(['msg' => 'Order fetched Successfully','detail' => $order], 200);
    }

    function update(Request $request, $id){
        $rules = [
            'hr_name'  => 'required',
            'hr_contact' => 'required',
            'hr_email' => 'sometimes',
            'hr_website' => 'sometimes',
            'emp_strength' => 'numeric|min:0',
            'gift_type' => 'sometimes',
            'gift_quantity' => 'numeric|min:0',
            'attachment' => 'sometimes'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ( $validator->fails() ) {
            return response()->json(['msg' => $validator->errors()->first()], 400);
        }
        $data = $request->validate($rules);
        // echo "<pre>";print_r($request->all());exit;
        $order = Order::find($id);
        if($request->attachment && $request->attachment != ''){
            $file = $request->file('attachment');
            $folder = storage_path('uploads');
            $ext = $file->getClientOriginalExtension();
            if ($ext) {
                $filename = Str::random(20).'.'.$ext;
            }else{
                $filename = Str::random(20);
            }
            $upload_success = $file->move($folder, $filename);
            if( $upload_success ) {
                $data['attachment'] = $filename;
            }
        }
        $order->update($data);
        // return response()->json(['msg' => 'Order Updated Successfully', 'detail' => $order], 200);
        return $order;

    }

    function supportView(Request $request){

        return View('common.support');
    }

    function commonView(){
        $page = request()->segment(2);
        $segment_third = request()->segment(3);
        switch ($page) {
            case $page != '':
                $page = request()->segment(2);
                break;
            default:
                $page = 'Dashboard';
                break;
        }
        // echo "<pre>";print_r($page);exit;
        $tickets = OrderTicket::whereStatus('received')->with('order')->get();
        $assigned_tickets = OrderTicket::whereStatus('assigned')->with('order','assignedby','assignedto')->get();
        $users = User::presaleEmployees()->get();
        $old_tickets = '';
        $user = auth()->user();
        $temp = 'template';
        if($page == 'presale') {
            $temp = 'sale-manager';
        }
        if($page == 'sale') {
            $temp = 'presale';
        }
        if($page == 'marketing' && $segment_third == '') {
            $temp = 'marketing-manager';
        }elseif($segment_third == 'employee') {
            $old_tickets = OrderTicket::whereStatus('postponed')->with('order','assignedby','assignedto')->get();
            $temp = 'mark-employee';
        }
        return View('common.'.$temp,compact('page','user','tickets','users','assigned_tickets','old_tickets'));
    }

    function saveRow(Request $request){
        $rules = [
            'ticket_id'         => 'required|exists:tickets,id',
            'employee_id' => 'sometimes|exists:users,id',
            'status'         => 'sometimes',
            'allRemarks'         => 'sometimes'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ( $validator->fails() ) {
            return response()->json(['msg' => $validator->errors()->first()], 400);
        }
        $ticket = OrderTicket::find($request->ticket_id);
        $order = Order::find($ticket->order_id);
        if($request->has('status')) {
            $ticket->status = $request->status;
        }
        $ticket->assigned_by = auth()->user()->id;
        if($request->has('employee_id')) {
            $ticket->assigned_to = $request->employee_id;
        }
        if($request->has('employee_id')) {
            $historyData = [
                'assigned_by' => auth()->user()->id,
                'assigned_to' => $request->employee_id ? : $ticket->assigned_to,
                'ticket_id' => $ticket->id
            ];
            History::insert($historyData);
        }
        if($order && $request->has('allRemarks') && count($request->allRemarks) > 0) {
            $order->remark = $request->allRemarks['remark'] ? : $order->remark;
            if(isset($request->allRemarks['manager_remark'])){
                $order->manager_remark = $request->allRemarks['manager_remark'] ? : $order->manager_remark;
            }
            if(isset($request->allRemarks['marketing_remark'])){
                $order->marketing_remark = $request->allRemarks['marketing_remark'] ? : $order->marketing_remark;
            }
            if(isset($request->allRemarks['admin_remark'])){
                $order->admin_remark = $request->allRemarks['admin_remark'] ? : $order->admin_remark;
            }
            if(isset($request->allRemarks['verification_remark'])){
                $order->verification_remark = $request->allRemarks['verification_remark'] ? : $order->verification_remark;
            }
        }
        if($request->has('marketing_rating')) {
            $order->marketing_rating = $request->marketing_rating;
        }
        if($request->has('presale_rating')) {
            $order->presale_rating = $request->presale_rating;
        }
        $order->save();
        $ticket->save();
        $ticket->with('order');
        $ticket->assigned_by = User::find($ticket->assigned_by);
        $ticket->assigned_to = User::find($ticket->assigned_to);
        // echo "<pre>";print_r($order);exit;
        return response()->json(['msg' => 'Record Updated Successfully', 'detail' => $ticket], 200);
    }

    function publishView(){
        $users = User::marketing()->get();
        $assigned_tickets = OrderTicket::whereStatus('assigned')->with('order','assignedby','assignedto')->get();
        return View('support.marketing',compact('assigned_tickets','users'));
    }

    function giftHistory(){
        $users = User::presale()->get();
        $user = auth()->user();
        return View('support.gifts',compact('users','user'));
    }

    function publishOrder(Request $request){
        $rules = [
            'order_ids'         => 'required|array',
            'assigned_by'       => 'required|exists:users,id',
            'assigned_to'       => 'required|exists:users,id',
            'status'         => 'sometimes'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ( $validator->fails() ) {
            return response()->json(['msg' => $validator->errors()->first()], 400);
        }
        $ticketData = [];
        // $data = $request->validate($rules);
        foreach($request->order_ids as $orderid){
            $insrData = [
                'order_id' => $orderid,
                'assigned_by' => $request->assigned_by,
                'assigned_to' => $request->assigned_to,
                'status' => $request->status ? $request->status : 'received'
            ];
            if($request->has('publish_type')) {
                $historyData = [
                    'assigned_by' => $request->assigned_by,
                    'assigned_to' => $request->assigned_to,
                    'ticket_id' => $orderid
                ];
                $ticket = OrderTicket::find($orderid);
                if($ticket) {
                    History::insert($historyData);
                }
                $ticket->assigned_by = $request->assigned_by;
                $ticket->assigned_to = $request->assigned_to;
                $ticket->save();
            } else {
                $order = Order::find($orderid);
                if($order) {
                    $order->assigned = 1;
                    $order->save();
                    $insrData['company'] = $order->company;
                    $insrData['area'] = $order->area;
                }
                $insrData['ticketno'] = self::generateRandomString(6);
            }
            $ticketData[] = $insrData;
            // echo "<pre>";print_r($orderid);

        }
        // echo "<pre>";print_r($ticketData);
        // exit;
        // Task::insert($taskData);
        if(!$request->has('publish_type')) {
            OrderTicket::insert($ticketData);
        }
        return response()->json(['msg' => 'Orders Published Successfully','detail' => $ticketData], 200);
    }

    public function uploadHistory(Request $request){
        $user = auth()->user();
        return View('support.history',compact('user'));
    }

    public function publishedOrders()
    {
        $orders = Order::published()->get();
        return response()->json(['msg' => 'Orders Listing','detail' => $orders], 200);
    }

    public function uploadData($request){
        $folder = public_path('uploads');
        $file = $request->file('csvFile');
		$ext = $file->getClientOriginalExtension();
		if ($ext) {
			$filename = Str::random(20).'.'.$ext;
		}else{
			$filename = Str::random(20);
		}
		$upload_success = $file->move($folder, $filename);
        $file = public_path('uploads/'.$filename);
        $customerArr = $this->csvToArray($file);
        $orders = Order::insert($customerArr);
        return $customerArr;
    }

    public function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;
        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header) {
                    $header = $row;
                } else {
                    $finArr = array_combine($header, $row);
                    $finArr['orderno'] = self::generateRandomString(6);
                    $data[] = $finArr;
                }

            }
            fclose($handle);
        }
        return $data;
    }

    public static function generateRandomString($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
