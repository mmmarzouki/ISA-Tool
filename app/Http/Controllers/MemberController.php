<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function create(Request $request){
        $validator =\Validator::make($request->all(),[
            'name'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'inscriptionDate'=>'required',
            'level'=>'required|numeric|between:1,5',
            'section'=>'required|alpha',
            'phone'=>'required|size:8'
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
    public function delete(Request $request){
        $id=$request->get('id');
        if(is_null($id)){
            //error
            return response()->bad_request_exception();

        }
        $member=Member::find($id);
        $member->delete();

        return response()->deleted();
    }
    public function read(Request $request){
        $id=$request->get('id');
        if(is_null($id)){
            //error
            return response()->bad_request_exception();
        }
        $member=Member::find($id);
        if(is_null($member)){
            return response()->bad_request_exception();
        }
        return response()->api($data=$member->getAttributes());
    }
    public function update(Request $request){
        $id=$request->get('id');
        if(is_null($id)){
            //error
            return response()->bad_request_exception();
        }
        $validator =\Validator::make($request->all(),[
            'name'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'inscriptionDate'=>'required',
            'level'=>'required|numeric|between:1,5',
            'section'=>'required|alpha',
            'phone'=>'required|size:8'
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
        return response()->updated();
    }
    public function readAll(Request $request){
        $myData=[];
        foreach (Member::all() as $member){
            $myData+=[$member->getAttribute('id')=>$member->getAttributes()];
        }
        return response()->api($data=$myData);
    }
}
