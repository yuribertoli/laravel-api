<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lead;
use App\Mail\NewContact;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request){

        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'eamil' => 'required|email',
            'message' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json([
                'success'=>false,
                'errors'=> $validator->errors()
            ]);
        } else {

            $lead = new Lead();
            $lead->fill($data);
            $lead->save();

            Mail::to('supporto@admin.com')->send(new NewContact($lead));

            return response()->json([
                'success'=>true,

            ]);

        }
    }
}
