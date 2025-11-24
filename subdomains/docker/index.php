<?php header("Content-Type: text/html; charset=utf-8"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MyXen Docker/Vesting | MyXen Foundation</title>
    <meta name="description" content="MyXen Docker - Container and vesting management">
    <style>
        :root {
            --primary: #007AFF;
            --bg: #0a0a0a;
            --text: #ffffff;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: var(--bg);
            color: var(--text);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            text-align: center;
            padding: 20px;
        }
        .container {
            max-width: 600px;
        }
        h1 {
            font-size: clamp(2rem, 5vw, 3rem);
            margin-bottom: 1rem;
            color: var(--primary);
        }
        p {
            font-size: 1.2rem;
            line-height: 1.6;
            opacity: 0.8;
        }
        .back-link {
            margin-top: 2rem;
            display: inline-block;
            padding: 12px 24px;
            background: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: opacity 0.3s;
        }
        .back-link:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🐳 MyXen Docker</h1>
        <p>Container orchestration and vesting platform</p>
        <p style="margin-top: 2rem; opacity: 0.6;">Coming Soon</p>
        <a href="https://myxenpay.finance" class="back-link">← Back to Home</a>
    </div>
</body>
</html>
