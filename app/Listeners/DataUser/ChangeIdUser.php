<?php
/**
 * Created by PhpStorm.
 * User: abid
 * Date: 19/01/2016
 * Time: 12:54
 */

namespace App\Listeners\DataUser;

use App\Events\User\WasCreated;

class ChangeIdUser
{
    public function handle(WasCreated $event)
    {
        try{
            $role = $event->user->roles()->get();
            //ambil data dari model roles()
            if (in_array($role[0]->id, [3, 4, 5]))
            {
                $event->user->username = str_pad($event->user->username.$event->user->id, 8, '0', STR_PAD_RIGHT);
                //$event->user->username = uniqid();
                $event->user->save();
            }
        } catch(\Exception $e){
            throw new \Exception('Error at Listener:' .self::class);
        }
    }
}