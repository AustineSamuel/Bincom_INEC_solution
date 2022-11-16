<?php
require_once 'connect_to_db.php';
require_once '../lib/app.functions.php';
/**
 * load parties name
 * 
 */


$show_message=false;
$polling_units=[];
$pollName='polling unit name';
$polling_unit_id_by_user='';

function get_pollingUnitName($id){
global $polling_units;
foreach($polling_units as $item){
    if(trim($item['uniqueid'])==trim($id)){
        return $item['polling_unit_name'];
    }
}
}
function getPullingUnits(){
    global $polling_units;
    $data=getTable('polling_unit');//get table is table i build inside my library located on /lib/app.functions.php it is use for loading table from database
    if(count($data) > 0)$polling_units=$data;
   
}


 $party_list=getTable('party');

 getPullingUnits(); 
 if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['polling_unit_id'])){
//DATA AVAILABLE : try to insert data 
//$polling_units_id_selected_by_user=$_POST['polling_unit_id'];
$polling_unit_id=trim($_POST['polling_unit_id']);
$result_id=floor(rand()*999);
$party=trim($_POST['party']);
$score=trim($_POST['score']);
$user=trim($_POST['enteret_by_user']);
$date=strval(localtime());
$ip=$_POST['ip'];
if(!in_array(strtoupper($party),$party_list))exit ("party name not in the server");
$insert="INSERT INTO announced_pu_results(
    polling_unit_uniqueid,
    result_id,
    party_abbreviation,
    party_score,
    entered_by_user,
    date_entered,
    user_ip_address
)
VALUES(
    '$polling_unit_id',
    $result_id,
    '$party',
    '$score',
    '$user',
    '$date',
    '$ip'
)";
 }
}