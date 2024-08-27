<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style>
        * {
            text-align: right;
        }
    </style>
</head>

<body style="background-color: #ffffff; color: #718096; font-family: Arial, sans-serif; line-height: 1.4;">
    <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
                        <td style="padding: 25px 0; text-align: center;">
                            <a href="http://roshem.sa/" style="font-size: 19px; font-weight: bold;">
                                روشم العقارية
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td width="100%" cellpadding="0" cellspacing="0" style="background-color: #edf2f7;">
                            <table align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="background-color: #ffffff; border-radius: 2px; margin: 0 auto; padding: 32px;">
                                <tr>
                                    <td style="font-size: 16px; line-height: 1.5em; text-align: right;direction: rtl;">
                                        <h1 style="font-size: 18px; font-weight: bold;">يوجد طلب تواصل جديد</h1>
                                        <p>الاسم: {{ $name }}</p>

                                        @isset($phone)
                                            <p>رقم الهاتف: <a href="tel:{{ $phone }}">{{ $phone }}</a></p>
                                        @endisset

                                        @isset($email)
                                            <p>البريد الالكتروني: <a href="mailto:{{ $email }}">{{ $email }}</a></p>
                                        @endisset

                                        <p>الخدمة المطلوبة: {{ $service }}</p>

                                        @isset($data)
                                            <p>الرسالة: {{ $data }}</p>
                                        @endisset

                                        <p><br><br>فريق روشم</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                    <td align="center" style="padding: 32px;">
                                        <p style="color: #b0adc5; font-size: 12px;">© 2024 Roshem. All rights reserved.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
