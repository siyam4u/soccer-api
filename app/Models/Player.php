<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

    public $timestamps = true;
    protected $fillable = ["first_name", "last_name", "team_id", "image_path"];
    /**
     * Get the team that belongs to player
     */

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }
}
