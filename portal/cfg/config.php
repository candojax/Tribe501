<?php 
//SQL Server Variables
$hostname = "localhost";
$dbuser = "revosvc";
$dbpass = "p0lidef01";
$dbname = "revosvc";

//MySQLi Connection
$mysqli = new mysqli($hostname, $dbuser, $dbpass, $dbname);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

//PDO Connection
$dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $dbuser, $dbpass);

//Site Variables
$sitename = "The Performers Academy";
$sitelogo = "img/logo.png";

?>