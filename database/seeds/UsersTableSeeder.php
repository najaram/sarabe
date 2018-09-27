<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->users() as $user) {
            factory(User::class)->create($user);
        }
    }

    public function users()
    {
        return [
            [
                'name'     => 'jon snow',
                'email'    => 'admin@gmail.com',
                'password' => 'secret'
            ],
            [
                'name'     => 'tyrion lannister',
                'email'    => 'tyrion@gmail.com',
                'password' => 'secret'
            ],
            [
                'name'     => 'danaerys targaryen',
                'email'    => 'targaryen@gmail.com',
                'password' => 'secret'
            ]
        ];
    }
}
