<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting"> <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title>Order Confirmation - [Plain HTML]</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500" rel="stylesheet">
    <style>
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
        }

        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        /* What it does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }

        table table table {
            table-layout: auto;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        *[x-apple-data-detectors],
        /* iOS */
        .x-gmail-data-detectors,
        /* Gmail */
        .x-gmail-data-detectors *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        .a6S {
            display: none !important;
            opacity: 0.01 !important;
        }

        img.g-img+div {
            display: none !important;
        }

        /* What it does: Prevents underlining the button text in Windows 10 */
        .button-link {
            text-decoration: none !important;
        }

        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
            .email-container {
                min-width: 375px !important;
            }
        }
    </style>
    <style>
        .button-td,
        .button-a {
            transition: all 100ms ease-in;
        }

        .button-td:hover,
        .button-a:hover {
            background: #555555 !important;
            border-color: #555555 !important;
        }

        /* Media Queries */
        @media screen and (max-width: 480px) {
            .fluid {
                width: 100% !important;
                max-width: 100% !important;
                height: auto !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }

            .stack-column,
            .stack-column-center {
                display: block !important;
                width: 100% !important;
                max-width: 100% !important;
                direction: ltr !important;
            }

            /* And center justify these ones. */
            .stack-column-center {
                text-align: center !important;
            }

            .center-on-narrow {
                text-align: center !important;
                display: block !important;
                margin-left: auto !important;
                margin-right: auto !important;
                float: none !important;
            }

            table.center-on-narrow {
                display: inline-block !important;
            }

            .email-container p {
                font-size: 17px !important;
                line-height: 22px !important;
            }
        }
    </style>
</head>

