<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ReleaseRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Http\Requests\ReleaseRequestStore;
use App\Http\Requests\ProjectRequestUpdate;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Illuminate\Http\File;
use App\Helper\FileHelper;
use Carbon\Carbon;

class ReleaseController extends Controller
{
    protected $release;

    public function __construct(ReleaseRepositoryInterface $release, UserRepositoryInterface $user)
    {
        $this->release = $release;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $releases = $this->release->getReleasePlansByProject(1, [
            'id',
            'project_id',
            'release_date',
            'goal',
            'note',
            'version',
        ]);

        return view('release.index', compact('releases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->user->getNormalUser(['id', 'name']);
        
        return view('release.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProjectRequestStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReleaseRequestStore $request)
    {
        $date = Carbon::parse($request->release_date);
        $data = [
            'project_id' => 1,
            'release_date' => $date,
            'goal' => $request->goal,
            'note' => $request->note,
            'version' => $request->version,
        ];
        $release = $this->release->store($data);

        Toastr::success('Release Successfully Created', 'Success');
        
        return redirect()->route('user.release.index');
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
        $release = $this->release->with('project')->find($id);
        if (\Auth::user()->can('update', $release)) {
            $users = $this->user->getNormalUser(['id', 'name']);

            return view('release.edit', compact('release', 'users', 'members'));
        } else {
            Toastr::error('You dont have permission', 'Error');

            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\ProjectRequestUpdate $request
     * @param int $id
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
