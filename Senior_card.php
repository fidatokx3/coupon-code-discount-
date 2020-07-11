<?php
/**
 * Plugin Name:       Senior  Card Discount
 * Plugin URI:        http://fidatok.website
 * Description:       Senior Card Discount
 * Version:          1.2
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Fidatok Rahman
 * Author URI:        http:///php.fidatok.website
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       fidatok_World
 * Domain Path:       /languages
 */


 // hide coupon field on the cart page
/*
 function disable_coupon_field_on_cart( $enabled ) {
 	if ( is_cart() ) {
 		$enabled = false;
 	}
 	return $enabled;
 }
 add_filter( 'woocommerce_coupons_enabled', 'disable_coupon_field_on_cart' );

*/

/*

function show_active_cards(){
global $wpdb;
 $table_name = $wpdb->prefix . "cardno";
//$table_name=$wp->prefix.'card_no';

$card_row=$wpdb->get_row("SELECT * FROM $table_name ");
//card data anlize
$startc=$card_row->start_no;
$starte=$card_row->end_no;
$startl=$card_row->sl;
echo "Ctart Card No " .$startc;
echo "</br>";
echo "end Card No  " . $starte;
}
add_action('woocommerce_before_cart','show_active_cards');
 ?>
<table>
  <tr>
    <td>
    <?php// echo $wpdb->delete( 'wp_cardno', array( 'sl' => $startl ) ); ?>

    </td>
  </tr>
</table>

<?php

$table_name = $wpdb->prefix . "cardno";
//$table_name=$wp->prefix.'card_no';

$card_row=$wpdb->get_row("SELECT * FROM $table_name ");
//card data anlize
$startl=$card_row->sl;
//deleted data
global $wpdb;
$delete_card=$wpdb->delete($table_name , array("sl" =>$startl)) or wp_die("Data Not Deleted");


 ?>
 <button  type="button" name="button"> <a href="<?php $delete_card ?>"></a> </button> */
?>
<?php
function josh_admin_menu()
{
  add_menu_page('Forms','Senior Card','manage_options','josh_admin_menu','josh_admin_menu_main','',4);
  add_submenu_page('josh_admin_menu','Archive Submissions','Rate Rules','manage_options','josh_admin_menu_sub-archive','josh_admin_menu_sub_archive');
}
add_action('admin_menu','josh_admin_menu');
function josh_admin_menu_main()
{ //sub menu top
  echo "<h2>WelCome to  </h2> Senior Card Discount Process Setup Panel";
require_once('cardno.php');

}
function josh_admin_menu_sub_archive()
{
  echo "<h2>WelCome to</h2> Senior Card Discount Process Info Panel";
  require_once('card_rules.php');
}



 //create Table  dataBase
 function create_card_db(){
 global $wpdb;
 $table_name=$wpdb->prefix .'cardno';
 if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name){
 //if ($wpdb->get_var("SHOW TABLES LIKE " . $table_name)!=$table_name){
 $sql="CREATE TABLE `$table_name` ( `start_no` INT NOT NULL , `end_no` INT NOT NULL , `sl` INT NOT NULL AUTO_INCREMENT , PRIMARY KEY (`sl`) )";
     require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
     dbDelta($sql);
     //add_option('seniorcard_database_version','1.0');
     }
     }
     register_activation_hook(__FILE__,'create_card_db');

   function input_cardno() {?>
  <form class="inputcarddiscount"  method="post">
   <br>
    <p style="margin-top:25px;">Discount  For Senior Card User </p>
    <input style="background:light blue; width:445px;" type="text" name="senior_card_input" value="" placeholder="Enter your Senior Card Number Here">
    <input type="submit" name="cardsubmit" value="Apply Discount"placeholder="Apply Discount">
  </form>
<?php }
add_action( 'woocommerce_cart_actions', 'input_cardno' );
 function input_cardno2(){
   $url = site_url();
   $cart_url=$url . "/cart" ;
 echo "<a href= $cart_url> Are You a Senior Card User ? </br> Got To Cart Page For Discount </br>Or, Click Here </a>";
 }

add_action( 'woocommerce_discount_popup', 'input_cardno2' );

 function discount_senior_card(){
   if (isset($_POST['cardsubmit'])){
     $px1=$_POST['senior_card_input'];
   global $wpdb;
    $table_name = $wpdb->prefix . "cardno";
   //$table_name=$wp->prefix.'card_no';
   $card_row=$wpdb->get_row("SELECT * FROM $table_name");
   //card data anlize
   $startc=$card_row->start_no;
   $starte=$card_row->end_no;
 $item=$px1;
   $found=false;
   for ($i=$startc; $i<=$starte; $i++)
   {
     //if ($item==$i){}
     if ($item==$i){
   //break;//break if matched
 //add discount when card no matched ,,with data base
     global $woocommerce;
           $coupon_code='seniorcard@2020';
         if (!$woocommerce->cart->add_discount( sanitize_text_field( $coupon_code ))) {
             //$woocommerce->show_messages();
         }
 ///end
   //echo "Congrss you are a Senior Card Holder and Avaiable for Discount ";
     $found=true;
 }
 } echo ($found==true) ? "Your Discount Added !" : "!Card No Invalied ";
 }
 }
 add_action('woocommerce_before_cart_table', 'discount_senior_card');
 //add_action('woocommerce_before_checkout_form', 'discount_senior_card');


 //hide coupon code
 add_filter( 'woocommerce_cart_totals_coupon_label', 'bbloomer_hide_coupon_code', 99, 2 );
 function bbloomer_hide_coupon_code( $label, $coupon ) {
     return 'Coupon Applied!';
 }
?>
