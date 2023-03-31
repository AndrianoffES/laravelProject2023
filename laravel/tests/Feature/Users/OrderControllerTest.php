<?php

namespace Tests\Feature\Users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function test_order_succesful_page(): void
    {
        $response = $this->get(route('order.index'));
        $response->assertStatus(200);
    }
    public function test_order_save_to_file(): void
    {
        $data = [
            'inputName'=>'Ivan',
            'inputPhone' =>'+799999999',
            'inputEmail'=>'lol@ya.ru',
            'inputDescription'=>'sdfsdfsdfsdfs'
        ];
        $data=json_encode($data, JSON_PRETTY_PRINT);
        $file = '/home/vagrant/code/laravel/Files/usersOrders.json';
        file_put_contents($file, $data);
        $this->assertFileExists($file);
        $contents = file_get_contents($file);
        json_decode($contents, true);
        $this->assertEquals($data, $contents);

    }
}
