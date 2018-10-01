<?php

namespace Tests\Feature\Profiles;

use App\Member;
use App\Profile;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class DeleteProfileTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function can_delete_a_member_profile()
    {
        $member = factory(Member::class)->create();
        $profile = factory(Profile::class)->create([
            'member_id' => $member->id,
            'church_id' => uniqid(),
            'locale'    => 'platero',
            'district'  => 'north',
            'division'  => 'lbmr'
        ]);

        $response = $this->actingAs(factory(User::class)->create())
            ->delete("members/{$member->id}/profile/{$profile->id}");

        $response->assertStatus(204);
    }
}
