<?php

namespace App\Http\Controllers;

use App\Project;
use App\ToDoList;
use Illuminate\Http\Request;

class ToDoListController extends Controller
{
    public function create($request){
        $validator =\Validator::make($request->all(),[
            'value'=>'required',
            'done'=>'required',
            'id_project'=>'required|numeric'
        ]);
        if($validator->fails()){
            //return error
            return response()->bad_request_exception();
        }
        $toDoList = new ToDoList();
        foreach ($request->all() as $key => $value){
            if(in_array($key,$toDoList->getColumns()) && ! is_null($value)){
                $toDoList->$key=$value;
            }
        }
        $toDoList->saveOrFail();
        //return response
        return response()->created();
    }
    public function read($request){
        $id=$request->get('id');
        if(is_null($id))
            return response()->bad_exception_request();
        $toDoList=ToDoList::find($id);
        if(is_null($toDoList))
            return response()->bad_exception_request();
        $project=Project::find($toDoList->getAttribute('id_project'));
        $myData=$toDoList->getAttributes();
        array_add($myData,'project',$project);
        return response()->api($data=$myData);
    }
    public function readAll($request){

    }
}
