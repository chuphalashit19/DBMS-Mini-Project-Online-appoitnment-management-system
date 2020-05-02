<html>
    <body style="background-image: url(Images/Pic13.jpg);">
        <link rel="stylesheet" href="main.css">
            <form action="AdminLogin.php" method="POST">
                <div class="header">
                    <ul>
                        <li style="float: left"><strong>ADMIN LOGIN</strong></li>
                        <li><a href="Home.php">HOME</a></li>
                    </ul>

                </div>
                <div class="sucontainer" method="POST" action>
                    <label>Admin Username:</label><br>
                    <input type="text" placeholder="Enter your Username" name="uname" required>

                    <label>Admin Password:</label><br>
                    <input type="password" placeholder="Enter your Password" name="psw" required>
                    <br><br>
                    <div class="container" style="background-color:gray">
                    <button type="submit" name="submit" style="float: right;">LOGIN</button>
                    </div>
                <?php
                function signin()
                {
                    session_start();
                    {
                        if($_POST['uname']=='admin' && $_POST['psw']=='admin')
                        { 
                            echo "Logging you in sir..!!";
                            header("Refresh:3;url=AdminPage.php");
                        }
                        else 
	                	{ 
		                	echo "Wrong Details Entered!"; 
		                } 
	                }
                }
                if(isset($_POST['submit'])) 
                { 
                	signin(); 
                }    
                ?>
            </div>
        </form>
    </body>
</html>