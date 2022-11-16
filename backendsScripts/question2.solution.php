<?php
require_once 'connect_to_db.php';
require_once '../lib/app.functions.php';

/**
 * i get lga id from user
 * load the lga from server
 * then load all polling units under that lga
 * loop through the polling units and get with function of complexity Bug O(n*2) 
 * add all the result together and show to user
 */

$show_message=false;
$lga=[];//store lga selected by user
$pollName='polling unit name';
$lga_id_selected_by_user='';

function get_LGAsName($id){
global $lga;
foreach($lga as $item){
    if(trim($item['uniqueid'])==trim($id)){
        return $item['lga_name'];
    }
}
}
function getLGAs(){
    global $lga;
    $data=getTable('lga');//get table is table i build inside my library located on /lib/app.functions.php it is use for loading table from database
    if(count($data) > 0)$lga=$data;
   
}

/**
 **/
getLGAs(); 
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['lga_id'])){
    //VIEW DATA 
$lga_id_selected_by_user=trim($_POST['lga_id']);
$show_message=false;
//GET ALL POLLING UNITS WHICH ID IS USER SELECTED ID
$polling_units_in_LGA=getTable('polling_unit',"lga_id=$lga_id_selected_by_user");
//print_r($polling_units_in_LGA);
$polling_units_in_LGA_sum= array(
    "PDP" => 0,
"DPP" => 0,
"ACN" => 0,
"PPA" => 0,
"CDC" => 0,
"JP" => 0,
'ANPP'=>0,
)
;
$dataAvailable=false;
//get polling unit results sumed data
$poll_unit_result=[];
foreach($polling_units_in_LGA as $polling_unit){
    $polling_unit_id=$polling_unit['polling_unit_id'];
 $data=getTable('announced_pu_results',"polling_unit_uniqueid=$polling_unit_id");
 if(count($data)<=0)continue;
 foreach($data as $recorded_result){
    $dataAvailable=true;
 if(isset($polling_units_in_LGA_sum[$recorded_result['party_abbreviation']])){
    $polling_units_in_LGA_sum[$recorded_result['party_abbreviation']]+=intval($recorded_result['party_score']);
 }else{
    //defined property
    $polling_units_in_LGA_sum[$recorded_result['party_abbreviation']]=0;
    $polling_units_in_LGA_sum[$recorded_result['party_abbreviation']]+=intval($recorded_result['party_score']);
 }
 }
}
$output=$polling_units_in_LGA_sum;
$pollName=get_LGAsName($lga_id_selected_by_user).' LGA';

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