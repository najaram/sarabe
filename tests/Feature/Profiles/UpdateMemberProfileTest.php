<?php

namespace Tests\Feature\Profiles;

use App\Member;
use App\Profile;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UpdateMemberProfileTest extends TestCase
{
    use DatabaseMigrations;

    private function validParams($override = [])
    {
        return array_merge([
            'church_id' => '1234567',
            'locale'    => 'platero',
            'district'  => 'north',
            'division'  => 'lbmr'
        ], $override);
    }

    /** @test */
    public function users_can_update_member_profile()
    {
        $member = factory(Member::class)->create();
        $profile = factory(Profile::class)->create([
            'member_id' => $member->id
        ]);

        $response = $this->actingAs(factory(User::class)->create())
            ->put("members/{$member->id}/profile/{$profile->id}", [
                'member_id' => $member->id,
                'church_id' => '1234567',
                'locale'    => 'platero',
                'district'  => 'north',
                'division'  => 'lbmr'
            ]);


        $response->assertStatus(200);
        $this->assertDatabaseHas('profiles', [
            'member_id' => $member->id,
            'church_id' => '1234567',
            'locale'    => 'platero',
            'district'  => 'north',
            'division'  => 'lbmr'
        ]);
    }

    /** @test */
    public function guests_cannot_update_a_member_profile()
    {
        $member = factory(Member::class)->create();
        $profile = factory(Profile::class)->create([
            'member_id' => $member->id
        ]);

        $response = $this->put("members/{$member->id}/profile/{$profile->id}", [
                'member_id' => $member->id,
                'church_id' => '1234567',
                'locale'    => 'platero',
                'district'  => 'north',
                'division'  => 'lbmr'
            ]);

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
