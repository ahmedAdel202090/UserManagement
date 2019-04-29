<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class checkUserExistanceTest extends TestCase
{
    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function check_user_existance()
    {
        $response=$this->json('GET', '/userLogIn',[
            'email'=>'ahmedyosre13@gmail.com',
            'password'=>'123456ah'
        ]);

        $response
        ->assertJson(['status'=>200])
        ->assertStatus(200);
    }
}
