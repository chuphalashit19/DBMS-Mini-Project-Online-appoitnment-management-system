<html>
    <head>
        <link rel="stylesheet" href="main.css">
        <body style="background-image: url(Images/Pic4.jpg);"></body>   
    <style>
    table{
        width:80%;
        border-collapse:separate;
        border: 5px black;
        padding: 2px;
        font-size: 30px;
        font-family: cursive;
    }
    th{
        border: 2px black;
        background-color:peru ;
        color: white;
        text-align: left;
    }
    tr,td{
        border: 2px black;
        background-color: whitesmoke;
        color:black;
    }
    </style>
    <?php include "DBconnect.php"; ?>
    <body style="background-color: whitesmoke;">
            <div class="header">
                <ul>
                    <li style="float: left; border-right: none;"> <a href="Home.php" class="logo"> <img src="Images/Pic9.png" width="70px" height="60px"> <strong> WeCare </strong> Online Appointment System </a> </li>
                    <li> <a href="Home.php"><strong>HOME</strong></a></li>
                </ul>
            </div>
            <center>
            <?php
            include 'DBconnect.php';
            session_start();
        	$username=$_SESSION['username'];
	        $sql1 = "Select * from booking where username ='".$username."' order by DOV desc";
			$result1=mysqli_query($conn, $sql1);  
			echo "<table>
					<tr>
					<th>Appointment-Date</th>
					<th>Name</th>
					<th>Clinic</th>
					<th>Doctor</th>
					<th>Status</th>
					<th>Booked-On</th>
					</tr>";
			while($row1 = mysqli_fetch_array($result1))
			{
				$sql2="SELECT * from doctor where DID=".$row1['DID'];
				$result2= mysqli_query($conn,$sql2);
				while($row2= mysqli_fetch_array($result2))
				{
					$sql3="SELECT * from clinic where CID=".$row1['CID'];
						$result3= mysqli_query($conn,$sql3);
						while($row3= mysqli_fetch_array($result3))
						{
								echo "<tr>";
								echo "<td>" . $row1['DOV'] . "</td>";
								echo "<td>" . $row1['Fname'] . "</td>";
								echo "<td>" . $row3['name']."-".$row3['town'] . "</td>";
								echo "<td>" . $row2['name'] . "</td>";
								echo "<td>" . $row1['Status'] . "</td>";
								echo "<td>" . $row1['Timestamp'] . "</td>";
								echo "</tr>";
						}
				}
				
			}
	?>
</center>
</body>
</html>