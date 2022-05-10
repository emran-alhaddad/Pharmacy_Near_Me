<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\UpdateEmail;
use App\Models\User;
use App\Models\Complaint;
use App\Utils\ErrorMessages;
use App\Utils\SuccessMessages;
use App\Utils\UploadingUtils;
use App\Utils\UserUtils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{

    // Show Client Profile page
    public function index()
    {
        $client = User::with('client')->where('id', Auth::id())->firstOrFail();
        return view('user.index', ['user' => $client]);
    }
    public function edit_profile()
    {
        $client = User::with('client')->where('id', Auth::id())->firstOrFail();
        return view('user.edit_profile', ['user' => $client]);
    }
    public function chat()
    {
        $client = User::with('client')->where('id', Auth::id())->firstOrFail();
        return view('user.chat', ['user' => $client]);
    }

    public function myorder()
    {
        $client = User::with('client')->where('id', Auth::id())->firstOrFail();
        return view('user.myorder', ['user' => $client]);
    }

    public function settings()
    {
        $client = User::with('client')->where('id', Auth::id())->firstOrFail();
        return view('user.settings', ['user' => $client]);
    }

    public function problems()
    {
        
    $UserId = Auth::id();

    $complaint = Complaint::with(['pharmacy.user'])
      ->where('client_id', Auth::id())->orderByDesc('id')->get();
    $client = User::with('client')->where('id', Auth::id())->firstOrFail();

    return view('user.problems', [
      'compliants' => $complaint,
      'user' => $client
    ]);
    }

    public function updateAvater(Request $request)
    {
        $request->validate(
            ['avater' => 'required|image|mimes:png,jpg'],
            [
                'avater.required' => "يجب عليك إدخال الصورة بالأول",
                'avater.image' => "الملف الذي قمت برفعه ليس صورة",
                'avater.mimes' => "نوع الصورة المقبول هو png , jpg فقط",
            ]
        );
        $path = UserUtils::CLIENT_AVATER_PATH;

        if (!$path) return back()->with('error', 'حصل خطأ');

        $avater = UploadingUtils::updateImage(
            $request->avater,
            $path,
            $path . Auth::user()->avater
        );

        User::find(Auth::id())->update(['avater' => $avater]);

        return back()->with('status', 'تم التعديل بنجاح');
    }

    // Show Edit Client Profile page
    public function edit()
    {
        $client = User::with('client')->where('id', Auth::id())->firstOrFail();
        return view('user.profile.edit', ['user' => $client]);
    }

    // Update Client Data
    public function  update(Request $request)
    {
        $this->validateClient($request);
        $id = Auth::id();
        $userData = DB::table('users')
            ->where('id', $id)
            ->update(
                [
                    'name' => $request->name,
                    'phone' => $request->phone,
                ]
            );

        if (!$userData)
            return back()->with('error', ErrorMessages::PROFILE_UPDATED_FAILED);


        $clientData = DB::table('clients')
            ->where('user_id', $id)
            ->update(
                [
                    'dob' => $request->dob,
                    'address' => $request->address,
                    'gender' => $request->gender,
                ]
            );

        if (!$clientData)
            return back()->with('error', ErrorMessages::PROFILE_UPDATED_FAILED);

        return back()->with('status', SuccessMessages::PROFILE_UPDATED_SUCCESS);
    }


    public function updatePassword(Request $request)
    {
        if (!$this->validatePassword($request))
            return back()->withErrors([
                'password' => ErrorMessages::WRONG_PASSWORD,
                'modal' => 'edit-password'
            ]);


        DB::table('users')
            ->where('id', Auth::id())
            ->update(['password' => Hash::make($request['new_password'])]);

        return back()->with(['status' => SuccessMessages::PASSWORD_UPDATE_SUCCESS]);
    }

    public function updateEmail(Request $request)
    {
        if (!$this->validateEmail($request))
            return back()->withErrors([
                'email' => ErrorMessages::EMAIL_SAME,
                'modal' => 'edit-email'
            ]);
        $id = Auth::id();
        if (DB::table('users')->where([['remember_token', $request['code']], ['id', $id]])->exists()) {
            DB::table('users')
                ->where('users.id', $id)
                ->update(['email' => $request['email']]);

            return back()->with(['status' => SuccessMessages::EMAIL_UPDATED_SUCCESS]);
        } else {
            return back()->withErrors([
                'code' => ErrorMessages::INVALID_EMAIL_CODE,
                'modal' => 'edit-email'
            ]);
        }
    }

    public function sendEmailCode(Request $request)
    {
        try {
            if ($request->email == Auth::user()->email)
                return ['type' => 'danger', 'data' => ErrorMessages::EMAIL_SAME];

            $number = rand(11111, 99999);
            $email_data = [
                'name' => Auth::user()->name,
                'activation_code' => $number
            ];

            $update = DB::table('users')
                ->where('id', Auth::id())
                ->update([
                    'remember_token' => $number
                ]);
            if ($update) {
                Mail::to($request->email)->send(new UpdateEmail($email_data));
                return ['type' => 'success', 'data' => SuccessMessages::EMAIL_CODE_SEND_SUCCESS];
            } else
                return ['type' => 'danger', 'data' => ErrorMessages::EMAIL_CODE_SEND_FAILED];
        } catch (\Exception $th) {
            return ['type' => 'danger', 'data' => ErrorMessages::EMAIL_CODE_SEND_FAILED];
        }
    }


    private function validatePassword(Request $request)
    {
        $password_match = Hash::check($request->password, auth()->user()->password);

        if (!$password_match)
            return false;


        $request->validate([
            'new_password' => 'required|min:8',
            'new_password_confirmed' => 'same:new_password'
        ], [
            'new_password.required' => "كلمة المرور يجب ألا تكون فارغة",
            'new_password.min' => "يجب ألا يقل طول كلمة السر عن 8 احرف  ",
            'new_password_confirmed.same' => "يجب أن يتطابق هذا الحقل مع كلمة المرور",
        ]);

        return true;
    }

    private function validateEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users'
        ], [
            'email.required' => "البريد الألكتروني يجب ألا يكون فارغا",
            'email.email' => "صيغة البريد الإلكتروني غير صحيحة",
            'email.unique' => "البريد الألكتروني هذا مسجل لدينا مسبقا ",
        ]);

        if ($request->email == Auth::user()->email)
            return false;
        return true;
    }


    private function validateClient(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5|max:100',
            'dob' => 'date',
            'phone' => 'alpha_num',
            'address' => 'min:3|max:100',
        ], [
            'name.required' => "الأسم يجب ألا يكون فارغا",
            'name.string' => "الأسم يجب أن يكون نص",
            'name.min' => "يجب ألا يقل طول الأسم عن 5 احرف  ",
            'name.max' => "يجب ألا يزيد طول الأسم عن 100 حرف  ",
            'dob.date' => "صيغة تاريخ الميلاد غير صحيحة",
            'dob.before' => " تاريخ الميلاد يجب أن يبدأ بتاريخ قبل تاريخ اليوم",
            'phone.alpha_num' => "رقم الهاتف يتكون من أرقام فقط",
            'address.min' => "يجب ألا يقل طول العنوان عن 3 احرف  ",
            'address.max' => "يجب ألا يزيد طول العنوان عن 100 حرف  ",
        ]);

        if (!empty($request->dob))
            $request->validate(
                ['dob' => 'date'],
                ['dob.date' => "صيغة تاريخ الميلاد غير صحيحة"]
            );

        if (!empty($request->phone))
            $request->validate(
                ['phone' => 'alpha_num'],
                ['phone.alpha_num' => "رقم الهاتف يتكون من أرقام فقط"]
            );

        if (!empty($request->address))
            $request->validate(
                ['address' => 'min:3|max:100'],
                [
                    'address.min' => "يجب ألا يقل طول العنوان عن 3 احرف  ",
                    'address.max' => "يجب ألا يزيد طول العنوان عن 100 حرف  "
                ]
            );
    }
}
