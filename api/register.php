<?php
include('connect.php');

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$address = $_POST['address'];
$photo = $_FILES['photo']['name'];  // Corrected array key to 'photo'
$tmp_photo = $_FILES['photo']['tmp_name'];  // Corrected array key to 'photo'
$role = $_POST['role'];

if ($password == $cpassword) {
    move_uploaded_file($tmp_photo, '../upload/' . $photo);  // Concatenated correct path
    $insert = mysqli_query($conn, "INSERT INTO user (`name`,`mobile`,`password`,`address`,`photo`,`role`,`status`,`votes`) VALUES ('$name','$mobile','$password','$address','$photo','$role',0,0)");  // Corrected column names and added 'address'

    if ($insert) {
        echo '
        <script>
        alert("Registration successful");
        window.location="../";
        </script>
        ';
    } else {
        echo '
        <script>
        alert("Some errors occurred");
        window.location="../Routes/register.html";
        </script>
        ';
    }
} else {
    echo '
    <script>
    alert("Password and confirm password do not match");
    window.location="../Routes/register.html";
    </script>
    ';
}
?>
