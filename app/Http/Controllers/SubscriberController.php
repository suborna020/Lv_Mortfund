<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  print_r($request->all());
        $validator = Validator($request->all(), [
            'email' => 'required', 
            ]);
        if ($validator->passes()) {
            // ($is_exists) condition : if given email already exist on our database
            //where('email', $request->email) =db email == given email
            // $is_exists=get() method for fetching existing email line from database
            $email_is_exists = Subscriber::where('email', $request->email)->get()->toArray();

            if ($email_is_exists) {
                $arr = array('status' => 'false', 'message' => 'E-Mail Already Exists');
            } else {
                $user_info = new Subscriber();
                $user_info->email = $request->email;
                $user_info->status = 1;
                $user_info->save();
                $arr = array('status' => 'true', 'message' => 'Subscibtion Successful');
            }
        } else {
            $arr = array('status' => 'false', 'message' => $validator->errors()->all());
        }
        echo json_encode($arr);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        //
    }
}
