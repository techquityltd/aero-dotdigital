<?php

namespace Aero\AeroDotDigital\Providers;

use Aero\Common\Providers\ModuleServiceProvider;
use Aero\Common\Facades\Settings;
use Aero\Common\Settings\SettingGroup;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Event;

class ServiceProvider extends ModuleServiceProvider
{
    public function register()
    {

    }

    public function setup()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');

        Settings::group('dotdigital', function (SettingGroup $group) {
            $group->title('DotDigital');
            $group->boolean('active')->label('active')->default(false);
            $group->string('username')->label('API Username');
            $group->string('password')->label('API Password');
        });
    }
}
