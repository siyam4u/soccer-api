<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{
    public function testListTeam()
    {
        $response = $this->json('GET', '/api/v1/teams')
            ->assertStatus(200);

    }

    public function testListPlayersBasedOnTeamId()
    {
        $response = $this->json('GET', '/api/v1/teams/1/players')
            ->assertStatus(200);

    }
}
