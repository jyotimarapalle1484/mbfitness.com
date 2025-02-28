<?php
//require('common/connection.php');
include('commonconn/db_connection.php');
ini_set('display_errors','0');
date_default_timezone_set('Asia/Kolkata');
$date=date('d-m-Y')."-".date('h:i:sa');
if(isset($_POST['signup']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm-password'];

    if($name=='')
    {
        $a1="Enter Full Name";
    }
    else if($email=='')
    {
        $a2="Enter Email_id";
    }
    else if($phone=='')
    {
        $a3="Enter Phone_no";
    }
    else if($password=='')
    {
        $a4="Enter Password";
    }
    else if($confirm_password=='')
    {
        $a5="Enter confirm_password";
    }
    else if(!preg_match("/^[a-zA-Z ]*$/",$name))
    {
        $a1="Enter Only Alphabet";
    }
    else if(!preg_match("/^[0-9]*$/",$phone))
    {
        $a3="Enter Only Number";
    }
    else if($password != $confirm_password)
    {
        $a5="Invalid password!please re-enter it";
    }
    else if(strlen($password)!=8)
    {
        $a4="Password should 8 characters";
    }
    else
    {
        $query="insert into admission_tb(user_id,name,email,phone,password,created_at)values('','$name','$email','$phone','$password','$date');";
        if(mysqli_query($conn,$query))
        {
            echo "<script>alert('Data Saved Successfully');</script>";
        }
        else
        {
            echo "<script>alert('Data Saving failed!');</script>";
        }
    }



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MB Fitness Club - Admission</title>
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
    
    <header>
        <a href="#" class="logo">MB Fitness Club</a>
    </header>

    <section class="admission">
        <h2>Admission Form</h2>
        <form method="post" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>"><?php echo $a1;?><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>"><?php echo $a2;?><br><br>
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>"><?php echo $a3;?><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $password; ?>"><?php echo $a4;?><br><br>
            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="confirm-password" value="<?php echo $confirm_password; ?>"><?php echo $a5;?><br><br>
            <input type="submit" value="Sign up" name="signup">
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </section>

    <footer>
        <p>&copy; MB Fitness Club 2024 - All Rights Reserved</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>