<html>
    <head>
        <link rel="stylesheet" href="main.css">
    </head>
    <body style="background-image: url(Images/Pic1.jpg);" >
        <div class="header">
            <ul>
                <li style="float: left;;"><strong> WELCOME <strong> </li>

            </ul>
        </div>
        <div class="container" style="width: 100%;">
            <form method="POST">
                <button type="button" onclick="window.location.href='Booking.php'" style="background-color:cadetblue;color: black;">Book Appointment</button><br><br>
                <button type="button" onclick="window.location.href='Home.php'" style="background-color:cadetblue;color: black;">LOGOUT</button><br><br>
            </form>
        </div>
        <?php
        if(isset($_POST['check']))
        {   
            $conn=mysqli_connect('localhost','root','','appointment');
            if(isset($_POST['cancel']))
            {
        	header( "Refresh:1; url=CancelBooking.php"); 
            }
            if(isset($_POST['logout']))
            {
	            session_unset();
	            session_destroy();
	            header( "Refresh:1; url=Home.php"); 
            }
        }
        ?>
    </body>
</html>