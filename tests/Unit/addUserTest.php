<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Mockery;

class addUserTest extends TestCase
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
        'fullName'=>'ahmed' ,
        'email'=>'ahmedyoiusre13@gmail.com',
        'password'=>'123456ah',
        'phone'=>'01090911402'
    ]);

    $mock=mockery::mock('App\Http\Controllers\UserController');
    $mock->shouldReceive('addUser')->once()->andReturn('true');
    var_dump($mock->addUser($request));
    }
}
