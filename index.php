<!DOCTYPE html> 

<head>

<?php
// Decode the JSON file
$jsonFile = file_get_contents('options.json');
 
$decoded_json = json_decode($jsonFile, true);
 
$setting= $decoded_json['setting'];

foreach($setting as $setOpt) {
  $title = $setOpt['heading'];
  $nItems = $setOpt['num_items'];
  $questionTxt = $setOpt['qtext'];
  $questionSubTxt = $setOpt['qtext2'];
  $basketTxt = $setOpt['basketTitle'];

}


?>


<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
	
	    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
		
  <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
  <!-- DATA TABLES  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />		

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    
  
        <!-- FONT AWESOME STYLE  -->
        <link href="assets/css/all.css" rel="stylesheet" />

<title>E-pack</title>


<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
</head>

<body>

<div class="row">

<div class="col-xl-9"> 
<div class="card shadow mb-12 ">

  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	<h6 class="m-0 font-weight-bold text-primary"> <?php echo $title ?> &nbsp; <span style="float:right"></span> </h6>
 </div>

<div class="card-body">  

<div class="row">

<div class="col-md-12">

<!-- TABELLA DATI  DA  ENGAGE-->

<?php


?>

<table class="table">
  <thead class="thead-light">
  </thead>

  <tbody>
  
  <?php
  
$num_rows=$nItems/5;
for ($r = 1; $r <= $num_rows; $r++) 
{
  echo "<tr>";
for ($i = 1; $i <= 5; $i++) 
{
    echo "<td>Prodotto </td>";
}
echo "</tr>";
}
  ?>



  </tbody>
</table>








</div>





</div>

</div>




</div>
</div>


<div class="col-xl-3"> 

<div class="row qtitle">

<div class="card shadow mb-12 ">

   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	<h6 class="m-0 font-weight-bold text-primary"> </h6>
 </div>

<div class="card-body">  

<div class="row">

<div class="col-md-12">

<!--QUESTION TITLE-->

<div class="titleQst">
<?php echo $questionTxt; ?> 
<br/>
<br/>
<p class="subText"><?php echo $questionSubTxt; ?> </p>

</div>



</div>





</div>

</div>




</div>

</div>


<div class="row basket">

<div class="card shadow mb-12" style="width:100%">

   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	<h6 class="m-0 font-weight-bold text-primary"> <?php echo $basketTxt; ?>  </h6>
 </div>

<div class="card-body">  

<div class="row">

<div class="col-md-12">

<!--BASKET SPACE-->

<div id="basketItems" style="text-align:center">
  <span style="font-size:80px;"><i class="fas fa-shopping-cart"></i></span>


</div>



</div>





</div>

</div>




</div>

</div>



</div>




</div>




</body>
</html>
