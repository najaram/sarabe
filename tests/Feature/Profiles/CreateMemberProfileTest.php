<?php

namespace Tests\Feature\Profiles;

use App\Member;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateMemberProfileTest extends TestCase
{
    use DatabaseMigrations;

    private function validParams($overrides = [])
    {
        return array_merge([
            'church_id' => '1234567',
            'locale'    => 'spcc',
            'district'  => 'north',
            'division'  => 'lbmr'
        ], $overrides);
    }

    /** @test */
    public function users_can_create_member_profile()
    {
        $member = factory(Member::class)->create();

        $response = $this->actingAs(factory(User::class)->create())
            ->post("members/{$member->id}/profile", [
                'member_id' => $member->id,
                'church_id' => '1234567',
                'locale'    => 'platero',
                'district'  => 'north',
                'division'  => 'lbmr'
            ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('profiles', [
            'member_id' => $member->id,
            'church_id' => '1234567'
        ]);
    }

    /** @test */
    public function guest_users_cannot_create_a_member_profile()
    {
        $member = factory(Member::class)->create();

        $response = $this->post("members/{$member->id}/profile", $this->validParams([
            'member_id' => $member->id
        ]));

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    /** @test */
    public function member_id_should_exist()
    {
        $response = $this->actingAs(factory(User::class)->create())
            ->post('member/' . 9999 . '/profile');

        $response->assertStatus(404);
    }

    /** @test */
    public function church_id_is_required()
    {
        $member = factory(Member::class)->create();

        $response = $this->actingAs(factory(User::class)->create())
            ->post("members/{$member->id}/profile", $this->validParams([
                'church_id' => ''
            ]));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('church_id');
    }

    /** @test */
    public function locale_should_be_a_string()
    {
        $member = factory(Member::class)->create();

        $response = $this->actingAs(factory(User::class)->create())
            ->post("members/{$member->id}/profile", $this->validParams([
                'locale' => 1234567
            ]));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('locale');
    }

    /** @test */
    public function group_is_nullable()
    {
        $this->withoutExceptionHandling();
        $member = factory(Member::class)->create();

        $response = $this->actingAs(factory(User::class)->create())
            ->post("members/{$member->id}/profile", $this->validParams([
                'member_id' => $member->id,
                'locale'    => 'platero',
                'group'     => ''
            ]));

        $response->assertStatus(201);
        $this->assertDatabaseHas('profiles', [
            'member_id' => $member->id,
            'locale'    => 'platero'
        ]);
    }
}
