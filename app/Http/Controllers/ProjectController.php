<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function read($request){
        $id=$request->get('id');
        if(is_null($id))
            return response()->bad_request_exception();
        $project=Project::find($id);
        if(is_null($project))
            return response()->bad_request_exception();
        return response()->api($data=$project->getAttributes());
    }
    public function readAll($request){
        $myData=[];
        foreach (Project::all() as $project){
            array_add($myData,$project->getAttributeValue('id'),$project->getAttributes());
        }
    }
    public function create($request){
        $validator =\Validator::make($request->all(),[
            'name'=>'required',
            'description'=>'required',
            'type'=>'required',
            'id_team'=>'required|numeric'
        ]);
        if($validator->fails()){
            //return error
            return response()->bad_request_exception();
        }
        $project= new Project();
        foreach ($request->all() as $key => $value){
            if(in_array($key,$project->getColumns()) && ! is_null($value)){
                $project->$key=$value;
            }
        }
        $project->saveOrFail();
        //return response
        return response()->created();
    }
    public function delete($request){
        $id=$request->get('id');
        if(is_null($id))
            return response()->bad_request_exception();
        $project=Project::find($id);
        if(is_null($project))
            return response()->bad_request_exception();
        $project->delete();
        return response()->deleted();
    }
    public function update($request){
        $id=$request->get('id');
        if(is_null($id))
            return response()->bad_request_exception();
        $project=Project::find($id);
        if(is_null($project))
            return response()->bad_request_exception();

        $validator =\Validator::make($request->all(),[
            'name'=>'required',
            'description'=>'required',
            'type'=>'required',
            'id_team'=>'required|numeric'
        ]);
        if($validator->fails()){
            //return error
            return response()->bad_request_exception();
        }
        foreach ($request->all() as $key => $value){
            if(in_array($key,$project->getColumns()) && ! is_null($value)){
                $project->$key=$value;
            }
        }
        $project->saveOrFail();
        //return response
        return response()->updated();
    }
}
