<?php

namespace Tests\Feature\Members;

use App\Member;
use App\Profile;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class DeleteMemberTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function can_delete_a_member()
    {
        $member = factory(Member::class)->create();
        factory(Profile::class)->create([
            'member_id' => $member->id,
            'church_id' => uniqid(),
            'locale'    => 'platero',
            'district'  => 'north',
            'division'  => 'lbmr'
        ]);

        $response = $this->actingAs(factory(User::class)->create())
            ->delete("members/{$member->id}");

        $response->assertStatus(204);
    }
}
