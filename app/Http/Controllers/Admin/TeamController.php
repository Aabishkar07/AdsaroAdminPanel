<?php

namespace App\Http\Controllers\Admin;

use App\FileService\ImageService;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TeamController extends Controller
{
    public function __construct(
        protected ImageService $imageservice
    ) {
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_unless(Gate::allows('View Team'), 403);

        $teams = Team::latest()->paginate(10);
        return view('admin.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_unless(Gate::allows('Add Team'), 403);
        return view('admin.team.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {

        abort_unless(Gate::allows('Add Team'), 403);
        $team_img = $this->imageservice->fileUpload($request->image, "team");
        $req = $request->all();
        $req['image'] = $team_img;
        Team::create($req);

        return redirect()->route('admin.teams.index')->with('popsuccess', 'Team Successfully Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        abort_unless(Gate::allows('Edit Team'), 403);
        return view('admin.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamRequest $request, Team $team)
    {
        abort_unless(Gate::allows('Edit Team'), 403);
        $req = $request->all();

        if ($request->hasFile('image')) {

            if ($team->image) {
                $this->imageservice->imageDelete($team->image);
            }
            $team_img = $this->imageservice->fileUpload($request->image, "team");
            $req['image'] = $team_img;
        }


        $team->update($req);

        return redirect()->route('admin.teams.index')->with('popsuccess', 'Team Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        abort_unless(Gate::allows('Delete Team'), 403);

        if ($team->image) {
            $this->imageservice->imageDelete($team->image);
        }
        $team->delete();
        return redirect()->route("admin.teams.index")->with("popsuccess", "Team Deleted");
    }
}
