# DID Inventory APP

## Description

This is a really simple app build with php and html with bootstrap 4.

That consists in two files the index.php and the parser.php, in the index we can find the form used to upload a csv file to parse, also we can find a test.csv file to test.
After you submit the file the parser.php its going to read everyline of the file and store it in an array called lines.
This was intented at first to get a date from the form in the index, then add 'x' amount of days and store the initial date (the one from the form) and the usable date (the form date + 'x' days) and store them in the database.

## Getting Started

First you need to use the sql file to create the table with the structure we already have in the parser file and then the most important step is that you need to update the credentials to the database connection.
Then you need to use the form located in the index.php file to be able to upload the file you enter a date and submit, then the file uploaded its going to be parsed and added 90 days to the date you entered in the form and we store them in the database directly.

## How does it work?

You upload a csv file in the form, and after a little bit of magic you have your data in the database.

## Authors

* **Ernesto Galdamez** 