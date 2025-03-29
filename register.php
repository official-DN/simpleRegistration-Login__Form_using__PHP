<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get and sanitize input
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    // Insert user into database
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Register</title>
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
                <h2 class="head" >Registration successful!</h2>
                <div class="cont">
                    <a href="login.html" >
                        <button type="submit" class="btn">Login</button>
                    </a>
                </div>
            </body>
            </html>
        ';
    } else {
        echo '  
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Register</title>
                <style>
                    .body{
                        justify-content: center;
                        align-items: center;
                    }
                    .head{
                        color: red;
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
                <h2 class="head" >Welcome,'.$conn->error . ' !</h2>
                <div class="cont">
                    <h3 class="head">Try again or new register accound !</h3>
                    <a href="register.html" >
                        <button type="submit" class="btn">New Register</button>
                    </a>
                </div>
            </body>
            </html>
            ';
    }

    $conn->close();
}
?>
