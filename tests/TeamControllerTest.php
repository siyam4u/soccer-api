<?php
namespace Tests\Unit;

use Tests\TestCase;

use Mockery;

class TeamControllerTest extends TestCase {

    public $mock;

    protected $stack;

    public function setUp() {
        parent::setUp();
        $this->mock = Mockery::mock('Eloquent', 'Team');
    }

    public function tearDown()
    {
        Mockery::close();
    }

    public function testIndex()
    {
        $response = $this->call('GET', 'teams');
        $this->assertEquals(200, $response->getStatusCode());
       // $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $response);

    }

}