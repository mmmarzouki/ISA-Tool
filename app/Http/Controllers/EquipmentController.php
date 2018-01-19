<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipement;

class EquipmentController extends Controller
{
    public function create(Request $request){
        $validator =\Validator::make($request->all(),[
            'reference'=>'required|alpha_num',
            'name'=>'required',
            'type'=>'required'
        ]);
        if($validator->fails()){
            //return error
            return response()->bad_request_exception();
        }
        $equipment= new Equipement();
        foreach ($request->all() as $key => $value){
            if(in_array($key,$equipment->getColumns()) && ! is_null($value)){
                $equipment->$key=$value;
            }
        }
        $equipment->saveOrFail();
        //return response
        return response()->created();
    }
    public function read(Request $request){
        $id=$request->get('id');//var_dump($id);
        if(is_null($id)){
            $s="id null";
            dd($s);
            return response()->bad_request_exception();
        }
        $equipment=Equipement::find($id);
        if(is_null($equipment)){
            $s="equipment null";
            dd($s);
            return response()->bad_request_exception();
        }
        //dd($equipment->getAttributes());
        return response()->api($equipment->getAttributes());
    }
    public function readAll(Request $request){
        $myData=[];
        foreach(Equipement::all() as $equipment){
            //array_add($myData,$equipment->getAttribute('id'),$equipment->getAttributes());
            $myData+=[$equipment->getAttribute('id')=>$equipment->getAttributes()];
        }
        return response()->api($data=$myData);
    }
    public function delete(Request $request){
        $id=$request->get('id');
        if(is_null($id)){
            return response()->bad_request_exception();
        }
        $equipment=Equipement::find($id);
        if(is_null($equipment)){
            return response()->bad_request_exception();
        }
        $equipment->delete();
        return response()->deleted();
    }
    public function update(Request $request){
        $id=$request->get('id');
        if(is_null($id)){
            return response()->bad_request_exception();
        }
        $equipment=Equipement::find($id);
        if(is_null($equipment)){
            return response()->bad_request_exception();
        }
        $validator =\Validator::make($request->all(),[
            'reference'=>'required|alpha_num',
            'name'=>'required',
            'type'=>'required'
        ]);
        if($validator->fails()){
            //return error
            return response()->bad_request_exception();
        }
        foreach ($request->all() as $key => $value){
            if(in_array($key,$equipment->getColumns()) && ! is_null($value)){
                $equipment->$key=$value;
            }
        }
        $equipment->saveOrFail();
        //return response
        return response()->updated();
    }
    public function readByTeam(Request $request){

    }
}
