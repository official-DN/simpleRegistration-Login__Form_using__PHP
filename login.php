<?php
include 'db_connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Check if user exists
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirect
            header("Location: dashboard.php");
        } else {
            echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Login</title>
                <style>
                        body {
                        /* Add a background image */
                        background-image: url("https://wallpapers.com/images/hd/google-slides-background-y6hs8477f4fmbvh0.jpg");
                        background-size: cover;
                        background-position: center;
                        height: 100vh;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        }

                        .card {
                        background-color: #fff;
                        border: #2803bc;
                        padding: 50px;
                        border-radius: 10px;
                        box-shadow: 0 0 10px rgba(54, 68, 91, 0.1);
                        }

                        .card-body {
                        padding: 32px;
                        }

                        .card-title {
                        font-weight: bold;
                        font-size: 38px;
                        margin-bottom: 30px;
                        margin-top: auto;
                        ;
                        }

                        .form-label {
                        font-weight: bold;
                        margin-bottom: 10px;
                        }

                        .form-control {
                        width: 100%;
                        padding: 10px;
                        margin-bottom: 20px;
                        border: 1px solid #5350f5;
                        border-radius: 15px;
                        }

                        .btn-primary {
                        background-color: #555aec;
                        color: #fff;
                        padding: 10px 20px;
                        border: none;
                        border-radius: 5px;
                        cursor: pointer;
                        }

                        .btn-primary:hover {
                        background-color: #0b1d76;
                        }
                            </style>
                        </head>
                        <body>
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-mt-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 style="color:red; text-align:center">Incorrect Password</h3>
                                                <h4 class="card-title text-center">Login</h4>
                                                <form action="login.php" method="post">
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email Address</label>
                                                        <input type="email" class="form-control" id="email" name="email" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="password" class="form-control" id="password" name="password" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary w-100">Login</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </body>
                    </html>
            ';
        }
    } else {
        echo '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Login</title>
                <style>
                        body {
                        /* Add a background image */
                        background-image: url("https://wallpapers.com/images/hd/google-slides-background-y6hs8477f4fmbvh0.jpg");
                        background-size: cover;
                        background-position: center;
                        height: 100vh;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        }

                        .card {
                        background-color: #fff;
                        border: #2803bc;
                        padding: 50px;
                        border-radius: 10px;
                        box-shadow: 0 0 10px rgba(54, 68, 91, 0.1);
                        }

                        .card-body {
                        padding: 32px;
                        }

                        .card-title {
                        font-weight: bold;
                        font-size: 38px;
                        margin-bottom: 30px;
                        margin-top: auto;
                        ;
                        }

                        .form-label {
                        font-weight: bold;
                        margin-bottom: 10px;
                        }

                        .form-control {
                        width: 100%;
                        padding: 10px;
                        margin-bottom: 20px;
                        border: 1px solid #5350f5;
                        border-radius: 15px;
                        }

                        .btn-primary {
                        background-color: #555aec;
                        color: #fff;
                        padding: 10px 20px;
                        border: none;
                        border-radius: 5px;
                        cursor: pointer;
                        }

                        .btn-primary:hover {
                        background-color: #0b1d76;
                        }
                            </style>
                        </head>
                        <body>
                            <div class="container mt-5">
                                <div class="row justify-content-center">
                                    <div class="col-mt-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 style="color:red; text-align:center">No account found with that email</h3>
                                                <h4 class="card-title text-center">Login</h4>
                                                <form action="login.php" method="post">
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label">Email Address</label>
                                                        <input type="email" class="form-control" id="email" name="email" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="password" class="form-control" id="password" name="password" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary w-100">Login</button>
                                                    <button type="button" class="btn  btn-primary w-100" onclick=location.href="register.html">New Register Account</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </body>
                    </html>
        ';
    }

    $conn->close();
}
?>