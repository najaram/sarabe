<?php

namespace Tests\Feature\Members;

use App\Member;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ViewMembersTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function users_can_view_list_of_members()
    {
        $member = factory(Member::class, 3)->create();

        $response = $this->actingAs(factory(User::class)->create())
            ->getJson('members');

        $response->assertStatus(200);
        $response->assertJsonCount(3, 'data');
        $response->assertJsonFragment([
            'first_name' => $member[0]->first_name
        ]);
    }

    /** @test */
    public function guest_users_cannot_view_list_of_members()
    {
        $response = $this->get('members');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
