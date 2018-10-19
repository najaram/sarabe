<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Activity;

class ActivitiesTableSeeder extends Seeder
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
            factory(Activity::class)->create([
                'user_id' => $user
            ]);
        });
    }
}
