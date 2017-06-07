<?php

use Illuminate\Database\Seeder;
// Import the model to Insert
use App\Message;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seeding Documentation: https://laravel.com/docs/5.4/seeding
        // or : https://desarrolloweb.com/articulos/seeders-laravel5.html

        Message::create([
        		'content' => '1Este es el primer mensaje de laratter',
        		'image' => 'http://lorempixel.com/600/338?1',
        	]);

        Message::create([
        		'content' => '1Que bueno que esta Laratter!',
        		'image' => 'http://lorempixel.com/600/338?2',
        	]);

    }
}
