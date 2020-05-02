<html>
    <head>
        <link rel="stylesheet" href="adminmain.css">
    </head>
    <body style="background-image: url(Images/Pic14.jpg)">
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
            <h1 style="font-family: cursive; font-size: 30px;">ADD CLINIC</h1>
            <form method="POST">
               <p style="font-family: cursive; font-size: 20px;">CID:</p> <input type="number" name="cid" required>
                <br>
                <p style="font-family: cursive; font-size: 20px;">Name:</p> <input type="text" name="name" required>
                <br>
                <p style="font-family: cursive; font-size: 20px;">Address:</p> <input type="text" name="address" required>
                <br>
                <p style="font-family: cursive; font-size: 20px;">Town:</p> <input type="text" name="town" required>
                <br>
                <p style="font-family: cursive; font-size: 20px;">City:</p> <input type="text" name="city" required>
                <br>
                <p style="font-family: cursive; font-size: 20px;">Contact:</p> <input type="number" name="contact" maxlength="10" minlength="10" required>
                <br>
                <button type="submit" name="submit">REGISTER</button>
            </form>
            </center>

            <?php
            session_start();
            function newclinic()
            {
                include "DBconnect.php";
                $cid=$_POST['cid'];
                $name=$_POST['name'];
                $address=$_POST['address'];
                $town=$_POST['town'];
                $city=$_POST['city'];
                $contact=$_POST['contact'];
                $sql= "INSERT INTO clinic(CID,name,address,town,city,contact) VALUES ('$cid','$name','$address','$town','$city','$contact')";

                if(mysqli_query($conn,$sql))
                {
                    echo "<h2> CLINIC ADDED SUCCESSFULLY!!</h2>";
                    header("Refresh:3;url=NewClinic.php");
                }
                else
	            {   
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	            }
            }
            function checkcid()
            {
                include "DBconnect.php";
                $cid=$_POST['cid'];
                $sql1="SELECT *FROM clinic WHERE CID='$cid'";
                $result=mysqli_query($conn,$sql1);
                if(mysqli_num_rows($result)!=0)
                {
                    echo "<b><br>CID ALREADY EXISTS</b>";
                }
                else
                {  
                    if(isset($_POST['submit']))
	                { 
		                newclinic();
	                }
                }
            }
            if(isset($_POST['submit']))
            {
                checkcid();
            }
            ?>
    </body>
</html>