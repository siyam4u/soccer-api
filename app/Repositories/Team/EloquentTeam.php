<?php

namespace App\Repositories\Team;

use App\Models\Team;


/**
 * Class EloquentTeam
 * @package App\Repositories\Team
 */
class EloquentTeam implements TeamRepository {

    /**
     * @var Team
     */
    private $model;

    /**
     * EloquentTeam constructor.
     * @param Team $model
     */
    public function __construct(Team $model)
    {

        return $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $team = $this->getById($id)->first();
        $team->fill($attributes);
        $team->save();
        return $team;
    }
    public function delete($id)
    {
        $this->getById($id)->delete();
        return true;
    }

    public function getPlayersByTeam($id)
    {
        $players =  $this->model::with('players')->find($id);
        return $players;
    }
}