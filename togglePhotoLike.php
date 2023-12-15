<?php
require 'php/sessionManager.php';
require 'DAL/PhotosCloudDB.php';

userAccess();
if (!isset($_GET["photoId"])) 
    redirect("photosList.php");

$photoId = (int)$_GET["photoId"];
$userId = (int)$_SESSION["currentUserId"];

// todo DONE
$likesTable = new LikesTable();
$existingLikes = $likesTable->selectWhere("UserId = $userId AND PhotoId = $photoId");

if(!empty($existingLikes)){
    $likesTable->delete($existingLikes[0]->Id);
}
else{
    $like=new Like();
    $like->setUserId($userId);
    $like->setPhotoId($photoId);
    $likesTable->insert($like);
}

redirect("photoDetails.php?id=$photoId");