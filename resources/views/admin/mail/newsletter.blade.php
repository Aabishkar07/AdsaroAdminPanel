<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AdsaroNepal - Notification</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: #edf2f7;
            color: #2d3748;
        }

        .container {
            max-width: 700px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.05);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header img {
            width: 100px;
            margin-bottom: 15px;
        }

        .header h1 {
            font-size: 26px;
            margin: 0;
            color: #1a202c;
        }

        .divider {
            width: 60px;
            height: 4px;
            background-color: #ff2d55;
            margin: 20px auto;
            border-radius: 2px;
        }

        .content {
            font-size: 17px;
            line-height: 1.8;
            color: #4a5568;
            padding: 20px 0;
        }

        .content p {
            margin-bottom: 18px;
        }

        .content a {
            color: #e53e3e;
            font-weight: 600;
            text-decoration: none;
        }

        .content a:hover {
            text-decoration: underline;
        }

        .footer {
            text-align: center;
            padding-top: 30px;
            font-size: 14px;
            color: #718096;
            border-top: 1px solid #e2e8f0;
        }

        .social-icons {
            margin-top: 18px;
        }

        .social-icons a {
            margin: 0 10px;
            display: inline-block;
            background: #f7fafc;
            padding: 10px;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .social-icons img {
            width: 24px;
            height: 24px;
        }

        .social-icons a:hover {
            transform: translateY(-2px);
            background-color: #edf2f7;
        }

        @media (max-width: 600px) {
            .container {
                padding: 25px 20px;
            }

            .header h1 {
                font-size: 22px;
            }

            .content {
                font-size: 15px;
            }

            .footer {
                font-size: 13px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="https://Adsaro.com/img/Adsarologo.png" alt="Adsaro Logo" />
            <h1>{{ $mysubject }}</h1>
            <div class="divider"></div>
        </div>

        <div class="content">
            <p>Dear Sir/Madam,</p>
            <p>{!! $content !!}</p>
        </div>

        <div class="footer">
            <p>&copy; 2025 AdsaroNepal. All rights reserved.</p>
            <div class="social-icons">
                <a href="https://www.facebook.com/Adsaronepal" target="_blank" title="Facebook">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6c/Facebook_Logo_2023.png"
                        alt="Facebook" />
                </a>
                <a href="https://www.instagram.com/Adsaronepal/" target="_blank" title="Instagram">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram" />
                </a>
                <a href="https://www.linkedin.com/company/Adsaro/" target="_blank" title="LinkedIn">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/ca/LinkedIn_logo_initials.png"
                        alt="LinkedIn" />
                </a>
                <a href="https://www.youtube.com/@Adsaronepal" target="_blank" title="YouTube">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/YouTube_icon_%282013-2017%29.png"
                        alt="YouTube" />
                </a>
                <a href="https://www.tiktok.com/@Adsaronepal" target="_blank" title="TikTok">
                    <img src="https://img.icons8.com/color/48/000000/tiktok.png" alt="TikTok" />
                </a>
            </div>
        </div>
    </div>
</body>

</html>
