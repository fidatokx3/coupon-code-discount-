<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
if (isset($_POST['submit_card_no'])){
  global $wpdb;
$table_name =$wpdb->prefix .'cardno';
$startc=$_POST['start_no'];
$endc=$_POST['end_no'];
$wpdb->insert($table_name,array("start_no"=>$startc,"end_no"=>$endc)) ;
echo "<h2>Updated!</h2>";
}
else {
echo "insert fail";
}


 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">

   <body>
     <style>
   * {
     box-sizing: border-box;
   }

   input[type=text], select, textarea {
     width: 100%;
     padding: 12px;
     border: 1px solid #ccc;
     border-radius: 4px;
     resize: vertical;
   }

   label {
     padding: 12px 12px 12px 0;
     display: inline-block;
   }

   input[type=submit] {
     background-color: #1873B7;
     color: white;
     padding: 12px 20px;
     border: none;
     border-radius: 4px;
     cursor: pointer;
     float: right;
   }

   input[type=submit]:hover {
     background-color: #4B8AC2;
   }

   .container {
     border-radius: 5px;
     background-color: #f2f2f2;
     padding: 20px;
   }

   .col-25 {
     float: left;
     width: 25%;
     margin-top: 6px;
   }

   .col-75 {
     float: left;
     width: 75%;
     margin-top: 6px;
   }

   /* Clear floats after the columns */
   .row:after {
     content: "";
     display: table;
     clear: both;
   }

   /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
   @media screen and (max-width: 600px) {
     .col-25, .col-75, input[type=submit] {
       width: 100%;
       margin-top: 0;
     }
   }
 .h1{
     color:#1873B7;
     text-align: center;
   }

   /* style for table data */
   td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
caption{
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}
   </style>
   <div class="container">
     <form action="" method="Post">
       <h1 class="h1"> Insert the Card Range </h1>
     <div class="row">
       <div class="col-25">
         <label for="fname">Card Number Start From </label>
       </div>
       <div class="col-75">
         <input type="text" id="fname" name="start_no" placeholder=" Card no, 45xx xxxx xxxx xxx xxxx">
       </div>
     </div>
     <div class="row">
       <div class="col-25">
         <label for="lname">Card Number End </label>
       </div>
       <div class="col-75">
         <input type="text" id="lname" name="end_no" placeholder="Last Card  No ,45xx xxxx xxxx xxx xxxx">
       </div>

     <div class="row">
       <input type="submit" name="submit_card_no" value="Submit">
     </div>
     </form>
<br>
<?php
/*
global $wpdb;
 $table_name = $wpdb->prefix . "cardno";
//$table_name=$wp->prefix.'card_no';
$card_row=$wpdb->get_row("SELECT * FROM $table_name");
//card data anlize
$startc=$card_row->start_no;
$starte=$card_row->end_no;
$startl=$card_row->sl;


<table>
  <tr>
  <td> <?php echo "Start Number   ". "&nbsp".$startc; ?></td>
  <td> <?php echo "End Number   " ."&nbsp".$starte; ?></td>
<td> <?php echo "id_No:   " ."&nbsp" .$startl; ?></td>
  </tr>
</table>
*/



?>
<?php
global $wpdb;
$id="";
$start_from="";
$end_from="";
$table_name=$wpdb->prefix."cardno";
$wp_results=$wpdb->get_results( "SELECT * FROM $table_name ");
if (isset($_POST['delete'])){
  $wpdb->delete($table_name,
            array(
               'sl'=>$_POST['delete']
             )
  );
}

?>
<table1>
  <form  action="<?php echo admin_url('admin.php?page=josh_admin_menu'); ?>" method="post">

 <table>
   <caption>Active Card Range</caption>

 <tr>
   <th>Serial No </th>
   <th>Card Start No </th>
   <th>Card End No </th>
   <th>Action</th>
 </tr>

<?php
foreach ($wp_results as $wp_res) {
  $id=$wp_res->sl;
  $start_from=$wp_res->start_no;
  $end_from=$wp_res->end_no;

 ?>

  <tr>
    <td> <?php echo $id; ?></td>
    <td> <?php echo $start_from; ?></td>
    <td> <?php echo $end_from; ?></td>
    <td> <button type="submit" name="delete" value="<?php echo $id; ?>"> Delete</button></td>

  </tr>
</table1>
</form>
<?php } ?>


 </table>

   </body>
 </html>
