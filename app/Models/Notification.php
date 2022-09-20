<?php

namespace App\Models;

use App\Traits\NotificationMessageTrait;
use Illuminate\Notifications\DatabaseNotification;

class Notification extends DatabaseNotification
{
    use NotificationMessageTrait ;

    protected $guarded = [];

}
