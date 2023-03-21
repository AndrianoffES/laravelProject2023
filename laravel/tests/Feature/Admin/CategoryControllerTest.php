<?php

namespace Tests\Feature\Admin;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_categories_succesful_page(): void
    {
        $response = $this->get(route('admin.categories.index'));
        $response->assertStatus(200);
    }
    public function test_categories_create_succesful_page(): void
    {
        $response = $this->get(route('admin.categories.create'));
        $response->assertViewIs('admin.categories.create')->assertStatus(200);


    }
    public function test_categories_create_return_json(): void
    {
        $faker = Factory::create();
        $title = $faker->jobTitle;
        $description = $faker->text('500');
        $date = [
            'title' => $title,
            'description' => $description
        ];
        $response = $this->post(route('admin.categories.store'),$date);

        $response->assertJson($date)->assertStatus(200);
    }
}
