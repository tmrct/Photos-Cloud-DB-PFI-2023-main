<?php
include 'php/sessionManager.php';
require 'DAL/PhotosCloudDB.php';

userAccess();
if (!isset($_GET["keywords"])) 
redirect("photosList.php");

$keywords = $_GET["keywords"];
$userId = (int)$_SESSION["currentUserId"];

redirect("photosList.php?sort=keywords&word=$keywords");


