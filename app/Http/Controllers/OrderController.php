<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Validator;
use Redirect;
use Illuminate\Support\Str;
use App\Modals\Order;
use App\Modals\OrderTicket;
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
        $data = $this->uploadData($request);
        $orders = Order::orderBy('id', 'desc')->take(count($data))->get();
        return response()->json(['msg' => 'Order Added Successfully','detail' => $orders], 200);
    }

    function orderView(){
        $users = User::presale()->get();
        $user = auth()->user();
        // echo "<pre>";print_r(auth()->user()->id);exit;
        return View('support.upload',compact('users','user'));
    }

    function commonView(){
        switch (request()->segment(3)) {
            case request()->segment(3) != '':
                $page = request()->segment(3);
                break;
            default:
                $page = 'Dashboard';
                break;
        }
        $tickets = OrderTicket::whereStatus('received')->get();
        $assigned_tickets = OrderTicket::whereStatus('assigned')->with('order','assignedby','assignedto')->get();
        $users = User::presaleEmployees()->get();
        $user = auth()->user();
        // echo "<pre>";print_r($assigned_tickets);exit;
        return View('common.template',compact('page','user','tickets','users','assigned_tickets'));
    }

    function saveRow(Request $request){
        $rules = [
            'ticket_id'         => 'required|exists:tickets,id',
            'employee_id' => 'required|exists:users,id',
            'status'         => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ( $validator->fails() ) {
            return response()->json(['msg' => $validator->errors()->first()], 400);
        }
        $ticket = OrderTicket::find($request->ticket_id);
        $ticket->status = $request->status;
        $ticket->assigned_by = auth()->user()->id;
        $ticket->assigned_to = $request->employee_id;
        // $ticket->save();
        $ticket->with('order');
        $ticket->assigned_by = User::find($ticket->assigned_by);
        $ticket->assigned_to = User::find($ticket->assigned_to);
        return response()->json(['msg' => 'Record Updated Successfully', 'detail' => $ticket], 200);
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
        // $data = $request->validate($rules);
        foreach($request->order_ids as $orderid){
            $insrData = [
                'order_id' => $orderid,
                'assigned_by' => $request->assigned_by,
                'assigned_to' => $request->assigned_to,
                'status' => $request->status ? $request->status : 'received'
            ];
            $order = Order::find($orderid);
            $insrData['ticketno'] = self::generateRandomString(6);
            $insrData['company'] = $order->company;
            $insrData['area'] = $order->area;
            $ticketData[] = $insrData;
            $order->assigned = 1;
            $order->save();
        }
        // echo "<pre>";print_r($ticketData);
        // exit;
        // Task::insert($taskData);
        OrderTicket::insert($ticketData);
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
