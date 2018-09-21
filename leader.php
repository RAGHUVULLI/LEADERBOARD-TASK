<html lang="en">
<?php
    session_start();
    if(!isset($_SESSION["user"]))
    {
        header('Location:login.php');
    }
    else
    {
        $user=$_SESSION["user"];
    }
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Leaderboard</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
    
<div class="topnav">
    <a class="active fa fa-code" href="#home">&nbsp;WebStacks</a>
    <text class="lead">LEADERBOARD</text>
    <div class="tooltip">
        <?php   echo "<a href='login.php' class='user fa fa-user-circle w3-tooltip'>";echo "&nbsp";echo "&nbsp"; echo $user; echo "</a>"; ?>
        <span class="tooltiptext">Click to Logut !</span>
    </div>
</div>
<table>
<tr>
    <th>RANK</th>
    <th>NAME</th>
    <th>POINTS</th>
</tr>
     
        <?php
        require 'config.php';
        $sql = "SELECT * FROM raghutask2 order by Points desc";
        $result = $conn->query($sql);
        static $count=0;
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
            {
              $b=$row["Name"];
              $c=$row["Points"];
              $count++;
            echo " <tr>
                <td>$count</td>
              <td>$b</td>
            <td>$c</td> 
          </tr>";
}
        } else {
            echo "0 results";
        }
        ?>
</table>
</body>
</html>