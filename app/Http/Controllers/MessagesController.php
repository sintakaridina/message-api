<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessagesController extends Controller
{
    public function inbox($id)
    {        
        $messages = Message::where('deliver_id', '=', $id)->latest()->get();
        return response([
            'success' => true,
            'message' => 'List Inbox',
            'data' => $messages
        ], 200);
    }
    public function chat($id, $s_id)
    {        
        $messages = Message::where('deliver_id', '=', $id)->orWhere('deliver_id', '=', $s_id)->latest()->get();
        return response([
            'success' => true,
            'message' => 'Conversation',
            'data' => $messages
        ], 200);
    }

    public function sent(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'content'   => 'required',
            'deliver_id' => 'required',
            'sender_id'  => 'required'
        ],
            [
                'content.required' => 'Input Your Message!',
                'deliver_id.required' => 'Input username!',

            ]
        );
        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'User must input empty fields',
                'data'    => $validator->errors()
            ],400);

        }else {

            $message = Message::create([
                'sender_id'  => $request->input('sender_id'),
                'deliver_id' => $request->input('deliver_id'),
                'content'    => $request->input('content')
            ]);


            if ($message) {
                return response()->json([
                    'success' => true,
                    'message' => 'Message already sent!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed sent your message!',
                ], 400);
            }
        }

    }
}
