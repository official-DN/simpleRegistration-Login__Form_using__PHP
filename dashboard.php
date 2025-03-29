<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
echo '  <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Login</title>
            <style>
                .body{
                    justify-content: center;
                    align-items: center;
                }
                .head{
                    color: #1cca1c;
                    text-align: center;
                }
                .cont{
                    height: auto;
                    margin: auto;
                    position: absolute;
                    left: 47%;
                    right: 50%;

                }
                .btn {
                    align-content:center ;
                    background-color: #555aec;
                    color: #fff;
                    padding: 10px 20px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                }

                .btn:hover {
                    background-color: #0b1d76;
                }
            </style>
        </head>
        <body>
            <h2 class="head" >Welcome,'. $_SESSION['username']. ' !</h2>
            <div class="cont">
                <a href="logout.php" >
                    <button type="submit" class="btn">Logout</button>
                </a>
            </div>
        </body>
        </html>

';


?>