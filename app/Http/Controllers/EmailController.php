<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\SaveRequest;

class EmailController extends Controller
{
    public function index(){
        return view('request');
    }

    public function send(Request $request){

        $this -> validate($request,[
            'email'         => 'required|email',
            'subject'     => 'required',
            'description' => 'required'
        ]);
       

        $data = array(
            'email' => $request -> email,
            'subject' => $request -> subject,
            'description' => $request -> description,
            'file' => $request ->file('file')->store('files')
        );

        Mail::to('msaitkarim555@gmail.com')
            ->send(new DemoMail($data));

        $review = new SaveRequest();
        $review->email = $request->input('email');
        $review->subject = $request->input('subject');
        $review->description = $request->input('description');

        if($request->hasFile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('files', $filename);
            $review->file = $filename;
        }
        else{
            return $request;
            $review->file = ' ';
        }

        $review->save();

        return back()->with('success', 'Thanks for contacting us!');

    }

}
