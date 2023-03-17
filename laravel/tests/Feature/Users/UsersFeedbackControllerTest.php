<?php

namespace Tests\Feature\Users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersFeedbackControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_feedback_succesful_page(): void
    {
        $response = $this->get(route('feedback.index'));
        $response->assertStatus(200);
    }



    public function test_feedback_save_to_file(): void
    {
        $data = [
            'name'=>'Ivan',
            'feedback'=>'sdfsdfsdfsdfs'
        ];
        $data=json_encode($data, JSON_PRETTY_PRINT);
        $file = '/home/vagrant/code/laravel/Files/usersFeedbacks.json';
        file_put_contents($file, $data);
        $this->assertFileExists($file);
        $contents = file_get_contents($file);
        json_decode($contents, true);
        $this->assertEquals($data, $contents);

    }
}
