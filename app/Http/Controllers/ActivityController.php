<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Http\Resources\ActivityResource;

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
}
