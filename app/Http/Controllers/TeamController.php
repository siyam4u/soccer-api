<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Team;
use App\Repositories\Team\TeamRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TeamController extends Controller
{
    private $team;

    /**
     * TeamController constructor.
     * @param TeamRepository $team
     */
    public function __construct(TeamRepository $team)
    {
        $this->middleware('auth');
        $this->team = $team;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = $this->team->getAll();
        return view('teams.index', ['teams' => $teams]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TeamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        if(Input::hasFile('image_path')) {
            $image_path = Input::file('image_path');
            $teamAvatarFolder = ('avatars').DIRECTORY_SEPARATOR.'teams'.DIRECTORY_SEPARATOR;
            $image_path->move($teamAvatarFolder, $image_path->getClientOriginalName());
            $this->team->create(['name' => $request->name,'image_path'=>$teamAvatarFolder.$image_path->getClientOriginalName()]);
        }
        return redirect(route('teams.index'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->team->getById($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $team->name = $request->name;

        $attrbutes = array('name' => $team->name);

        if(Input::hasFile('image_path')) {
            $image_path = Input::file('image_path');
            if($image_path) {
                $teamAvatarFolder = ('avatars').DIRECTORY_SEPARATOR.'teams'.DIRECTORY_SEPARATOR;
                $image_path->move($teamAvatarFolder, $image_path->getClientOriginalName());
                $team->image_path = $teamAvatarFolder.$image_path->getClientOriginalName();
                $attrbutes['image_path'] = $team->image_path;
            }

        }
        $this->team->update($team, $attrbutes);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->team->delete($id);
        return redirect()->back();
    }
}
