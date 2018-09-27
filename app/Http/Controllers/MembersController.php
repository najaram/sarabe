<?php


namespace App\Http\Controllers;

use App\Http\Requests\MembersRequest;
use App\Http\Resources\MembersResource;
use App\Member;
use Illuminate\Http\Request;

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
     * @param MembersRequest $request
     * @return MembersResource
     */
    public function store(MembersRequest $request)
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
}
