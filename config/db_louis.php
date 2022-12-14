<?php
date_default_timezone_set('Asia/Bangkok');

$servername = 'localhost';
$username = 'root';
$password = '';
$db_name = 'louis_db';

$conn = mysqli_connect($servername ,$username ,$password ,$db_name);

if (mysqli_connect_errno())
{
	echo "Database Connect Failed : " . mysqli_connect_error();
}
// else
// {
// 	echo "Database Connected.";
// }
?>