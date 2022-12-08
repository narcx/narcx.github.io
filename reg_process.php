<?php 

if(empty($_POST["name"]))
{
	die("Name is required");
}

if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
{
	die("Valid email is required: username@domain.com");
}

if(strlen($_POST["password"]) < 8)
{
	die("Password must be atleast 8 characters");
}

if(!preg_match("/[a-z]/i", $_POST["password"]))
{
	die("Passowrd must contain atleast one letter");
}

if(!preg_match("/[0-9]/", $_POST["password"]))
{
	die("Passowrd must contain atleast one number");
}

if($_POST["password"] !== $_POST["password_confirm"])
{
	die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (name, email, password_hash)
		VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if(!$stmt->prepare($sql))
{
	die("SQL Error: " . $mysqli->error);
}

$stmt->bind_param("sss",
				  $_POST["name"],
				  $_POST["email"],
				  $password_hash);

if($stmt->execute())
{
	header("Location: signed_in_page.html");
	exit;

}else
{	//tova errno ne raboti, chetoh dokumentaciqta, pravq go kakto pishe i pak ne stava -.-
	if($mysqli->errno === 1062)
	{
		die("email already taken");
	}else
	{
		die($mysqli->error . "  " . $mysqli->errno);
	}
	
}

