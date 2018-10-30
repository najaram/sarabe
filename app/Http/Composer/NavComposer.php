<?php

namespace App\Http\Composer;

use Illuminate\View\View;

class NavComposer
{
    public $menus = [];

    public function __construct()
    {
        $this->menus = [
            [
                'label' => 'Dashboard',
                'icon'  => 'dvr'
            ],
            [
                'label' => 'Activities',
                'icon'  => 'directions_bike'
            ],
            [
                'label' => 'Members',
                'icon'  => 'group'
            ],
            [
                'label' => 'Services',
                'icon'  => 'gavel'
            ],
            [
                'label' => 'Logs',
                'icon'  => 'assignment'
            ]
        ];
    }

    public function compose(View $view)
    {
        $view->with('menus', $this->menus);
    }
}
