<?php



$link = mysqli_connect("localhost", "amm14_truduGabriele", "beluga874", "users");

$email = $_POST["email"];

$query = "SELECT email FROM users WHERE email = '".$email."'";



$result = mysql_query($link,$query);

$occupato = mysql_num_rows($result);

return $occupato;

?>