<body width="100%" bgcolor="#F1F1F1" style="margin: 0; mso-line-height-rule: exactly;">
    <center style="width: 100%; background: #F1F1F1; text-align: left;">
        <div
            style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;">
            Glad to have you on board!</div>
        <div style="max-width: 680px; margin: auto;" class="email-container">
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%"
                style="max-width: 680px;" class="email-container">
                <tr>
                    <td bgcolor="#333333">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td style="padding: 30px 40px 30px 40px; text-align: center;"> <span
                                        style="color:#fff; font-size: 30px">Maogmang Belly</span> </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#222222" align="center" valign="top"
                        style="text-align: center; background-position: center center !important; background-size: cover !important;">
                        <div>
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0" align="center"
                                width="100%" style="max-width:500px; margin: auto;">
                                <tr>
                                    <td align="center" valign="middle">
                                        <table>
                                            <tr>
                                                <td valign="top"
                                                    style="text-align: center; padding: 60px 0 10px 20px;">
                                                    <h1
                                                        style="margin: 0; font-family: 'Montserrat', sans-serif; font-size: 30px; line-height: 36px; color: #ffffff; font-weight: bold;">
                                                        Thank You For Your Order!</h1>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign="top"
                                                    style="text-align: center; padding: 10px 20px 15px 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #fff;">
                                                    <p style="margin: 0;">This is to confirm your order. Details of your
                                                        order can be found below.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="20" style="font-size:20px; line-height:20px;">&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>

                                </tr>
                                <tr>
                                    <td height="20" style="font-size:20px; line-height:20px;">&nbsp;</td>
                                </tr>
                            </table>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td bgcolor="#ffffff">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td height="20" style="font-size:20px; line-height:20px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td
                                    style="padding: 0px 40px 20px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: left; font-weight:bold;">
                                    <p style="margin: 0;">Order ID: {{ $mailData['id'] }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="padding: 0px 40px 20px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: left; font-weight:bold;">
                                    <p style="margin: 0;">Order Type:
                                    @if($mailData['order_type']  == 'O')
                                        @if($mailData['delivery_type'] != 'P') Delivery
                                        @else Pick-Up
                                        @endif
                                    @elseif($mailData['order_type'] == 'C') Catering
                                    @else Reservation
                                    @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="padding: 0px 40px 10px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: left; font-weight:bold;">
                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                        <tr>
                                            <td>Orders:</td>
                                        </tr>
                                        @for ($i = 0; $i < $mailData['order_count']; $i++)
                                        <tr>
                                            <td>{{ $mailData['order_lines'][$i]['quantity'] }} pcs of {{ $mailData['order_lines'][$i]['name'] }} @ &#8369; {{ $mailData['order_lines'][$i]['price'] }} each  -  &#8369; {{ $mailData['order_lines'][$i]['total_price'] }}</td>
                                        </tr>
                                        @endfor
                                        <tr>
                                            <td height="10" style="font-size:10px; line-height:10px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><h4>Grand Total : &#8369; {{ $mailData['grand_total'] }}</h4></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            @if($mailData['delivery_type'] != 'P')
                            <tr>
                                <td
                                    style="padding: 0px 40px 20px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: left; font-weight:bold;">
                                    <p style="margin: 0;">Delivery Address: {{ $mailData['address'] }}</p>
                                </td>
                            </tr>
                            @endif
                            @if($mailData['order_type'] != 'O')
                            <tr>
                                <td
                                    style="padding: 0px 40px 20px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: left; font-weight:bold;">
                                    <p style="margin: 0;">Date Needed: {{ $mailData['date_needed'] }}</p>
                                </td>
                            </tr>
                            @endif
                            <tr>
                                <td style="padding: 0px 40px 20px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; text-align: left; font-weight:normal;">
                                    <p style="margin: 0;">Thank you for ordering. We hope to see you again soon!</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr> <!-- INTRO : END -->
                <!-- CTA : BEGIN -->
                <tr>
                    <td bgcolor="#ffffff">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"> <br>
                            <tr>
                                <td align="center"> <img
                                        src="https://drive.google.com/uc?id=1pA3x4pPl6X96TjAAs9apzDNKKYNDw4zL"
                                        width="37" height="37" style="display: block; border: 0px;" /> </td>
                            </tr>
                            <tr>
                                <td align="center"
                                    style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 5px 0 10px 0;">
                                    <p style="font-size: 14px; font-weight: 800; line-height: 18px; color: #333333;">
                                        Maogmang Belly<br> Elias Angeles Street, Naga City, Bicol</p>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="padding: 0px 40px 10px 40px; font-family: sans-serif; font-size: 12px; line-height: 18px; color: #666666; text-align: center; font-weight:normal;">
                                    <p style="margin: 0;">This email was sent to you from maogmangbelly@gmail.com</p>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    style="padding: 0px 40px 40px 40px; font-family: sans-serif; font-size: 12px; line-height: 18px; color: #666666; text-align: center; font-weight:normal;">
                                    <p style="margin: 0;">Copyright &copy; 2023 <b>MaogmangBelly.com</b>, All Rights
                                        Reserved.</p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </center>
</body>

</html>

{{-- <!DOCTYPE html>
<html>

<head>
    <h2>Order Confirmation</h2>
</head>

<body>
    <p>Hello {{ $mailData['fname'] }}!</p>

    <p class="fs-4">This is to confirm your order: </p>
    <p>ID : {{ $mailData['orderid'] }}</p>
    <p>Order Type : {{ $mailData['orderType'] }}</p>
    <h4>Products Ordered</h4>
    <table class="table table-borderless">
        <thead>
            <tr>
                <th>Product</th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < $mailData['order_count']; $i++)
                <tr>
                    <td>{{ $mailData['orders'][$i]['product_name'] }}</td>
                    <td>{{ $mailData['orders'][$i]['price'] }}</td>
                    <td>{{ $mailData['orders'][$i]['quantity'] }}</td>
                    <td>{{ $mailData['orders'][$i]['total_price'] }}</td>
                </tr>
            @endfor
        </tbody>

    </table>
    <p>Your order will arrive shortly. Thank you!</p>
</body>

</html> --}}
