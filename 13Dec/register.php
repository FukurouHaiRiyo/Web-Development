<?php

require_once 'database_config.php';

$username = $password = $email = $confirm_password = "";
$username_err = $password_err = $email_err = $confirm_password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $username_err = "Please enter a username.";
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            $username_err = "Only letters and numbers allowed.";
    } else {
        $sql = "SELECT id FROM users WHERE username = ?";
        if ($stmt = $connection->prepare($sql)) {
            $stmt->bind_param("s", $param_username);
            $param_username = trim($_POST["username"]);
            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                die("Oops! Something went wrong. Please try again later.");
            }
            $stmt->close();
        }

        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter a password.";
        } else if (strlen(trim($_POST["password"])) < 8) {
            $password_err = "Password must have at least 8 characters.";
        } else {
            $password = trim($_POST["password"]);
        }

        if (empty(trim($_POST["confirm_password"]))) {
            $confirm_password_err = "Please enter confirm password.";
        } else if (strlen(trim($_POST["confirm_password"])) < 8) {
            $confirm_password_err = "Confirm password must have at least 8 characters.";
        } else {
            $confirm_password = trim($_POST["password"]);
        }

        if ($password != $confirm_password) {
            $confirm_password_err = "Password did not match.";
        }
        if(empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
            if ($stmt = $connection->prepare($sql)) {
                $stmt->bind_param("ss", $param_username, $param_password);
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT);
                if ($stmt->execute()) {
                    header("location: login.php");
                } else {
                    die("Something went wrong. Please try again later.");
                }
                $stmt->close();
            }
        }
        
        $connection->close();
        }
    }
    ?>
    

<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- bootstrap form for registration -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Register</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"></form method="post">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>
