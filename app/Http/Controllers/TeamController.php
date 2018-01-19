<?php

namespace App\Http\Controllers;

use App\Member;
use App\Project;
use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function create(Request $request){
        $validator =\Validator::make($request->all(),[
            'name'=>'required',
            'id_manager'=>'numeric|required'
        ]);
        if($validator->fails()){
            //return error
            return response()->bad_request_exception();
        }
        $team = new Team();
        foreach ($request->all() as $key => $value){
            if(in_array($key,$team->getColumns()) && ! is_null($value)){
                $team->$key=$value;
            }
        }
        $team->saveOrFail();
        //return response
        return response()->created();
    }
    public function read(Request $request){
        $id=$request->get('id');
        if(is_null($id))
            return response()->bad_request_exception();
        $team = Team::with(["members","projects"])->find($id);
        if(is_null($team))
            return response()->bad_request_exception();
        //manager
        $manager=Member::find($team->getAttribute('id_manager'));
        //$team+=['manager'=>$manager];
        $team->manager=$manager;
        return response()->api($data=$team);
    }
    public function readAll(Request $request){
        $myData=[];
        foreach (Team::all() as $team){
            $manager = Member::find($team->getAttribute('id_manager'));
            $teamData=$team->getAttributes();
            $teamData+=['manager'=>$manager];
            $myData+=[$team->getAttribute('id')=>$teamData];
        }
        return response()->api($data=$myData);
    }
    public function update(Request $request){
        $id=$request->get('id');
        if(is_null($id))
            return response()->bad_request_exception();
        $team=Team::find($id);
        if(is_null($team))
            return response()->bad_request_exception();
        $validator =\Validator::make($request->all(),[
            'name'=>'required',
            'id_manager'=>'numeric|required'
        ]);
        if($validator->fails()){
            //return error
            return response()->bad_request_exception();
        }
        foreach ($request->all() as $key => $value){
            if(in_array($key,$team->getColumns()) && ! is_null($value)){
                $team->$key=$value;
            }
        }
        $team->saveOrFail();
        //return response
        return response()->updated();
    }
    public function delete(Request $request){
        $id=$request->get('id');
        if(is_null($id))
            return response()->bad_request_exception();
        $team=Team::find($id);
        if(is_null($team))
            return response()->bad_request_exception();
        $team->delete();
        return response()->deleted();
    }
}
