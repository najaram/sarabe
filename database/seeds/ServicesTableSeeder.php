<?php

use Illuminate\Database\Seeder;

use App\Service;
use App\User;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $users->each(function ($user) {
            factory(Service::class)->create([
                'user_id' => $user->id
            ]);
        });
    }
}
