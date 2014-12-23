<?php



$link = mysqli_connect("localhost", "amm14_truduGabriele", "beluga874", "users");

$email = $_GET["email"];

$query = "SELECT email FROM users WHERE email = '".$email."'";



$result = mysqli_query($link,$query);

if(mysqli_num_rows($result) > 0)
{
    echo '1';
}

else
{
    echo '0';
}
?>
