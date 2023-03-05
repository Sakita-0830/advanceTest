<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use App\Http\Requests\inquiryRequest;

class InquiryController extends Controller{
    
    public function index(){
        $inquiry = [
            'surname' => '',
            'name' => '',
            'sex' => '男性',
            'email' => '',
            'post' => '',
            'address' => '',
            'building' => '',
            'opinion' => ''
        ];
        return view('inquiry', ['inquiry' => $inquiry]);
    }
    
    public function check(InquiryRequest $request){
        $inquiry = $request->all();
        return view('checkInfo', ['inquiry' => $inquiry]);
    }

    public function correction(InquiryRequest $request){
        $inquiry = $request->all();
        return view('inquiry', ['inquiry' => $inquiry]);
    }

    public function store(InquiryRequest $request){
        $inquiry = $request->all();
        Inquiry::create($inquiry);
        return view('thanks');
    }

    //面遷移用　最後に消す
    
    public function checkInfo(){
        $inquiry = Inquiry::find(2);
        return view('checkInfo', ['inquiry' => $inquiry]);
    }

    public function thanks(){
        return view('thanks');
    }

    public function management(){
        return view('management');
    }

}
