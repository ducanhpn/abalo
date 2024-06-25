<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Events\ServerStatusChanged;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


Artisan::command('maintance',function(){
    ServerStatusChanged::dispatch("maintance");
});

Artisan::command('server-on', function(){
    ServerStatusChanged::dispatch("production");
});