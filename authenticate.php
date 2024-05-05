<?php

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check your authentication logic here, such as verifying username and password
    $username = "admin";
    $password = "admin";

    // Check if the provided credentials match the expected ones
    if ($_POST["username"] === $username && $_POST["password"] === $password) {
        // Authentication successful, set session variables
        $_SESSION['username'] = $_POST['username'];

        // Redirect to the protected page
        header("Location: ./contact.php");
        exit;
    } else {
        $error_message = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error_message)) { ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php } ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
