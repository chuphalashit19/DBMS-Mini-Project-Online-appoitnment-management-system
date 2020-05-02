<?php
    $conn=mysqli_connect('localhost','root','','appointment');

        $name=$_POST['fname'];
        $dob=$_POST['DOB'];
        $gender=$_POST['gender'];
        $contact=$_POST['contact'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['pwd'];
        $passwordr=$_POST['pwdr'];
        $sql="INSERT INTO patient(name,gender,dob,phone,username,password,email) VALUES ('$name','$gender','$dob','$contact','$username','$password','$email')";
        if(mysqli_query($conn,$sql))
        {
            echo "<h2>Sign Up completed!!</h2>";
            header("Refresh:3;url=Home.php");
        }
        else
        {
            echo "Error:".$sql."<br>".mysqli_error($conn);
        }
    ?>