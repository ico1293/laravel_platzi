<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        //this create a message
        //note: the second parameter means, the amount
        factory(App\Message::class, 100)->create();

        //this is the same: factory(App\Message::class)->times(100)->create();
    }
}
