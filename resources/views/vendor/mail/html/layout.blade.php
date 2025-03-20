<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <style>
        /* Embed Dancing Script font directly */
        @font-face {
            font-family: 'Dancing Script';
            font-style: normal;
            font-weight: 700;
            src: url(https://fonts.gstatic.com/s/dancingscript/v25/If2cXTr6YS-zF4S-kcSWSVi_sxjsohD9F50Ruu7B1i03Sup8.woff2) format('woff2');
        }

        .header a {
            font-family: 'Dancing Script', cursive !important;
            font-weight: 700 !important;
            font-size: 2.5em !important;
            color: #333333 !important;
            text-decoration: none !important;
        }

        body {
            background: linear-gradient(135deg, rgba(252, 231, 243, 0.4), rgba(219, 234, 254, 0.4), rgba(243, 232, 255, 0.4)) fixed;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .wrapper {
            background: transparent;
            min-height: 100vh;
        }

        .content {
            max-width: 800px;
            margin: 0 auto;
        }

        .inner-body {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin: 20px auto;
            padding: 30px;
        }

        .content-cell {
            color: #666666;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            font-size: 16px;
            line-height: 1.6;
        }

        .button {
            background-color: #2d3748;
            border-radius: 4px;
            color: #ffffff;
            display: inline-block;
            padding: 12px 24px;
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .button:hover {
            background-color: #1a202c;
        }

        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
                margin: 10px !important;
                padding: 20px !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
    {{ $head ?? '' }}
</head>

<body>

    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    {{ $header ?? '' }}

                    <!-- Email Body -->
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0"
                            style="border: hidden !important;">
                            <table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0"
                                role="presentation">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell">
                                        {{ Illuminate\Mail\Markdown::parse($slot) }}

                                        {{ $subcopy ?? '' }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{ $footer ?? '' }}
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
