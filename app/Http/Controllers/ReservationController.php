<?php

namespace App\Http\Controllers;

use App\Member;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create(Request $request){
        $validator =\Validator::make($request->all(),[
            'datedebut'=>'required',
            'datefin'=>'required',
        ]);
        if($validator->fails()){
            //return error
            return response()->bad_request_exception();
        }
        $reservation = new Reservation();
        foreach ($request->all() as $key => $value){
            if(in_array($key,$reservation->getColumns()) && ! is_null($value)){
                $reservation->$key=$value;
                if($key =='password'){
                    $member->$key = password_hash($value,CRYPT_SHA256);
                }
            }
        }
        $reservation->saveOrFail();
        //return response
        return response()->created();
    }
    public function read(Request $request){
        $id=$request->get('id');
        if(is_null($id))
            return response()->bad_request_exception();
        $reservation=Reservation::find($id);
        if(is_null($reservation))
            return response()->bad_request_exception();
        return response()->api($data=$reservation->getAttributes());
    }
    public function readAll(Request $request){
        $myData=[];
        foreach (Reservation::all() as $reservation){
            $myData+=[$reservation->getAttribute('id')=>$reservation->getAttributes()];
        }
        return response()->api($data=$myData);
    }
    public function delete(Request $request){
        $id=$request->get('id');
        if(is_null($id))
            return response()->bad_request_exception();
        $reservation=Reservation::find($id);
        if(is_null($reservation))
            return response()->bad_request_exception();
        $reservation->delete();
        return response()->deleted();
    }
    public function update(Request $request){
        $id=$request->get('id');
        if(is_null($id))
            return response()->bad_request_exception();

        $reservation=Reservation::find($id);

        if(is_null($reservation))
            return response()->bad_request_exception();
        $validator =\Validator::make($request->all(),[
            'datedebut'=>'required',
            'datefin'=>'required',
        ]);
        if($validator->fails()){
            //return error
            return response()->bad_request_exception();
        }
        foreach ($request->all() as $key => $value){
            if(in_array($key,$reservation->getColumns()) && ! is_null($value)){
                $reservation->$key=$value;
                if($key =='password'){
                    $member->$key = password_hash($value,CRYPT_SHA256);
                }
            }
        }
        $reservation->saveOrFail();
        //return response
        return response()->updated();
    }

}
