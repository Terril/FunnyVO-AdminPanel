<?php

/* Getting file name */
$filename = $_FILES['file']['name'];

$expldd=explode(".",$filename);

$filerandName=rand();
$extensionn=$expldd[1];

$finalName= $filerandName.'.'.$extensionn;


/* Location */
$location = "upload/".$filename;
$uploadOk = 1;
$imageFileType = pathinfo($location,PATHINFO_EXTENSION);

/* Valid Extensions */
$valid_extensions = array("aac");
/* Check file extension */
if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
   $uploadOk = 0;
}

if($uploadOk == 0){
   echo 0;
}else{
   /* Upload file */
   if(move_uploaded_file($_FILES['file']['tmp_name'],"upload/".$finalName)){
      echo $finalName;
   }else{
      echo 0;
   }
}