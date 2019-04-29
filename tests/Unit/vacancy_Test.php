<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use mockery;

class vacancy_Test extends TestCase
{
    /**
     * A basic unit test example.
     *  @test
     * @return void
     */
    public function addUserSuccTest()
    {
    $request=new Request;
    $request->setJson([
        'name'=>'developing',
    ]);
    $mock=mockery::mock('App\Http\Controllers\VacancyController');
    $mock->shouldReceive('addVacancy')->once()->andReturn('vacancy will be added successfully');
    var_dump($mock->addVacancy($request));
    }
}
