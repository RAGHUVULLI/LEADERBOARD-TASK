<html>
<head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style3.css"> 
</head>
<?php
session_start();
  if(isset($_POST["submit"]) and $_SERVER["REQUEST_METHOD"]=="POST")
        {
            $em=$_POST["name"];
            $pass=$_POST["psw"];
            $conn=new mysqli("localhost","root","","leaderboard");
            $sql="select name from user_master where name='$em' and pass='$pass'";
            $rs=$conn->query($sql);
            if($rs->num_rows==0)
            {
                    unset($_POST["name"]);unset($_POST["psw"]);unset($_POST["submit"]);
                    echo  "<script>alert('Wrong credentials ! Please check the deatails that you have entered.');</script>";
                   
            }
            else
            {
                    $_SESSION["user"]=$em;
                    unset($_POST["name"]);unset($_POST["psw"]);unset($_POST["submit"]);
                    echo  "<script>window.location.href = 'leader.php';</script>";
                    
            }
                
        }
?>
<body>
<div class="topnav">
<a class="fa fa-code" href="login.php">&nbsp;WebStacks</a>
<a class="login fa fa-user-circle" href="login.php">&nbsp;&nbsp;Login</a>
</div>
<form class="s" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="container">
      <h1><b>Login</b></h1>
        <p><i>Kindly login to see the leaderboard.(Default uname-super, pass-qwerty)</i></p>
      <hr>
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter name" name="name" required>
      <label ><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
<div class="clearfix">
		<input type="submit" class="loginbtn" value="Login" name="submit">
</div>
    </div>
</form>
</body>
</html>
