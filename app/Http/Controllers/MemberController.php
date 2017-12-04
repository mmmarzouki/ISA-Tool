<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function create($request){

        $validator =\Validator::make($request->all(),[
            'name'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed',
            'inscriptionDate'=>'required',
            'level'=>'required|numeric|between:1,5',
            'section'=>'required|alpha',
            'phone'=>'required|digits|size:8'
        ]);
        if($validator->fails()){
            //return error
            return response()->bad_request_exception();
        }
        $member = new Member();
        foreach ($request->all() as $key => $value){
            if(in_array($key,$member->getColumns()) && ! is_null($value)){
                $member->$key=$value;
                if($key =='password'){
                    $member->$key = password_hash($value,CRYPT_SHA256);
                }
            }
        }
        $member->saveOrFail();
        //return response
        return response()->created();
    }

    public function delete($request){
        $id=$request->get('id');
        if(is_null($id)){
            //error
            return response()->bad_request_exception();

        }
        $member=Member::find($id);
        $member->delete();

        return response()->deleted();
    }

    public function read($request){
        $id=$request->get('id');
        if(is_null($id)){
            //error
            return response()->bad_request_exception();
        }
        $member=Member::find($id);
        $myData=[];
        foreach ($member as $key => $value){
            $myData[$key]=$value;
        }
        return response()->api($data=$myData);
    }

    public function update($request){
        $id=$request->get('id');
        if(is_null($id)){
            //error
            return response()->bad_request_exception();
        }
        $validator =\Validator::make($request->all(),[
            'name'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed',
            'inscriptionDate'=>'required',
            'level'=>'required|numeric|between:1,5',
            'section'=>'required|alpha',
            'phone'=>'required|digits|size:8'
        ]);
        if($validator->fails()){
            //return error
            return response()->bad_request_exception();
        }
        $member = Member::find($id);
        foreach ($request->all() as $key => $value){
            if(in_array($key,$member->getColumns()) && ! is_null($value)){
                $member->$key=$value;
                if($key =='password'){
                    $member->$key = password_hash($value,CRYPT_SHA256);
                }
            }
        }
        $member->saveOrFail();
        //return response
        return response()->created();
    }
}
