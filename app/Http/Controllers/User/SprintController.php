<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Requests\SprintRequestStore;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ReleaseRepositoryInterface;
use App\Repositories\Interfaces\ProjectRepositoryInterface;
use App\Repositories\Interfaces\SprintRepositoryInterface;
use Brian2694\Toastr\Facades\Toastr;

class SprintController extends Controller
{
    protected $sprint;

    public function __construct(ReleaseRepositoryInterface $release, SprintRepositoryInterface $sprint, ProjectRepositoryInterface $project)
    {
        $this->release = $release;
        $this->sprint = $sprint;
        $this->project = $project;
    }

    public function index()
    {
        $sprints = $this->sprint->all();
        $project = $this->project->all();
        $release = $this->release->all();

        return view('sprint.index', compact('sprints', 'project', 'release'));
    }

    public function create()
    {
        $project = $this->project->all();
        $release = $this->release->all();

        return view('sprint.create', compact('project', 'release'));
    }

    public function ajax($id)
    {
        $release = $this->release->where('project_id', $id);
        
        foreach ($release as $re)
        {
            echo "<option value='" . $re->id . "'>" . $re->release_date . "</option>";
        }
    }

    public function store(SprintRequestStore $request)
    {
        $data = [
            'release_plan_id' => $request->release,
            'sprint' => $request->sprint,
            'description' => $request->description,
            'status' => $request->status,
        ];
        $sprint = $this->sprint->store($data);

        Toastr::success(__('created'), 'Success');
        
        return redirect()->route('user.sprint.index');
    }
}
