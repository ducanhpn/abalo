<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('maintaince_channel', function(){
    return true;
});

