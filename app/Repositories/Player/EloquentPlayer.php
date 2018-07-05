<?php

namespace App\Repositories\Player;

use App\Models\Player;


/**
 * Class EloquentPlayer
 * @package App\Repositories\Player
 */
class EloquentPlayer implements PlayerRepository {

    /**
     * @var Player
     */
    private $model;

    /**
     * EloquentPlayer constructor.
     * @param Player $model
     */
    public function __construct(Player $model)
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
        $player = $this->getById($id)->first();
        $player->fill($attributes);
        $player->save();
        return $player;
    }

    public function delete($id)
    {
        $this->getById($id)->delete();
        return true;
    }

}