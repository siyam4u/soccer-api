<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    public $timestamps = true;
    protected $fillable = ["name", "image_path"];

    /**
     * Get the players for team
     */
    public function players()
    {
        return $this->hasMany('App\Models\Player');
    }
}
