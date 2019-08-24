<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/


/*
Broadcast::channel('App.user.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
*/

use Illuminate\Support\Facades\Broadcast;
/*
Broadcast::channel('DoubleChannel', function ($rotate) {
    return [
        'rotate' => $rotate,
    ];
});*/

/*
Broadcast::channel('DoubleChannel', function ($user, $orderId) {
    return $user->id === Order::findOrNew($orderId)->user_id;
});
*/
