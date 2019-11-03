<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use Validator;
use App\Http\Resources\Calls as CallResource;
use App\Modals\Call;

class CallController extends Controller
{
    /**
     * Display a listing of Calls.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calls = Call::all();
        return response()->json(['msg' => 'Calls Listing','detail' => $calls], 200);
    }
    /*
     * Add Call
     *
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $rules = [
            'person_name'         => 'required|max:200',
            'phone'          => 'required',
            'type'          => 'required',
            'company'         => 'required',
            'city'         => 'sometimes|nullable',
            'website'         => 'sometimes|nullable',
            'date_time'         => 'required',
            'no_of_calls'         => 'required',
            'remarks'         => 'sometimes|nullable',
            // 'plate_number'  => 'required|unique:my_cars,plate_number,NULL,id,is_deleted,0',
            // 'vehicle_type'  => 'required|in:1,2,3,4',
        ];
        $messages = [
            'person_name.required' => 'Person Name is Required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ( $validator->fails() ) {
            return response()->json(['msg' => $validator->errors()->first()], 400);
        }

        $data = $request->validate($rules);
        $data['date_time'] = \Carbon\Carbon::parse($data['date_time']);
        // $data['user_id'] = auth()->user()->id;

        $car = Call::create($data);
        return response()->json(['msg' => 'Call Added Successfully','detail' => $car], 200);

    }
}
