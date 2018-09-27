<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Member::class, 20)->create()
            ->each(function ($member) {
                factory(\App\Profile::class)->states('group')->create([
                    'member_id' => $member
                ]);
            });
    }
}
