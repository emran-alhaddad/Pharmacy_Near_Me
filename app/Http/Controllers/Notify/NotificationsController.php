<?php

namespace App\Http\Controllers\Notify;

use App\Http\Controllers\Controller;
use App\Models\notifications;
use Illuminate\Http\Request;
use Pusher\Pusher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $admin=User::where('email','admin@gmail.com')->first();
        

        $notifications = notifications::create([
            'sender_id'  =>$complaint->id,
            'receiver_id'  => $admin->id,
            'nameFrom'=>$user->name,
            'nameTo'=>$phar->name,
            'message' => " شكوى جديدة",
            'type' => 'complaint'
       
        
            ]);
        $data =[

            // 'client_name'=>  $user->name,
            // 'pharmacy_name'=> $phar->name,
            'receiver_id'  => $admin->id,
            'nameFrom'=>$user->name,
            'message' => $notifications ->message,
            'type'    => $notifications->type,

        ];
            $pusher=$this->returnPusher();
            $pusher->trigger('new_notification', 'App\\Events\\Notify',$data);
    }


    public static function getNotification()
    {
        
        $notifications = notifications::where('is_active','=',1)->get();
        $count = count($notifications);
        $data = array('notifications' => $notifications, 'count' => $count);
        return $data;
    }
    public static function getCountNotification($id)
    {
        $count = DB::table('notifications')->where('receiver_id',$id)->count();
        return $count;
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
        $admin=User::where('email','admin@gmail.com')->first();
        $pusher=$this->returnPusher();
        $phar = User::find($id_parmacy);
        $notifications = new notifications();
        $notifications = notifications::create([
            'sender_id'  =>$id_parmacy,
            'receiver_id'  =>$admin->id,
            'nameFrom'=>$phar->name,
            'image'=>$phar->avater,
            'message' => " من رخصة جديدة",
            'type' => 'license'
       
        
            ]);
      $phar = User::find($id_parmacy);
      $data =[
    //   'client_name'=>  'رخصة من ',
    //   'pharmacy_name'=> $phar->name,
    'receiver_id'  =>$admin->id,
    'nameFrom'=>$phar->name,
    'image'=>$phar->avater,
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
            // 'user_id'=>$phar_id,
            'sender_id'  =>$client_id,
            'receiver_id'  =>$phar_id,
            'nameFrom'=>$client->name,
            'image'=>$client->avater,
            'request_id'=>$request_id,
            'nameTo'=>$phar->name,
            'message' => " جديدة طلبية",
            'type' => 'wait-acceptance'
       
        
            ]);

            $data =[
                // 'user_id'=>$phar_id,
                'receiver_id'  =>$phar_id,
                'nameFrom'=>$client->name,
                'request_id'=>$request_id,
                'image'=>$client->avater,
                'pharmacy_name'=> $phar->name,
                'message' => " جديدة طلبية",
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
        $message="رد من الصيدلية";
        $notifications = new notifications();
        $notifications = notifications::where('request_id', '=', $idRequest)->update(array('type' => 'wait-pay',
                                                                                           'receiver_id'  =>$client->id,
                                                                                        'message'=>$message,
                                                                                        'nameFrom'=>$phar->name,
                                                                                        'image'=>$phar->avater,
                                                                                        'nameTo'=>$phar->name));
            // // 'user_id'=>$client->id,
            // // 'sender_id'  =>$phar->id,
            // // 'receiver_id'  =>$client->id, 
            // // 'nameFrom'=>$phar->name,
            // // 'request_id'=>$idRequest,
            // // // 'nameTo'=>$phar->name,
            // // 'message' => "رد من الصيدلية",
            // // 'type' => 'wait-pay'
       
        
            // ]);
            $data =[
            //     'user_id'=>$client->user_id,
            //     'client_name'=>  ' قبول  ',
            'receiver_id'  =>$client->id, 
            'nameFrom'=>$phar->name,
            'request_id'=>$idRequest,
            'image'=>$phar->avater,
                'pharmacy_name'=> $phar->name,
                'message' =>$message,
                'type' => 'wait-pay'
                ];

            $pusher->trigger('new_notification', 'App\\Events\\Notify',$data);
    }

    // ارسال اشعار الى الصيدلية بان المستخدم رفض عرض السعر
    public function rejectUserOrderNotification($idRequest)
    {
        $pusher=$this->returnPusher();
        $request=CustormerRequest::find($idRequest);
        $phar = User::find($request->pharmacy_id);
        $client = User::find($request->client_id);
        $message="رفض العرض";

        $notifications = new notifications();
        $notifications = notifications::where('request_id', '=', $idRequest)->update(array('type' => 'not-completed',
                                                                                           'receiver_id'=>$phar->id,
                                                                                         'message'=>$message,
                                                                                         'image'=>$client->avater,
                                                                                         'nameFrom'=>$client->name,
                                                                                         'nameTo'=>$phar->name));
            // 'user_id'=>$phar->id,
            // 'sender_id'  =>$client->id,
            // 'receiver_id'  =>$phar->id,
            // 'nameFrom'=>$client->name,
            // 'request_id'=>$idRequest,
            // // 'nameTo'=>$phar->name,
            // 'message' => " رفض العرض",
            // 'type' => 'not-completed'
       
        
            // ]);

            $data =[
                'receiver_id'  =>$phar->id,
                'nameFrom'=>$client->name,
                'request_id'=>$idRequest,
                'image'=>$client->avater,
                'pharmacy_name'=> $client->name,
                'message' => $message,
                'type' => 'not-completed"'
                ];

            $pusher->trigger('new_notification', 'App\\Events\\Notify',$data);

    }
    // ارسال اشعار من صيدلية الى المستخدم لا يوجد الطلبية
    public function replyRejectFromPharToCustomerNotification($idRequest)
    {
        $pusher=$this->returnPusher();
        $request=CustormerRequest::find($idRequest);
        $phar = User::find($request->pharmacy_id);
        $client = User::find($request->client_id);
        $message= "غير متوفرة";
        $notifications = new notifications();
        $notifications = notifications::where('request_id', '=', $idRequest)->update(array('type' => 'rejected',
                                                                                           'receiver_id'  =>$client->id,
                                                                                           'image'=>$phar->avater,
                                                                                           'message'=>$message,
                                                                                           'nameFrom'=>$phar->name, 
                                                                                           'nameTo'=>$phar->name));
            // 'user_id'=>$client->id,
            // 'sender_id'  =>$phar->id,
            // 'receiver_id'  =>$client->id,
            // 'nameFrom'=>$phar->name,
            // 'request_id'=>$idRequest,
            // // 'nameTo'=>$phar->name,
            // 'message' =>,
            // 'type' => 'rejected'
       
        
            // ]);   
            $data =[
                'receiver_id'  =>$client->id,
                'client_name'=>  ' رفض  ',
                'nameFrom'=>$phar->name,
                'request_id'=>$idRequest,
                'image'=>$phar->avater,
                'message' => $message,
                'type' => 'rejected'
                ];

            $pusher->trigger('new_notification', 'App\\Events\\Notify',$data);
    }
    // ارسال اشعار الى الصيدلية بان المستخدم قام بالدفع بنجاح
    public function paymentCompletedSuccessfully($idRequest)
    {
        $pusher=$this->returnPusher();
        $request=CustormerRequest::find($idRequest);
        $phar = User::find($request->pharmacy_id);
        $client = User::find($request->client_id);
        $message=" تمت عملية الدفع بنجاح";

        $notifications = new notifications();
        $notifications = notifications::where('request_id', '=', $idRequest)->update(array('type' => 'wait-delivery',
                                                                                            'receiver_id'  =>$phar->id,
                                                                                            'image'=>$client->avater,
                                                                                            'message'=>$message,
                                                                                            'nameFrom'=>$client->name,
                                                                                            'nameTo'=>$phar->name, ));
            // 'user_id'=>$phar->id,
            // 'sender_id'  =>$client->id,
            // 'receiver_id'  =>$phar->id,
            // 'nameFrom'=>$client->name,
            // 'request_id'=>$idRequest,
            // 'nameTo'=>$phar->name,
            // 'message' => " تمت عملية الدفع بنجاح",
            // 'type' => 'wait-delivery'
       
        
            // ]);

            $data =[
                'receiver_id'  =>$phar->id,
                'nameFrom'=>$client->name,
                'request_id'=>$idRequest,
                'image'=>$client->avater,
                // 'pharmacy_name'=> $client->name,
                'message' => $message,
                'type' => 'wait-delivery'
                ];

            $pusher->trigger('new_notification', 'App\\Events\\Notify',$data);

    }
    // ارسال اشعار الى الصيدلية بان تم قبول الطلبية
    public function ConfirmArrivalOrderAfterPayment($idRequest)
    {
        $pusher=$this->returnPusher();
        $request=CustormerRequest::find($idRequest);
        $phar = User::find($request->pharmacy_id);
        $client = User::find($request->client_id);
        $message=" تمت عملية التوصيل بنجاح";

        $notifications = new notifications();
        $notifications =notifications::where('request_id', '=', $idRequest)->update(array('type' => 'completed',
                                                                                           'receiver_id'  =>$phar->id,
                                                                                    'message'=> $message ,
                                                                                    'image'=>$client->avater,
                                                                                    'nameFrom'=>$client->name ,
                                                                                    'nameTo'=>$phar->name ));
            // 'user_id'=>$phar->id,
            // 'sender_id'  =>$client->id,
            // 'receiver_id'  =>$phar->id,
            // 'nameFrom'=>$client->name,
            // 'request_id'=>$idRequest,
            // 'nameTo'=>$phar->name,
            // 'message' => " تمت عملية التوصيل بنجاح",
            // 'type' => 'completed'
       
        
            // ]);


            $data =[
                'receiver_id'  =>$phar->id,
                'nameFrom'=>$client->name,
                'request_id'=>$idRequest,
                'image'=>$client->avater,
                // 'pharmacy_name'=> $client->name,
                'message' => $message,
                'type' => 'completed'
                ];

            $pusher->trigger('new_notification', 'App\\Events\\Notify',$data);   
    }
   
}
