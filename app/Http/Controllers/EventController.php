<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controllers
{
    public function create($request){
        $validator =\Validator::make($request->all(),[
            'date'=>'required',
            'name'=>'required',
        ]);
        if($validator->fails()){
            //return error
            return response()->bad_request_exception();
        }
        $event= new Event();
        foreach ($request->all() as $key => $value){
            if(in_array($key,$event->getColumns()) && ! is_null($value)){
                $event->$key=$value;
            }
        }
        $event->saveOrFail();
        //return response
        return response()->created();
    }
    public function delete($request){
        $id=$request->get('id');
        if(is_null($id))
            return response()->bad_request_exception();
        $event=Event::find($id);
        if(is_null($event))
            return response()->bad_request_exception();
        $event->delete();
        return response()->deleted();
    }
    public function update($request){
        $id=$request->get('id');
        if(is_null($id))
            return response()->bad_request_exception();
        $event=Event::find($id);
        if(is_null($event))
            return response()->bad_request_exception();
        $validator =\Validator::make($request->all(),[
            'date'=>'required',
            'name'=>'required',
        ]);
        if($validator->fails()){
            //return error
            return response()->bad_request_exception();
        }
        foreach ($request->all() as $key => $value){
            if(in_array($key,$event->getColumns()) && ! is_null($value)){
                $event->$key=$value;
            }
        }
        $event->saveOrFail();
        //return response
        return response()->updated();

    }
    public function read($request){
        $id=$request->get('id');
        if(is_null($id))
            return response()->bad_request_exception();
        $event=Event::find($id);
        if(is_null($event))
            return response()->bad_request_exception();
        return response()->api($data=$event->getAttributes());
    }
    public function readAll($request){
        $myData=[];
        foreach(Event::all() as $equipment){
            array_add($myData, $equipment->getAttributes());
        }
        return response()->api($data=$myData);
    }
}
