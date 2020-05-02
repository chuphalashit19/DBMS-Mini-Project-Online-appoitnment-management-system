<?php
    $conn=mysqli_connect('localhost','root','','appointment');

    $uname=$_POST['uname'];
    $uname=mysqli_real_escape_string($conn,$uname);

    $pass=$_POST['psw'];
    $pass=mysqli_real_escape_string($conn,$pass);

    $query= "SELECT username,password from patient where username='".$uname."' and password= '".$pass."'";

    $result=mysqli_query($conn,$query) or die($mysqli_error($conn));

    $num=mysqli_num_rows($result);

    if($num == 0)
    {
        echo "Wrong Password";    
    }

    else
    {
        $row=mysqli_fetch_array($result);
        $_SESSION['uname'] = $row['uname'];
        header('location:Login.php');
    }
