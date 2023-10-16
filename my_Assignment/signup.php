<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="signin">
        <h2>Sign Up</h2>
    </div>
    <div>
        <form action="signup.php" method="POST">
            <table>
                <!-- <tr>
                    <td>
                    <label for="id">Id:</label>
                    </td>
                    <td><input type="text" name="id" required></td>
                </tr> -->
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
                    <label for="email">Email</label>
                    </td>
                    <td><input type="email" name="email" required></td>
                </tr>
                <tr>
                    <td>
                        <button type="submit">Sign Up</button>
                    </td>
                    <td>
                        I already have account <a href="login.php">Sign In</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
<?php

$username = '';
$email = '';
$password ='';
$id= '';
// Connection to database
$db = new PDO('mysql:host=localhost;dbname=my_page','root','');

//get user information
if(isset($_POST['submit'])){
if(isset($_POST['username'])){
$username = $_POST['username'];
}
if(isset($_POST['email'])){
$email = $_POST['email'];
}
if(isset($_POST['password'])){
$password = password_hash( $_POST['password'], PASSWORD_DEFAULT);
}
//insert the user detail into the database
$sql  = 'INSERT INTO users (username, email, password) VALUES (?, ?, ?)';
$statement = $db->prepare($sql);
$statement->execute([$username, $email, $password]);

//redirect the user to the home page
header('Location: index.php');
}
?>