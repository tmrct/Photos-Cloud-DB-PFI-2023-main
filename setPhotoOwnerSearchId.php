<?php
include 'php/sessionManager.php';
require 'DAL/PhotosCloudDB.php';

userAccess();
if (!isset($_GET["id"])) 
redirect("photosList.php");

$idSearched = $_GET["id"];
$userId = (int)$_SESSION["currentUserId"];

redirect("photosList.php?owners=$idSearched");

