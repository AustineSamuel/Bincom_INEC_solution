<?php 
require_once 'backendsScripts/index.solution.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Austine's Solution</title>
    <link rel="stylesheet" href="lib/cssLibrary.css">
    <link rel="stylesheet" href="lib/w3css.css">
    <script src="lib/jquery.js">
      /lib/lib / jquery3.js
    </script> <script src="lib/MfunctionsLap.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  
    <link rel="stylesheet" href="lib/fontawesome-free-6.2.0-web/css/all.css">
    
    <link rel="shortcut icon" href="images/appImages/icon.png" type="image/x-icon">
   
  <link rel="stylesheet" href="styles/index.css">
    <script src="lib/angular-1.8.2/angular.js"></script>
    <script src="lib/jquery3.js"></script>
    <script src="scripts/index.angular.js"></script>
   
</head>
<body>

    <nav class="flexBetween w3-padding nav ">
        <div><img width="50" height="50" class="w3-circle" src='images/austine.jpg'>
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
create a page to display the result for any individual polling units under 
any particular local government you been 
given only contains LGA in Delta state
</article>
</div>


<br><br>
<div class="flexBetween">
    <b class="myname">Austine's Solutions : </b>
<button class="fa fa-github" onclick="href('https://github.com/austinesamuel')" icon></button>
</div>
    <div class="app">


        <div class="questionCtn">
            <button active >Question 1</button>
            <button onclick="href('pages/question2.php')">Question 2</button>
            <button onclick="href('pages/question3.php')"> Question 3</button>
        </div>


<div class="input w3-input w3-round"><!--starting input-->

    <div class="flexBetween">
    <label>Select a polling unit to view :</label>
         <span class="fa fa-ellipsis-v"></span>
   </div>
   <div class="flexStart">
    <form action="" method="post" action='./index.solution.php' class="flexStart" style="min-width:100%;">
    <select  name='polling_unit_id' class="w3-input w3-block">
        <?php //showing pollling units to select

        for($i=0;$i<count($polling_units);$i++){
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
    </form>
</div>
</div><!--end input container-->

<br>
<div class="flexCenter" id="userMessage" style="min-height:200px;"  <?php echo !$show_message ? 'hidden':'' ?>>
<section class="w3-center">
    <h3>Select polling unit to view</h3></b>
    <p >please choose a polling unit to view and click go button</p>
    
</section>
    </div><!--end user message-->


    <div class="table w3-padding w3-round"  <?php echo $show_message ? 'hidden':'' ?> >
        <span class="tableHeading">viewing results for <b> <?php echo $pollName; ?></b></span>
<table>
    <tr>
        <td>Party abbreviation</td>
        <td> agent</td>
        <td> score</td>
    </tr>
<?php
    /**
     * Array ( [0] => Array ( [result_id] => 172 [polling_unit_uniqueid] => 18
     *  [party_abbreviation] => PDP [party_score] => 1009 [entered_by_user] =>
     *  Ruheme - Christopher [date_entered] => 2011-04-26 18:13:27 [user_ip_address] =>
     *  192.168.1.115 ) [1] =>
     *  Array ( [result_id] => 173 [polling_unit_uniqueid] => 18 [party_abbreviation] => DPP [party_score] => 499 [entered_by_user] => Ruheme - Christopher [date_entered] => 2011-04-26 18:13:27 [user_ip_address] => 192.168.1.115 ) [2] => Array ( [result_id] => 174 [polling_unit_uniqueid] => 18 [party_abbreviation] => ACN [party_score] => 580 [entered_by_user] => Ruheme - Christopher [date_entered] => 2011-04-26 18:13:27 [user_ip_address] => 192.168.1.115 ) [3] => Array ( [result_id] => 175 [polling_unit_uniqueid] => 18 [party_abbreviation] => PPA [party_score] => 487 [entered_by_user] => Ruheme - Christopher [date_entered] => 2011-04-26 18:13:27 [user_ip_address] => 192.168.1.115 ) [4] => Array ( [result_id] => 176 [polling_unit_uniqueid] => 18 [party_abbreviation] => CDC [party_score] => 644 [entered_by_user] => Ruheme - Christopher [date_entered] => 2011-04-26 18:13:27 [user_ip_address] => 192.168.1.115 ) [5] => Array ( [result_id] => 177 [polling_unit_uniqueid] => 18 [party_abbreviation] => JP [party_score] => 709 [entered_by_user] => Ruheme - Christopher [date_entered] => 2011-04-26 18:13:27 [user_ip_address] => 192.168.1.115 ) [6] => Array ( [result_id] => 178 [polling_unit_uniqueid] => 18 [party_abbreviation] => ANPP [party_score] => 561 [entered_by_user] => Ruheme - Christopher [date_entered] => 2011-04-26 18:13:27 [user_ip_address] => 192.168.1.115 ) [7] => Array ( [result_id] => 179 [polling_unit_uniqueid] => 18 [party_abbreviation] => LABO [party_score] => 627 [entered_by_user] => Ruheme - Christopher [date_entered] => 2011-04-26 18:13:27 [user_ip_address] => 192.168.1.115 ) ) 
     *  {"uniqueid":"8","polling_unit_id":"6","ward_id":"8","lga_id":"17","uniquewardid":"181","polling_unit_number":"DT1708006","polling_unit_name":"Sapele Ward 8 PU _","polling_unit_description":null,"lat":"5.59371889","long":"5.999311165","entered_by_user":null,"date_entered":null,"user_ip_address":null}
     */

    foreach($output as $outputEl){
        $party=$outputEl['party_abbreviation'];
        $agent=$outputEl['entered_by_user'];
        $score=$outputEl['party_score'];
   echo " <tr>
        <td >$party</td>
        <td> $agent</td>
        <td>$score</td>
    </tr>
    ";
    }
    ?>




</table>
    </div>




    </div><!--end app-->

    
</div><!--end body-->

</body>
</html>