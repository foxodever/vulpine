<?php
include "../libs/connection.php";
include "../config/main.php";
$user = htmlspecialchars($_POST["username"]);
$pass = htmlspecialchars($_POST["password"]);
if (!$username || !$password) exit("-1");
$sql = "SELECT * FROM accounts WHERE username = '$user'";
$result = mysqli_query($link, $sql);
$row = $result->fetch_assoc();
if (!$row["id"]) exit("Incorrect nickname or password is specified.");
if (!password_verify($pass, $row["password"])) exit("Incorrect nickname or password is specified.");
$_SESSION["accid"] = $row["id"];
echo "1";
