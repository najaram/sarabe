<?php

namespace Tests\Feature\Members;

use App\Member;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ViewMemberTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function users_can_view_specific_member()
    {
        $member = factory(Member::class)->create();

        $response = $this->actingAs(factory(User::class)->create())
            ->get("members/{$member->id}");


        $response->assertStatus(200);
        $response->assertJsonFragment([
            'first_name' => $member->first_name
        ]);
        $this->assertDatabaseHas('members', [
            'first_name' => $member->first_name
        ]);
    }

    /** @test */
    public function guest_user_cannot_view_a_member()
    {
        $member = factory(Member::class)->create();

        $response = $this->get("members/{$member->id}");

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
