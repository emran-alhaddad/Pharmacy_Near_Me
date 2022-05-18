<!DOCTYPE html>
<html dir="rtl">

<head>
    <title> Confirem Account</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="{!! asset('auth/css/style.css') !!}">
</head>

<body>

    <div
        style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: 'Lato', Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
        يسعدنا وجودك هنا! كن على استعداد للغوص في حسابك الجديد.
    </div>
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
            <td bgcolor="var(--hover-secondary)" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="var(--hover-secondary)" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="center" valign="top"
                            style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: var(--black); font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                            <h1 style="font-size: 48px; font-weight: 400; margin: 2;">أهلا بك !
                                {!! $data['name'] !!}
                            </h1> <img src=" https://img.icons8.com/clouds/100/000000/handshake.png" width="125"
                                height="120" style="display: block; border: 0px;" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="right"
                            style="padding: 20px 30px 40px 30px; color: var(--black); font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">نحن متحمسون لأن تبدأ معنا ^^ <br>
                                تحتاج إلى تأكيد حسابك.<br>
                                فقط قم بللضغط على الزر أدناه ^^. </p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="right">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="border-radius: 3px;"
                                                    bgcolor="var(--hover-secondary)" class="btn"><a
                                                        href="{!! $data['activation_url'] !!} " target="_blank"
                                                        style="font-size: 20px; font-family: Helvetica, Arial, sans-serif;  text-decoration: none;  text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid var(--hover-secondary); display: inline-block;">تأكيد
                                                        حسابك </a></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> <!-- COPY -->
                    <tr>
                        <td bgcolor="#ffffff" align="right"
                            style="padding: 0px 30px 0px 30px; color: var(--black); font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">إذا لم يفلح ذلك ، فانسخ الرابط التالي والصقه في متصفحك:</p>
                        </td>
                    </tr> <!-- COPY -->
                    <tr>
                        <td bgcolor="#ffffff" align="right"
                            style="padding: 20px 30px 20px 30px; color: var(--black); font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;"><a href="{!! $data['activation_url'] !!}" target="_blank"
                                    style="color: var(--hover-secondary);">{!! $data['activation_url'] !!}</a></p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>

    </table>

</body>

</html>
