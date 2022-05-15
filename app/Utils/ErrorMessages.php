<?php

namespace App\Utils;

class ErrorMessages  
{
  
  CONST LOGIN_FAILD = 'بيانات الدخول غير صحيحة !!';
  CONST REGISTER_FAILD =  "حدث خطأ غير متوقع ... لم نتمكن من تسجيل حسابك !! يرجى المحاولة مرة أخرى";
  CONST EMAIL_VERIFY =  'يجب عليك اولا تأكيد البريد الألكتروني عن طريق الضغط على الرابط المرسل الى بريدك الالكتروني أو إعادة تأكيد ' . "<a href='/resend-email-activation'>البريد الإلكتروني</a>";
  CONST EMAIL_VERIFY_EXPIRED = ' انتهت صلاحية رابط التفعيل هذا اعد تأكيد' . "<a href='/resend-email-activation'>البريد الإلكتروني</a>";
  CONST EMAIL_ACTIVATE = 'حسابك يحتاج تفعيل من مدير الموقع ... لتقديم طلب الى مدير الموقع اضغط على هذا ';
  CONST EMAIL_NOT_FOUND = "البريد الإلكتروني الذي أدخلته غير متوفر ";
  CONST TOKEN_NOT_FOUND = "أن البريد الإلكتروني الذي أدخلتة ليس بريدك";
  CONST TOKEN_EXPIRED = "لقد أنتهت صلاحية هذا الرابط";
  CONST WRONG_PASSWORD = 'كلمة المرور التي أدخلتها غير صحيحة';
  CONST PASSWORD_UPDATE_FAILED = "لم نتمكن من تغيير كلمة المرور ";
  CONST PROFILE_UPDATED_FAILED = "لم نتمكن من تحديث البروفايل ";
  CONST EMAIL_CODE_SEND_FAILED = "حدث خطأ عند إرسال رمز تأكيد تعديل البريد الإلكتروني ... حاول مرة أخرى";
  CONST INVALID_EMAIL_CODE = "رمز التحقق غير صحيح";
  CONST EMAIL_SAME = "أدخل بريد إلكتروني مختلف";



}