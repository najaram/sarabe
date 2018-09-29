<?php


namespace App\Http\Controllers;

use App\Http\Requests\CreateMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Http\Resources\MembersResource;
use App\Member;

class MembersController extends Controller
{
    /**
     * Get a listing of members.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return MembersResource::collection(Member::paginate());
    }

    /**
     * Get the specified member.
     *
     * @param Member $member
     * @return MembersResource
     */
    public function show(Member $member)
    {
        return MembersResource::make($member);
    }

    /**
     * Create a new member.
     *
     * @param CreateMemberRequest $request
     * @return MembersResource
     */
    public function store(CreateMemberRequest $request)
    {
        $member = Member::create([
            'first_name' => $request->get('first_name'),
            'last_name'  => $request->get('last_name'),
            'birthday'   => $request->get('birthday'),
            'phone'      => $request->get('phone'),
            'address'    => $request->get('address'),
        ]);

        return MembersResource::make($member);
    }

    /**
     * Update a member.
     *
     * @param UpdateMemberRequest $request
     * @param Member $member
     * @return MembersResource
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        $member->update([
            'first_name' => $request->get('first_name'),
            'last_name'  => $request->get('last_name'),
            'birthday'   => $request->get('birthday'),
            'phone'      => $request->get('phone'),
            'address'    => $request->get('address')
        ]);

        return MembersResource::make($member);
    }
}
