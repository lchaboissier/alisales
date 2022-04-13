<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //User::create([
            //    'name'=>'Test Test',
            //    'email'=>'test@test.fr',
            //    'password'=>Hash::make('testtest')
        //]);
        User::factory(10)->create();
        $this->call([
             CustomerSeeder::class,
         ]);
    }
}
