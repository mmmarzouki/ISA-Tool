<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function read(Request $request){
        $id=$request->get('id');
        if(is_null($id))
            return response()->bad_request_exception();
        $project=Project::find($id);
        if(is_null($project))
            return response()->bad_request_exception();
        return response()->api($data=$project->getAttributes());
    }
    public function readAll(Request $request){
        $myData=[];
        foreach (Project::all() as $project){
            $myData+=[$project->getAttributeValue('id')=>$project->getAttributes()];
        }
        return response()->api($data=$myData);
    }
    public function create(Request $request){
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
    public function delete(Request $request){
        $id=$request->get('id');
        if(is_null($id))
            return response()->bad_request_exception();
        $project=Project::find($id);
        if(is_null($project))
            return response()->bad_request_exception();
        $project->delete();
        return response()->deleted();
    }
    public function update(Request $request){
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
