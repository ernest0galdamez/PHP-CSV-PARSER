<?php

/* 
Author: Ernesto Galdamez
Date and Time: 28/02/2020
Description for the code: Simple form that receives a csv file and stores it in the database
Usage: First you need to update the credentials to the database connection.
Then you need to use the form located in the index file to be able to upload the file and assign a date, then its going to be parsed and added 90 days
to the date you entered in the form 
*/

//Database credentials
$hostname = "host";
$username = "username";
$password = "password";
$db = "db";

//Connection to the Database
$dbconnect=mysqli_connect($hostname, $username, $password, $db);

if ($dbconnect->connect_error) {
    die("Database connection failed: " . $dbconnect->connect_error);
}

//Get date from form
 $date = $_POST['date'];

 $fh = fopen($_FILES['file']['tmp_name'], 'r+');
//File parsing
 $lines = array();
 while (($row = fgetcsv($fh)) !== false) {
     $lines[] = $row;
 }

 $count = 0;
 $startdate = $date;
 $exportdate = '';
 $returndate = '';
 $usabledate = date('Y-m-d', strtotime($returndate . ' + 90 days'));
 
 foreach ($lines as $key) {
     //Autoincrement count for total of lines in file processed
     $count++;
     $value = $key['0'];
     //We build the mysql query to insert the numbers from the csv file to the database
     $query = "INSERT INTO numbers (number, startDate, exportDate, returnDate, usableDate )
	VALUES ('$value', '$startdate', '$exportdate' , '$returndate', '$usabledate')";
	
	//Insert into db query
     if (!mysqli_query($dbconnect, $query)) {
         die("Error description: " . mysqli_error($dbconnect));
     }
 }

//Close mysql connection
mysqli_close($dbconnect);
//Redirect to index
header('Location: index.php?total=' . $count);
