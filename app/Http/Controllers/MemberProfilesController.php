<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProfileResource;
use App\Member;

class MemberProfilesController extends Controller
{
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
}
