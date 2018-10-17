<?php

namespace App\Http\Controllers;

use App\Events\Service\ServiceCreated;
use App\Http\Requests\CreateServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    /**
     * Get a listing of services.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ServiceResource::collection(Service::paginate());
    }

    /**
     * Create a service.
     *
     * @param CreateServiceRequest $request
     * @return ServiceResource
     */
    public function store(CreateServiceRequest $request)
    {
        $service = $request->user()->services()->create([
            'title'    => $request->get('title'),
            'schedule' => $request->get('schedule'),
            'note'     => $request->get('note')
        ]);

        ServiceCreated::dispatch($service, Auth::user());

        return ServiceResource::make($service);
    }

    /**
     * Get a service.
     *
     * @param Service $service
     * @return ServiceResource
     */
    public function show(Service $service)
    {
        return ServiceResource::make($service);
    }

    /**
     * Show edit service page.
     *
     * @param Request $request
     * @param Service $service
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, Service $service)
    {
        $serviceId = $request->route('id');

        return view('pages.services.edit', compact('serviceId'));
    }

    /**
     * Update a service.
     *
     * @param UpdateServiceRequest $request
     * @param Service $service
     * @return ServiceResource
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $service->update([
            'user_id'  => $request->get('user_id'),
            'title'    => $request->get('title'),
            'schedule' => $request->get('schedule'),
            'note'     => $request->get('note')
        ]);

        return ServiceResource::make($service);
    }

    /**
     * Delete a task
     *
     * @param Service $service
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return response(null, 204);
    }
}
