<?php

namespace App\Http\Controllers\Notify;

use App\Http\Controllers\Controller;
use App\Models\notifications;
use Illuminate\Http\Request;
use Pusher\Pusher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Request as CustormerRequest;

class NotificationsController extends Controller
{
    //
    public function returnPusher()
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
        return $pusher;
    }
    public function registerNotification($user_name, $email){

        // $options = array(
        //     'cluster' => env('PUSHER_APP_CLUSTER'),
        //     'encrypted' => true
        // );
        // $pusher = new Pusher(
        //     env('PUSHER_APP_KEY'),
        //     env('PUSHER_APP_SECRET'),
        //     env('PUSHER_APP_ID'),
        //     $options
        // );
        $pusher=$this->returnPusher();
        $data['user_name'] = $user_name;
        $data['email'] = $email;



        $pusher->trigger('new_notification', 'App\\Events\\Notify',$data );
    }





    public function ComplaintsNotification($complaint){

       

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
            'nameFrom'=>$user->name,
            'nameTo'=>$phar->name,
            'message' => " شكوى جديدة",
            'type' => 'complaint'
       
        
            ]);
        $data =[

            'client_name'=>  $user->name,
            'pharmacy_name'=> $phar->name,
            'message' => $notifications ->message,
            'type'    => $notifications->type,

        ];
            $pusher=$this->returnPusher();
            $pusher->trigger('new_notification', 'App\\Events\\Notify',$data);
    }


    public function OrdersNotification($data){

        // $options = array(
        //     'cluster' => env('PUSHER_APP_CLUSTER'),
        //     'encrypted' => true
        // );
        // $pusher = new Pusher(
        //     env('PUSHER_APP_KEY'),
        //     env('PUSHER_APP_SECRET'),
        //     env('PUSHER_APP_ID'),
        //     $options
        // );
        $pusher=$this->returnPusher();

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
        // $options = array(
        //     'cluster' => env('PUSHER_APP_CLUSTER'),
        //     'encrypted' => true
        // );
        // $pusher = new Pusher(
        //     env('PUSHER_APP_KEY'),
        //     env('PUSHER_APP_SECRET'),
        //     env('PUSHER_APP_ID'),
        //     $options
        // );
        $pusher=$this->returnPusher();
        $phar = User::find($id_parmacy);
        $notifications = new notifications();
        $notifications = notifications::create([
            'sender_id'  =>$id_parmacy,
            'receiver_id'  =>$id_parmacy,
            'nameFrom'=>$phar->name,
            'message' => " من رخصة جديدة",
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
     //send notification to pharmcy there is ordered
    public function AddOrderToParNotification($phar_id,$client_id,$request_id)
    {
        $pusher=$this->returnPusher();
        $phar = User::find($phar_id);
        $client = User::find($client_id);

        $notifications = new notifications();
        $notifications = notifications::create([
            'user_id'=>$phar_id,
            'sender_id'  =>$client_id,
            'receiver_id'  =>$phar_id,
            'nameFrom'=>$client->name,
            'request_id'=>$request_id,
            'nameTo'=>$phar->name,
            'message' => " جديدة طلبية",
            'type' => 'newOrder'
       
        
            ]);

            $data =[
                'user_id'=>$phar_id,
                'client_name'=>  ' طلبية ',
                'pharmacy_name'=> $phar->name,
                'message' => $notifications ->message,
                'type'    => $notifications->type,
                ];

            $pusher->trigger('new_notification', 'App\\Events\\Notify',$data);

        
    }
    // public function AddOrderToParNotification($phar_id,$client_id,$request_id)
    // {
    //     $pusher=$this->returnPusher();
    //     $phar = User::find($phar_id);
    //     $client = User::find($client_id);

    //     $notifications = new notifications();
    //     $notifications = notifications::create([
    //         'sender_id'  =>$client_id,
    //         'receiver_id'  =>$phar_id,
    //         'nameFrom'=>$client->name,
    //         'request_id'=>$request_id,
    //         'nameTo'=>$phar->name,
    //         'message' => " جديدة طلبية",
    //         'type' => 'newOrder'
       
        
    //         ]);
        
    // } 

    //send notification to client offer price
    public function replyAccesptFromPharToCustomerNotification($idRequest,$idReply)
    {
        $pusher=$this->returnPusher();
        $request=CustormerRequest::find($idRequest);
        $phar = User::find($request->pharmacy_id);
        $client = User::find($request->client_id);

        $notifications = new notifications();
        $notifications = notifications::create([
            'user_id'=>$client->id,
            'sender_id'  =>$phar->id,
            'receiver_id'  =>$client->id, 
            'nameFrom'=>$phar->name,
            'request_id'=>$idRequest,
            // 'nameTo'=>$phar->name,
            'message' => "رد من الصيدلية",
            'type' => 'offerPrice'
       
        
            ]);
            $data =[
                'user_id'=>$client->user_id,
                'client_name'=>  ' قبول  ',
                'pharmacy_name'=> $phar->name,
                'message' => $notifications ->message,
                'type'    => $notifications->type,
                ];

            $pusher->trigger('new_notification', 'App\\Events\\Notify',$data);
    }
    public function rejectUserOrderNotification($idRequest)
    {
        $pusher=$this->returnPusher();
        $request=CustormerRequest::find($idRequest);
        $phar = User::find($request->pharmacy_id);
        $client = User::find($request->client_id);

        $notifications = new notifications();
        $notifications = notifications::create([
            'user_id'=>$client->user_id,
            'sender_id'  =>$phar->user_id,
            'receiver_id'  =>$client->user_id,
            'nameFrom'=>$phar->name,
            'request_id'=>$idRequest,
            // 'nameTo'=>$phar->name,
            'message' => "رد من الصيدلية",
            'type' => 'reject'
       
        
            ]);

    }
    public function replyRejectFromPharToCustomerNotification($idRequest)
    {
        $pusher=$this->returnPusher();
        $request=CustormerRequest::find($idRequest);
        $phar = User::find($request->pharmacy_id);
        $client = User::find($request->client_id);

        $notifications = new notifications();
        $notifications = notifications::create([
            'user_id'=>$client->user_id,
            'sender_id'  =>$phar->user_id,
            'receiver_id'  =>$client->user_id,
            'nameFrom'=>$phar->name,
            'request_id'=>$idRequest,
            // 'nameTo'=>$phar->name,
            'message' => "رد من الصيدلية",
            'type' => 'reject'
       
        
            ]);   
            $data =[
                'user_id'=>$client->user_id,
                'client_name'=>  ' رفض  ',
                'pharmacy_name'=> $phar->name,
                'message' => $notifications ->message,
                'type'    => $notifications->type,
                ];

            $pusher->trigger('new_notification', 'App\\Events\\Notify',$data);
    }
    // public static function getnewOrder(){
        
    //     $notifications = notifications::where('type','newOrder')->get();
    //     $count = count($notifications);
    //     $data = array('newOrder' => $notifications, 'count' => $count);
    //     return $data;
    // }
}
