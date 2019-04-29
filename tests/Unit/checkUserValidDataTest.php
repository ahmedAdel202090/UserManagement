<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class checkUserValidDataTest extends TestCase
{
    /**
     * A basic unit test example.
     *  @test
     *
     * @return void
     */


    public function User_valid_data_testing()
    {
        $response=$this->json('GET', '/userLogIn',[
            'email'=>'ahmedyosre13@gmail.com'
        ]);

        $response
        ->assertJson(['status'=>406]);
    }
}
