<?php session_start(); ?>
<html>
    <head>
        <link rel="stylesheet" href="adminmain.css">
    </head>
    <body style="background-image: url(Images/Pic10.jpg);">
        <ul>
                <li class="dropdown"><p style="font-family: cursive;font-size: 40px;color: white;">ADMIN MODE</p></li>
                <br>
                <h2>
                    <li class="dropdown">
                        <br><br>
                        <a class="dropbtn" style="font-family: cursive;">DOCTOR</a>
                        <div class="dropdown-content">
                            <a href="NewDoctor.php" style="font-family: cursive;">Add new Doctor</a>
                            <a href="DeleteDoctor.php" style="font-family: cursive;">Delete Doctor</a>
                            <a href="DoctorSchedule.php" style="font-family: cursive;">Doctor Schedules</a>
                            <a href="ShowDoctor.php" style="font-family: cursive;">Show all Doctors</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <br><br>
                        <a class="dropbtn" style="font-family: cursive;">CLINIC</a>
                        <div class="dropdown-content">
                            <a href="NewClinic.php" style="font-family: cursive;">Add new Clinic</a>
                            <a href="DeleteClinic.php" style="font-family: cursive;">Delete Clinic</a>
                            <a href="AddDoctorToClinic.php" style="font-family: cursive;">Assign Doctor to a Clinic</a>
                            <a href="DeleteDoctorFromClinic.php" style="font-family: cursive;">Delete Doctor from a Clinic</a>
                            <a href="ShowClinic.php" style="font-family: cursive;">Show the Clinics</a>
                        </div>
                    </li>
    
                    <li>
                        <br><br>
                        <form method="POST" action="AdminLogin.php">
                            <button type="submit" class="cancelbtn" name="logout" style="float: left;font-size: 20px;font-family: cursive;">LOGOUT</button>
                        </form>
                    </li>
                </h2>
            </ul>
            <center>
            <h1 style="font-family: cursive; font-size: 30px;">ADD DOCTOR</h1>
            <form method="POST">
               <p style="font-family: cursive; font-size: 20px;">DID:</p> <input type="number" name="did" required>
                <br>
                <p style="font-family: cursive; font-size: 20px;">Name:</p> <input type="text" name="name" required>
                <br>
                <p style="font-family: cursive; font-size: 20px;">Gender:</p> <input type="text" name="gender" required>
                <br>
                <p style="font-family: cursive; font-size: 20px;">DOB:</p> <input type="date" name="dob" required>
                <br>
                <p style="font-family: cursive; font-size: 20px;">Experience:</p> <input type="text" name="experience" required>
                <br>
                <p style="font-family: cursive; font-size: 20px;">Specialisation:</p> <input type="text" name="specialisation" required>
                <br>
                <p style="font-family: cursive; font-size: 20px;">Contact:</p> <input type="number" name="contact" required>
                <br>
                <p style="font-family: cursive; font-size: 20px;">Address:</p> <input type="text" name="address" required>
                <br>
                <p style="font-family: cursive; font-size: 20px;">Username:</p> <input type="text" name="username" required>
                <br>
                <p style="font-family: cursive; font-size: 20px;">Password:</p> <input type="password" name="password" maxlength="10" minlength="10" required>
                <br>
                <p style="font-family: cursive; font-size: 20px;">Region:</p> <input type="text" name="region" required>
                <br>
                <button type="submit" name="submit">REGISTER</button>
            </form>
            </center>
            <?php
            function newdoctor()
            {
                include "DBconnect.php";
                $did=$_POST['did'];
                $name=$_POST['name'];
                $gender=$_POST['gender'];
                $dob=$_POST['dob'];
                $experience=$_POST['experience'];
                $specialisation=$_POST['specialisation'];
                $contact=$_POST['contact'];
                $address=$_POST['address'];
                $username=$_POST['username'];
                $password=$_POST['password'];
                $region=$_POST['region'];
                $sql= "INSERT INTO doctor(DID,name,gender,dob,experience,specialisation,contact,address,username,password,region) VALUES('$did','$name','$gender','$dob','$experience','$specialisation','$contact','$address','$username','$password','$region')";
                
                if(mysqli_query($conn,$sql))
                {
                    echo "<h2> DOCTOR ADDED SUCCESSFULLY!!</h2>";
                    header("Refresh:3;url=NewDoctor.php");
                }
                else
	            {   
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	            }
            }
            function checkdid()
            {
	            include 'DBconnect.php';
	            $did=$_POST['did'];
	            $sql= "SELECT * FROM doctor WHERE DID = '$did'";

	            $result=mysqli_query($conn,$sql);

        		if(mysqli_num_rows($result)!=0)
                {
			        echo"<b><br>DID ALREADY EXISTS!!";
                }
	            else 
		        if(isset($_POST['submit']))
	            { 
		            newdoctor();
            	}
            }
            function checkusername()
            {   
	            include 'DBconnect.php';
            	$username=$_POST['username'];
	            $sql= "SELECT * FROM doctor WHERE username = '$username'";

	            $result=mysqli_query($conn,$sql);

	        	if(mysqli_num_rows($result)!=0)
                {
	        		echo"<b><br>Username already exists!!";
                }
	            else 
		            if(isset($_POST['submit']))
	                { 
		                checkdid();
                    }
            }
            if(isset($_POST['submit']))
            {
                checkusername();
            }
            ?>
    </body>
</html>