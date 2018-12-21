<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquent\ProjectRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Http\Requests\ProjectRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Http\File;

class ProjectController extends Controller
{
    protected $project;

    public function __construct(ProjectRepository $project, UserRepository $user)
    {
        $this->project = $project;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = $this->project->getProjectsByUser(\Auth::id(), ['id', 'name', 'description', 'image', 'users_count']);
        //dd($projects);
        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->user->getNormalUser(['id', 'name']);
        
        return view('project.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        if (isset($request->public)) {
            $public = true;
        } else {
            $public = false;
        }
        
        $slug = str_slug($request->name);
        $image = $request->file('image');

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists(config('fpms.project_img_dir'))) {
                Storage::disk('public')->makeDirectory(config('fpms.project_img_dir'));
            }
            $postImage = Image::make($image)->resize(900, 600)->save();
            Storage::disk('public')->put(config('fpms.project_img_dir').$imageName, $postImage);
            $imagePath = Storage::disk('public')->url('project/img/' . $imageName);
        } else {
            $imagePath = 'default.png';
        }

        $data = array_merge($request->all(), [
            'image' => $imagePath,
            'public' => $public,
        ]);
        
        $project = $this->project->store($data);
        
        $project->users()->attach($request->productowners, ['position_id' => 1]);
        $project->users()->attach($request->scrummasters, ['position_id' => 2]);
        $project->users()->attach($request->techleaders, ['position_id' => 3]);
        $project->users()->attach($request->teammembers, ['position_id' => 4]);
        $project->users()->attach($request->stackholders, ['position_id' => 5]);

        Toastr::success('Project Successfully Created', 'Success');
        
        return redirect()->route('user.project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
