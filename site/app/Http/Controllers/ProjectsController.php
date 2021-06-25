<?php

namespace App\Http\Controllers;

use App\ProjectsModel;
use Illuminate\Http\Request;


class ProjectsController extends Controller
{
    function ProjectsPage(){
        $ProjectData = ProjectsModel::orderBy('id','desc')->get();
        return view('Projects',['ProjectData'=>$ProjectData]);
    }
}
