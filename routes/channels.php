<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;

});
Broadcast::channel('order.created.admin.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('Order.update.status.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
},['guards'=>['customers','web']]);