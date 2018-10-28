<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Http\Requests\CreateActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Http\Resources\ActivityResource;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    /**
     * Get a listing for activities.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ActivityResource::collection(Activity::paginate());
    }

    /**
     * Get an activity.
     *
     * @param Activity $activity
     *
     * @return ActivityResource
     */
    public function show(Activity $activity)
    {
        $activity = Activity::find($activity->id);

        return ActivityResource::make($activity);
    }

    /**
     * Create an activity.
     *
     * @param CreateActivityRequest $request
     *
     * @return ActivityResource
     */
    public function store(CreateActivityRequest $request)
    {
        $activity = Activity::create([
            'user_id'  => Auth::id(),
            'title'    => $request->get('title'),
            'schedule' => $request->get('schedule'),
            'content'  => $request->get('content')
        ]);

        return ActivityResource::make($activity);
    }

    /**
     * Update activity.
     *
     * @param UpdateActivityRequest $request
     * @param Activity $activity
     * @return ActivityResource
     */
    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        $activity->update([
            'user_id'  => Auth::id(),
            'title'    => $request->get('title'),
            'schedule' => $request->get('schedule'),
            'content'  => $request->get('content')
        ]);

        return ActivityResource::make($activity);
    }

    /**
     * Delete an activity.
     *
     * @param Activity $activity
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();

        return response(null, 204);
    }
}
