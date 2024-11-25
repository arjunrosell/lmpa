<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="{{ asset('lmpa.png') }}" />
        <title>404 - Page Not Found</title>
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
            rel="stylesheet"
        />
        <style>
            body {
                font-family: Inter, sans-serif;
                background-color: #f3f4f6;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .content {
                text-align: center;
                padding: 0 16px;
            }
            .error-code {
                font-size: 100px;
                font-weight: bold;
                color: #1f2937;
                margin: 0;
                line-height: 1;
            }
            .message {
                margin-top: 16px;
                font-size: 18px;
                color: #4b5563;
            }
            .home-button {
                margin-top: 24px;
                display: inline-block;
                background-color: #f98931;
                color: #ffffff;
                padding: 10px 20px;
                border-radius: 8px;
                text-decoration: none;
                font-weight: bold;
                transition: opacity 0.3s ease;
            }
            .home-button:hover {
                opacity: 0.9;
            }
            @media (max-width: 640px) {
                .error-code {
                    font-size: 60px;
                }
                .message {
                    font-size: 16px;
                }
                .home-button {
                    padding: 8px 16px;
                    font-size: 14px;
                }
            }
        </style>
    </head>
    <body>
        <div class="content">
            <h1 class="error-code">404</h1>
            <p class="message">
                Oops! The page you're looking for doesn't exist.
            </p>
            <a href="/" class="home-button">Go Back Home</a>
        </div>
    </body>
</html>
