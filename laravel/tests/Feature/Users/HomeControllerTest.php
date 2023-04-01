<?php

namespace Tests\Feature\Users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_home_succesful_page(): void
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);
    }
    public function test_feedback_create_succesful_page(): void
    {
        $response = $this->get(route('home'));
        $response->assertViewIs('users.usersWelcome')->assertStatus(200);


    }
}
