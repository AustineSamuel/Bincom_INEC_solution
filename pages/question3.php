<?php
require_once '../backendsScripts/question3.solution.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Austine's Solution</title>
    <link rel="stylesheet" href="../lib/cssLibrary.css">
    <link rel="stylesheet" href="../lib/w3css.css">
    <script src="../lib/jquery.js">
      /lib/lib / jquery3.js
    </script> <script src="../lib/MfunctionsLap.js"></script>
    
    <script src="../https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  
    <link rel="stylesheet" href="../lib/fontawesome-free-6.2.0-web/css/all.css">
    
    <link rel="shortcut icon" href="../images/appImages/icon.png" type="image/x-icon">
   
  <link rel="stylesheet" href="../styles/index.css">
    <script src="../lib/angular-1.8.2/angular.js"></script>
    <script src="../lib/jquery3.js"></script>
    <script src="../scripts/index.angular.js"></script>
   
</head>
<body>

    <nav class="flexBetween w3-padding nav ">
        <div><img width="50" height="50" class="w3-circle" src='../images/austine.jpg' >
             <b>Bincom <i class="fa fa-caret-right"></i></b>
            Test
            </div>

            <div onclick="href('https://github.com/austinesamuel')">
                <span>Austine Samuel </span>
                <i class="fa fa-github" icon></i>
            </div>
    </nav>

    <div class="body">
<div class="w3-padding w3-round" id="message">
question 1
<article>
    this is bla bla
</article>
</div>


<br><br>
<div class="flexBetween">
    <b class="myname">Austine's Solutions : </b>
<button class="fa fa-github" onclick="href('https://github.com/austinesamuel')" icon></button>
</div>
    <div class="app">

<form  action="" method="post" action='./question3.solution.php' >
        <div class="questionCtn">
            <button onclick="href('../index.html')" >Question 1</button>
            <button onclick="href('question2.html')">Question 2</button>
            <button active> Question 3</button>
        </div>




        <div class="flexStart ">
    <select  name='polling_unit_id' class="w3-input w3-block">
        <?php //showing pollling units to select

        for($i=0;$i<count($polling_units);$i++){
            #a= Array ( [uniqueid] => 1 [polling_units_id] => 1 [polling_units_name] => Aniocha North [state_id] => 25 [polling_units_description] => Aniocha North [entered_by_user] => Bincom [date_entered] => 0000-00-00 00:00:00 [user_ip_address] => 127.0.0.2 ) [1] => Array ( [uniqueid] => 2 [polling_units_id] => 2 [polling_units_name] => Aniocha - South [state_id] => 25 [polling_units_description] => Aniocha - South [entered_by_user] => Bincom [date_entered] => 0000-00-00 00:00:00 [user_ip_address] => 127.0.0.1 ) [2] => Array ( [uniqueid] => 3 [polling_units_id] => 5 [polling_units_name] => Ethiope East [state_id] => 25 [polling_units_description] => Ethiope East [entered_by_user] => Bincom [date_entered] => 0000-00-00 00:00:00 [user_ip_address] => 127.0.0.5 ) [3] => Array ( [uniqueid] => 4 [polling_units_id] => 6 [polling_units_name] => Ethiope West [state_id] => 25 [polling_units_description] => Ethiope Wes
            $el=$polling_units[$i];
            $id=$el['uniqueid'];
            $name=$el['polling_unit_name'];
            $idNumber=$el['polling_unit_number'];
            $select='';

            if(trim($id)==trim($polling_unit_id_by_user)){
                $select='selected';
             }
            
       echo " <option value='$id' $select>
            $name ($idNumber) 
        </option>
        ";       
    }
        ?>
    </select>
    <button type='submit' id="go">Go</button>
    </div>

<div class="form w3-padding">





<?php 
for($i=0; $i<=count($party_list); $i++){
    $party=$party_list[$i];
    $partyname=$party['partyname'];
    $partyAbbr=$party['partyid'];
    
    echo "<div class='formInput'><!--start form ctn-->
        <div>
<b>Add record for $partyAbbr</b>
<!--input-->
<div class='fInput'>
<span>score </span> <input type='number w3-input' name='score_$partyAbbr'>
</div>
</div><!--input end-->

<div>
<!--input-->
<div class='fInput'>
<span>entered_by </span> <input type='number w3-input' name='user_$partyAbbr'>
</div>
</div><!--input end-->
<!--input ctn end-->
    </div><!--end form ctn-->
    ";

}

?>



<input id='#ip' name='ip'/>




    


</div>
</form>
    </div><!--end app-->


    



    
</div><!--end body-->
<script src="../frontEndscripts/myIpAddress.js">
</script>
<script>
onclick=()=>{
$('#ip').val(ip);
}

</script>
</body>
</html>