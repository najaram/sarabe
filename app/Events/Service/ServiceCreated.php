<?php

namespace App\Events\Service;

use App\Service;
use App\User;
use Illuminate\Foundation\Events\Dispatchable;

class ServiceCreated
{
    use Dispatchable;

    /**
     * Service created.
     *
     * @var Service
     */
    public $service;

    /**
     * Who created the service.
     *
     * @var User
     */
    public $causer;

    /**
     * Create a new event instance.
     *
     * @param Service $service
     * @param User $causer
     */
    public function __construct(Service $service, User $causer = null)
    {
        $this->service = $service;
        $this->causer = $causer;
    }
}
