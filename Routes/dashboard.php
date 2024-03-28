<?php
session_start();
if(!isset($_SESSION['userdata'])){
  header("location:../");
  exit();
}

$userdata=$_SESSION['userdata']; 
$groupsdata=$_SESSION['groupsdata'];

if($_SESSION['userdata']['status']==0){
  $status='<b style="color:red">Not Voted</b>';
}
else{
  $status='<b style="color:Green">Voted</b>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Css/style.css">
  <title>Dashboard Page</title>
</head>
<body>
  
  <div id="mainSection">
    <center>
      <div id="headersection">
      <a href="../"><button id="backbtn">Back</button></a>
      <a href="../Routes/logout.php"><button id="logoutbtn">LogOut</button></a>
        <h1>Online Voting System</h1>
      </div>
    </center>
    <hr>
    <div id="Profile">
      <center><img src="../upload/<?php echo $userdata['photo'] ?>" height="150" width="150"></center><br><br>
      <b>Name:</b><?php echo $userdata['name'] ?><br><br>
      <b>Mobile:</b><?php echo $userdata['mobile'] ?><br><br>
      <b>Address:</b><?php echo $userdata['address'] ?><br><br>
      <b>Status:</b><?php echo  $status ?><br><br>
    </div>
    <div id="Group">
      <?php
      if($_SESSION['groupsdata']){
        for($i=0;$i<count($groupsdata);$i++){
          ?>
          <div>
          <img style="float:right" src="../upload/<?php echo $groupsdata[$i]['photo'] ?>" height="100" width="100">
            <b>Group Name:</b><?php echo $groupsdata[$i]['name'] ?><br><br>
            <b>Votes:</b><?php echo $groupsdata[$i]['votes'] ?><br><br>
            <form action="../api/vote.php" method="post">
            
              <input type="hidden" name="gvotes" value="<?php echo $groupsdata[$i]['votes'] ?>">
              <input type="hidden" name="gid" value="<?php echo $groupsdata[$i]['id'] ?>">

            <?php
              if($_SESSION['userdata']['status'] ==0){
                ?>
              <input type="submit" name="votebtn" value="vote" id="votebtn" >
              <?php
            }
            else{
              ?>
              <button disabled type="button" name="votebtn" value="Vote" id="voted">Voted</button>
              <?php

            }
            ?>
            </form>
            
          </div>
          <hr>
          <?php
        }

      }
      ?>
    
    </div>
  </div>
  
</body>
</html>
