<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Validator;
use Illuminate\Support\Str;
use App\Modals\Order;
use App\User;
use App\Modals\Task;

class OrderController extends Controller
{
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
        return View('includes.upload',compact('users','user'));
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
        $data = $request->validate($rules);
        foreach($request->order_ids as $orderid){
            $insertData[] = [
                'order_id' => $orderid,
                'assigned_by' => $request->assigned_by,
                'assigned_to' => $request->assigned_to,
                'status' => $request->status ? $request->status : 'received'
            ];
            $order = Order::find($orderid);
            $order->assigned = 1;
            $order->save();
        }
        Task::insert($insertData);
        return response()->json(['msg' => 'Orders Published Successfully','detail' => $insertData], 200);
    }

    public function uploadHistory(Request $request){
        $user = auth()->user();
        return View('includes.history',compact('user'));
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
