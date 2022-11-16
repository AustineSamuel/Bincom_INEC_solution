
<?php

function connect(){
  global $con; 
if($con){
   return true;
}
else{
  return false;
}
}

function getItem($id,$table){
  if(connect()){
    global $con;
$get=$con->query("SELECT * FROM `$table` where id=$id");
if($get){
  if($get->num_rows>0){
    return $get->fetch_assoc();
    }
  }
}
}


function getTable($tableName,$condition='1'){
global $con;
if(connect()){
  $json=[];
  $select=$con->query("SELECT * FROM `$tableName` where $condition");
  if($select){
  if($select->num_rows>0){
    while ($row=$select->fetch_assoc()) {
     array_push($json,$row);
    }
  } 
}
else{
  echo "Error".$con->error."<br>".$tableName;
logToFile("../developer/Error.txt","\n\n\n".__FUNCTION__."fail to get table line".__LINE__."\n file ".__FILE__."sql said".$con->error);
}
  return $json;

}
}


function reportBug($message,$path="../developer/Error.txt"){
  //send mail
  if(!file_exists($path)){
    $path="developer/Error.txt";
  }
  $message="\n\n".$message."\nDate\n".Date("y_m_d_-_h_i_s a");
  $file=fopen($path,"a");
  fwrite($file,$message);
  fclose($file);
}


function rndName($len){
  $Rname=["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];
  $mainName="";
  for ($i=0; $i < $len; $i++) { 
    $mainName.=$Rname[rand(0,count($Rname)-1)];
  }
return $mainName."";
}


function getFileContent($filePath){
  if(!file_exists($filePath))return false;
$file=fopen($filePath,"r");
$content=fread($file,filesize($filePath));
fclose($file);
return $content;
}

function get_last_id($tableName){
 global $con;
$select=$con->query("SELECT MAX(id) FROM `$tableName`");
if($select){
  return $select->fetch_array()[0];
}
else{
  echo "fail to get last id";
}
}

function uploadImage($name=array(),$surportedExtn=["image/jpeg","image/jpg","image/png","image/jpg","image/gif"]){
  if($name["error"]==0){
  $tmp=$name["tmp_name"];
  $type=trim(mime_content_type($tmp));
  $fileName=$name["name"];
$extn=strtolower(substr($fileName,strrpos($fileName,"."),strlen($fileName)));
if(in_array($type,$surportedExtn)){
  $imageName=substr(trim(md5(rndName(30))),0,15);
 $save=!file_exists("../images/".$imageName."".$extn) ? move_uploaded_file($tmp,"../images/".$imageName."".$extn):false;
 if($save){
   return $imageName."".$extn;
 }
 else{
   return false;
 }
 }
 else{
  return "notSuported";
}
}
}


function validateEmail($email){
  $email=filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
  $email=filter_var($email,FILTER_VALIDATE_EMAIL);
return $email;  
}
function logToFile($fileName,$data){
  if(file_exists($fileName)){
$f=fopen($fileName,"a");
fwrite($f,$data);
fclose($f);
  }
  else{
    exit($fileName. " not exist");
  }
}

//function }

function deleteFile($name){
  if(file_exists($name)){
    unlink($name);
    return "deleted";
  }
  else{
    return "not exist";
  }
}

function execute($query){
  global $con;
  return $con->query($query);
}




function validatePackages($plainPackageMain){
  if(!isset($plainPackageMain)){
    return [];
    }
  else{
$packages=[];

foreach($plainPackageMain as $plainPackage){

    $newObj=Array();
    $newObj["percent"]=$plainPackage["percent"];
    $newObj["id"]=$plainPackage["id"];
   $newObj["title"]=$plainPackage["title"];
    $newObj["pay"]=array("value"=>$plainPackage["pay"],"currency"=>$plainPackage["payCurrency"]);
    $newObj["get"]=array("value"=>$plainPackage["get"],"currency"=>$plainPackage["getCurrency"]);

    $newObj["style"]=$plainPackage["style"];
array_push($packages,$newObj);
  }
}
return $packages;
}