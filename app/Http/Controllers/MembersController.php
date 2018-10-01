<?php


namespace App\Http\Controllers;

use App\Http\Requests\CreateMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Http\Resources\MemberResource;
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
        return MemberResource::collection(Member::paginate());
    }

    /**
     * Get the specified member.
     *
     * @param Member $member
     * @return MemberResource
     */
    public function show(Member $member)
    {
        return MemberResource::make($member);
    }

    /**
     * Create a new member.
     *
     * @param CreateMemberRequest $request
     * @return MemberResource
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

        return MemberResource::make($member);
    }

    /**
     * Update a member.
     *
     * @param UpdateMemberRequest $request
     * @param Member $member
     * @return MemberResource
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

        return MemberResource::make($member);
    }

    /**
     * Delete a member.
     *
     * @param Member $member
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return response(null, 204);
    }
}
