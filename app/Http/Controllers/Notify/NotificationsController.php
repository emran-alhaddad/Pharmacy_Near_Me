<?php

namespace App\Http\Controllers\Notify;

use App\Http\Controllers\Controller;
use App\Models\notifications;
use Illuminate\Http\Request;
use Pusher\Pusher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    //

    public function registerNotification($user_name, $email){

        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data['user_name'] = $user_name;
        $data['email'] = $email;



        $pusher->trigger('new_notification', 'App\\Events\\Notify',$data );
    }





    public function ComplaintsNotification($complaint){

        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        // $data['client'] = $client_id;
        // $data['pharmacy'] = $pharmacy_id;
        // $data['message'] = $message;


        $notifications = new notifications();
        // echo $notifications;

        $user = User::find($complaint->client_id);
        $phar = User::find($complaint->pharmacy_id);
        

        $notifications = notifications::create([
            'sender_id'  =>$complaint->client_id,
            'receiver_id'  => $complaint->id,
            'message' => " شكوى جديدة",
            'type' => 'complaint'
       
        
            ]);
        $data =[

            'client_name'=>  $user->name,
            'pharmacy_name'=> $phar->name,
            'message' => $notifications ->message,
            'type'    => $notifications->type,

        ];
        
            $pusher->trigger('new_notification', 'App\\Events\\Notify',$data);
    }


    public function OrdersNotification($data){

        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        // $data['client'] = $client_id;
        // $data['pharmacy'] = $pharmacy_id;
        // $data['message'] = $message;


        $pusher->trigger('new_notification', 'App\\Events\\Notify',$data);
    }


    public static function getNotification()
    {
        $admin_id = 28;
        $notifications = notifications::get();

        $count = count($notifications);

        $data = array('notifications' => $notifications, 'count' => $count);

        return $data;


    }

    public function licenseNotification($id_parmacy)
    {  
        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $notifications = new notifications();
        $notifications = notifications::create([
            'sender_id'  =>$id_parmacy,
            'receiver_id'  =>$id_parmacy,
            'message' => "رخصة جديدة",
            'type' => 'license'
       
        
            ]);
      $phar = User::find($id_parmacy);
      $data =[
      'client_name'=>  'رخصة من ',
      'pharmacy_name'=> $phar->name,
      'message' => $notifications ->message,
      'type'    => $notifications->type,
      ];
      $pusher->trigger('new_notification', 'App\\Events\\Notify',$data);


    }
}
