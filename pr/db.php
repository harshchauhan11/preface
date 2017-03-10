<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = 'waltdisney';
$db = 'minthings';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
