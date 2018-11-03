<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Member;
use App\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $activities = Activity::count();
        $members = Member::count();
        $services = Service::count();

        return view('pages.dashboard.index', [
            'activities' => $activities,
            'members'    => $members,
            'services'   => $services
        ]);
    }
}
