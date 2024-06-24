<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('server-status-channel', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

