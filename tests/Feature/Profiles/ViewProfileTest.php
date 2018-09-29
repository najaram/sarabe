<?php

namespace Tests\Feature\Profiles;

use App\Member;
use App\Profile;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ViewProfileTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function users_can_view_profiles()
    {
        $member = factory(Member::class)->create();
        $profile = factory(Profile::class)->create([
            'member_id' => $member->id,
            'church_id' => '1234567'
        ]);

        $response = $this->actingAs(factory(User::class)->create())
            ->get("members/{$member->id}/profile");

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'church_id' => $profile->church_id
        ]);
    }

    /** @test */
    public function guest_users_cannot_view_profiles()
    {
        $member = factory(Member::class)->create();

        $response = $this->get("members/{$member->id}/profile");

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
