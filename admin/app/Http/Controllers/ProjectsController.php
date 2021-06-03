<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectsModel;

class ProjectsController extends Controller
{
    function ProjectsIndex()
    {

        return view('Projects');
    }
    function getProjectsData()
    {

        $ProjectsData = json_encode(ProjectsModel::orderBy('id','desc')->get());

        return $ProjectsData;

    }
    function getProjectDetails(Request $request)
    {

        $id = $request->input('id');

        $projectsData = json_encode(ProjectsModel::where('id', '=', $id)->get());

        return $projectsData;

    }
    function projectDelete(Request $request)
    {

        $id = $request->input('id');

        $result = ProjectsModel::where('id', '=', $id)->delete();

        return ($result) ? 1 : 0;
    }
    function getProjectUpdate(Request $request)
    {

        $id = $request->input('id');

        $projectName = $request->input('project_name');

        $projectDesc = $request->input('project_des');

         $projectLink = $request->input('project_link');

         $projectImg = $request->input('project_img');



        $projectsData = ProjectsModel::where('id', '=', $id)->update([

        	'project_name'=>$projectName,

        	'project_des'=>$projectDesc,

        	'project_link'=>$projectLink,

        	'project_img'=>$projectImg
        ]);

        return ($projectsData)? 1 : 0 ;

    }
    function getProjectAdd(Request $request)
    {

        $id = $request->input('id');

        $project_name = $request->input('project_name');

        $project_des = $request->input('project_des');

         $project_link = $request->input('project_link');

         $project_img = $request->input('project_img');

        $servicesData = ProjectsModel::insert(['project_name'=>$project_name,'project_des'=>$project_des,'project_link'=>$project_link,'project_img'=>$project_img]);

        return ($servicesData)? 1 : 0 ;

    }
}



