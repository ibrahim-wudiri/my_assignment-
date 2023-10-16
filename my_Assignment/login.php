<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="signin">
        <h2>Sign In</h2>
    </div>
    <div>
        <form action="login.php" method="POST">
            <table>
                <tr>
                    <td>
                    <label for="username">Username:</label>
                    </td>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td>
                    <label for="password">Password:</label>
                    </td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" name="submit">Sign in</button>
                    </td>
                    <td>
                        I dont have account <a href="signup.php">Sign up</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
<?php
$username = '';
$password = '';
// Connection to database
$db = new PDO('mysql:host=localhost;dbname=my_page','root','');

//get user information
if(isset($_POST['submit'])){
if(isset($_POST['username'], $_POST['password'])){
$username = $_POST['username'];
$password = $_POST['password'];
}
//check if users username and password are correct 
$sql  = 'SELECT * FROM users WHERE username = ?';
$statement = $db->prepare($sql);
$statement->execute([$username]);
$user = $statement->fetch();

if ($user && password_verify($password, $user['password'])) {
    //the username and password ae corect
    //log the user and redirect to home page
    session_start();
    // $_SESSION['user_id'] = $user['id'];

    echo 'login succesfully';
    header('Location: index.php');
}else{
    echo 'Invalid username or password.';
}
}
?>