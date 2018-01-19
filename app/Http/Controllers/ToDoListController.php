<?php

namespace App\Http\Controllers;

use App\Project;
use App\ToDoList;
use Illuminate\Http\Request;

class ToDoListController extends Controller
{
    public function create(Request $request){
        $validator =\Validator::make($request->all(),[
            'description'=>'required',
            'status'=>'required',
            'deadLine'=>'required',
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
    public function read(Request $request){
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
    public function readAll(Request $request){
        $myData=[];
        foreach (ToDoList::all() as $toDoList){
            $myData+=[$toDoList->getAttribute('id')=>$toDoList->getAttributes()];
        }
        return response()->api($data=$myData);
    }
    public function update(Request $request){
        $id=$request->get('id');
        if(is_null($id))
            return response()->bad_request_exception();
        $toDoList=ToDoList::find($id);
        if(is_null($toDoList))
            return response()->bad_request_exception();
        $validator =\Validator::make($request->all(),[
            'description'=>'required',
            'status'=>'required',
            'deadLine'=>'required',
            'id_project'=>'required|numeric'
        ]);
        if($validator->fails()){
            //return error
            return response()->bad_request_exception();
        }
        foreach ($request->all() as $key => $value){
            if(in_array($key,$toDoList->getColumns()) && ! is_null($value)){
                $toDoList->$key=$value;
            }
        }
        $toDoList->saveOrFail();
        //return response
        return response()->updated();
    }
    public function delete(Request $request){
        $id=$request->get('id');
        if(is_null($id))
            return response()->bad_request_exception();
        $toDoList=ToDoList::find($id);
        if(is_null($toDoList))
            return response()->bad_request_exception();
        $toDoList->delete();
        return response()->deleted();
    }
    public function readByProject(Request $request){
        $id=$request->get('id');
        if(is_null($id))
            return response()->bad_exception_request();
        $project=Project::find($id);
        if(is_null($project))
            return response()->bad_exception_request();
        $toDoLists = ToDoList::all();
        $myData=[];
        foreach ($toDoLists as $toDoList){
            if($toDoList->getAttribute('id_project')==$id){
                $myData+=[$toDoList->getAttribute('id')=>$toDoList->getAttributes()];
            }
        }

       return response()->api($data=$myData);

    }
}
