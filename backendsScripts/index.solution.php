<?php
require_once 'connect_to_db.php';
require_once './lib/app.functions.php';

/**
 * uses php server rendering
 * get all polling units and print all polling units to the page inside <select>
 * let user select a polling unit he want to view
 * check if polling unit is selected show to user
 * else if polling unit is not selected then show message
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
getPullingUnits();
 if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['polling_unit_id'])){
    //VIEW DATA 
$polling_unit_id_by_user=trim($_POST['polling_unit_id']);
$show_message=false;
$output=getTable('announced_pu_results',"polling_unit_uniqueid=$polling_unit_id_by_user");
//print_r($output);
$pollName=get_pollingUnitName($polling_unit_id_by_user).' polling unit';
    }
    else{
        //show message
        $show_message=true;
    }
 }
 else{
    //show message
    $show_message=true;
 }