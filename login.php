<?php
 session_start();
 include('commonconn/db_connection.php');
 ini_set('display_errors','0');

 /*if($_SESSION['user_name']!='')
 {
    header('Location: index.php');

 }
*/
 if(isset($_POST['login']))
 {
    $username=$_POST['uname'];
    $password=$_POST['pass'];
    $uerror=' ';
    $perror=' ';
    if($username=='')
    {
        $uerror="Enter User Name";
    }
    else if($password=='')
    {
        $perror="Enter Password";
    }
    else{
        $sql="select * from admission_tb where email='$username' and password='$password';";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        if($count>0)
        {
            $_SESSION['user_name']=$username;
            echo "<script>alert('Login Successfully');<script>";
            header("Location: index.php");
        }
        else{
            echo "<script>alert('Login Failed');</script>";
 
        }
    }
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MB Fitness Club - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="admission.php">Admission</a></li>
            </ul>
        </nav>
    </header>
    
    <a href="#" class="logo">MB Fitness Club</a>
    <section class="login">
        <h2>Login</h2>
        <form method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="uname" value="<?php echo $username;?>"><?php echo $uerror;?><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="pass" value="<?php echo $password;?>"><?php echo $perror;?><br><br>
            <input type="submit" value="Login" name="login">
        </form>
        <p>Don't have an account? <a href="admission.php">Sign up</a></p>
    </section>

    <footer>
        <p>&copy; MB Fitness Club 2024 - All Rights Reserved</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>