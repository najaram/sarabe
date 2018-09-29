<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMemberProfileRequest;
use App\Http\Requests\UpdateMemberProfileRequest;
use App\Http\Resources\ProfileResource;
use App\Member;
use App\Profile;

class MemberProfilesController extends Controller
{
    /**
     * Store a new member profile.
     *
     * @param CreateMemberProfileRequest $request
     * @param Member $member
     * @return ProfileResource
     */
    public function store(CreateMemberProfileRequest $request, Member $member)
    {
        $profile = $member->profile()->create([
            'church_id' => $request->get('church_id'),
            'locale'    => $request->get('locale'),
            'district'  => $request->get('district'),
            'division'  => $request->get('division'),
            'group'     => $request->get('group')
        ]);

        return ProfileResource::make($profile);
    }

    /**
     * Display members profile.
     *
     * @param Member $member
     * @return ProfileResource
     */
    public function show(Member $member)
    {
        $profile = Member::find($member->id)->profile;

        return ProfileResource::make($profile);
    }

    /**
     * Update a members profile.
     *
     * @param UpdateMemberProfileRequest $request
     * @param Member $member
     * @return ProfileResource
     */
    public function update(UpdateMemberProfileRequest $request, Member $member, Profile $profile)
    {
        abort_unless($member->id == $profile->member_id, 404);

        $profile->update([
            'church_id' => $request->get('church_id'),
            'locale'    => $request->get('locale'),
            'district'  => $request->get('district'),
            'division'  => $request->get('division'),
            'group'     => $request->get('group'),
        ]);

        return ProfileResource::make($profile);
    }
}
