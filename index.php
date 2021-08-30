<!DOCTYPE html> 

<head>

<?php
// Decode the JSON file
$jsonFile = file_get_contents('options.json');
 
$decoded_json = json_decode($jsonFile, true);
 
$setting= $decoded_json['setting'];
$shelfInfo= $decoded_json['shelf'];

// get setting info
foreach($setting as $setOpt) {
  $title = $setOpt['heading'];
  $nItems = $setOpt['num_items'];
  $questionTxt = $setOpt['qtext'];
  $questionSubTxt = $setOpt['qtext2'];
  $basketTxt = $setOpt['basketTitle'];
  $currency = $setOpt['currency'];
  $scrollTime = $setOpt['scrollTime'];


}

foreach($shelfInfo as $setShelf) {
  $size = $setShelf['size'];
  $price = $setShelf['price'];
  $desc = $setShelf['description'];
  $iid = $setShelf['iid'];

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



<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

</head>

<body>

<div class="row">

<div class="col-xl-3 answerBox order-md-2" > 

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

<div class="col-xl-9 order-md-1" > 
<div class="card shadow mb-12 ">

  <div style="background-color:#2A3139;" class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	<h6 style="color:#fff" class="m-0 font-weight-bold"> <?php echo $title ?> &nbsp; <span style="float:right"></span> </h6>
 </div>

<div class="card-body">  

<div class="row">

<div class="col-md-12">

<div class="table-wrapper-scroll-y my-custom-scrollbar">

  
  <?php
  
$num_rows=ceil($nItems/5);
$countItems=1;
$indexArr=0;

for ($r = 1; $r <= $num_rows; $r++) 
{

echo "<div id='row".$r."' class='rowShelf'>";

for ($i = 1; $i <= 5; $i++) 
{
  

    if ($countItems<=$nItems)
    {
      $id=$iid[ $indexArr];
      $viewPrice=number_format($price[$indexArr],2);
      $viewPrice=$viewPrice.$currency;

    echo"
    <div id='r".$i."_c".$r."' class='products' >
    <div id='img".$id."' class='imgShelf'><img src='res/img/".$id.".png'/></div> 

    <div id='size".$id."' class='sizeShelf'>
    <span class='badge badge-dark'>".$size[ $indexArr]."</span>
    <span id='edit-item' class='zoom'  data-price='$viewPrice' data-size='$size[$indexArr]' data-info='$desc[$indexArr]' data-img='$id' >
    <i class='fas fa-search-plus'></i>
   </span>
    
    </div>
    <div class='priceInfo'>
    <div id='price".$id."' class='priceShelf'><span>".$viewPrice."</span></div>
    <div id='addButton".$id."' class='addShelf'><span><i class='fas fa-cart-plus'></i></span></div>
    </div>

    <div id='des".$id."' class='description'> <span>".$desc[ $indexArr]."</span>  </div>

     </div>";
    $countItems++;
    $indexArr++;
    } 

  }

  echo "</div>";

}


  ?>



</div>







</div>





</div>

</div>




</div>
</div>







</div>

<!-- modal window products -->

<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                  <div class="row">
                  
                 

                      <div class="col-xl-9 modalImg" > 

                      </div>

                      <div class="col-xl-3 modalInfo" > 

                      </div>

                  
                  </div>

                      
                  </div>
                </div>
              </div>
            </div>

<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.5.0/js/bootstrap4-toggle.min.js"></script>



<!-- script for modal window -->
<script>


$(document).on('click', "#edit-item", function() {

  $(".modalImg").empty();
  $(".modalInfo").empty();
  $("#exampleModalLabel").empty();

$(this).removeClass('edit-item-trigger-clicked'); 
$(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

var options = {
'backdrop': 'static'
};
$('#edit-modal').modal(options)
})

// on modal show
$('#edit-modal').on('show.bs.modal', function() {

//la classe trigger l'avrà solo l'elemento cliccato
var el = $(".edit-item-trigger-clicked");

//prende elemento precedente
var price=el.attr('data-price');
var size=el.attr('data-size');
var description=el.attr('data-info');
var img=el.attr('data-img');

size=size.toString();
console.log("Size "+price)

let image="<div class='mimg'><img src='res/img/"+img+".png'/></div>";
let modTitle="<div class='mtit'>"+description+"</div>"; 
let descMod="<div class='mdesc'> <div class='mdescs'> "+size+" </div><div class='mdescp'> "+price+" </div></div>";

$("#exampleModalLabel").append(description);
$(".modalImg").append(image);
$(".modalInfo").append(descMod);






})

// on modal hide
$('#edit-modal').on('hide.bs.modal', function() {

//quando si chiude la modali viene rimossa la classe trigger all'elemento cliccato
$('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
$("#edit-form").trigger("reset");
})            

</script>


</body>





</html>

