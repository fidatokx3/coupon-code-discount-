<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <body>
     <style media="screen">

     </style>


<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px;/* Location of the box */
  padding-left: 50px;
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}
.dec{
  background-color: #143858;
  margin: auto;
  color: #F2F9FF;
  padding: 20px;
  border: 1px solid #888;
  width: 90%;
  font-size: 18px;
}


/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}



</style>
</head>
<body>

  <h1> Activation Process For Senior Card Discount </h1>
  <h2> Please Follow The Few Step To Active the Function </h2>

<!-- Trigger/Open The Modal -->
<button id="myBtn"> Process For Discount  </button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="dec">


    <p>Open The "Senior Card" Form Menu Bar </p>
      <h5>Inter the Start Card number Properly </h5>
      <h5>Inter the End Card number Properly </h5>
      <h2>Then ,</h2>

      <p>Go to woocommerce From Menu Bar  </p>
        <h5>Select Coupon  </h5>
        <h5>Enter The Coupon Name: seniorcard@2020 </h5>
        <h5>Select the Coupon amount For Discount  </h5>
  </div>
  </div>

</div>


<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

   </body>
 </html>
