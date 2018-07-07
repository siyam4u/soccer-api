<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerRequest;
use App\Models\Player;
use App\Models\Team;
use App\Repositories\Player\PlayerRepository;
use App\Repositories\Team\TeamRepository;
use Illuminate\Support\Facades\Input;


class PlayerController extends Controller
{
    /**
     * @var PlayerRepository
     */
    private $player;

    /**
     * PlayerController constructor.
     * @param PlayerRepository $player
     */
    public function __construct(PlayerRepository $player)
    {
        $this->middleware('auth');
        $this->player = $player;
    }

    /**
     * Display a listing of the resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::pluck('name', 'id')->prepend('--Select--','');
        return view('players.create',['teams'=>$teams]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PlayerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlayerRequest $request)
    {
        if (Input::hasFile('image_path')) {
            $image_path = Input::file('image_path');
            $playersAvatarFolder = ('avatars').DIRECTORY_SEPARATOR.'players'.DIRECTORY_SEPARATOR;
            $image_path->move($playersAvatarFolder, $image_path->getClientOriginalName());
            $this->player->create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'team_id' => $request->team_id,
                'image_path' => $playersAvatarFolder . $image_path->getClientOriginalName()
            ]);
        }

        return redirect('teams/'.$request->team_id.'/players');
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
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        $teams = Team::pluck('name', 'id');
        return view('players.edit', ['player' => $player,'teams' => $teams]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PlayerRequest  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(PlayerRequest $request, Player $player)
    {
        $player->first_name = $request->first_name;
        $player->last_name = $request->last_name;
        $player->team_id = $request->team_id;

        $attrbutes = array('first_name' => $player->first_name ,
                            'last_name' => $player->last_name,
                            'team_id' => $player->team_id
                     );
        if(Input::hasFile('image_path')) {
            $image_path = Input::file('image_path');
            if($image_path) {
                $playerAvatarFolder = ('avatars').DIRECTORY_SEPARATOR.'players'.DIRECTORY_SEPARATOR;
                $image_path->move($playerAvatarFolder, $image_path->getClientOriginalName());
                $player->image_path = $playerAvatarFolder.$image_path->getClientOriginalName();

                $attrbutes['image_path'] = $player->image_path;
            }
        }
        $this->player->update($player, $attrbutes);
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
        $this->player->delete($id);
        return redirect()->back();
    }

    public function showTeamPlayers (TeamRepository $teamRepository, $id) {
        $players = $teamRepository->getPlayersByTeam($id);
        return view('players.showTeamPlayers', ['players' => $players]);
    }
}
