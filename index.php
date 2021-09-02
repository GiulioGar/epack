<!DOCTYPE html> 

<head>

<!-- Giuseppe -->
<style>
.disabledbutton {
    pointer-events: none;
    opacity: 0.4;
}
</style>
<!--  -->

<?php
/* GIUSEPPE */
$idSelectProduct = filter_input(INPUT_GET, 'idSelectProduct');
/* */

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
  $orderItems = $setOpt['orderItems'];


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

<!-- GIUSEPPE -->
<input type="hidden" id="productSelected" name="productSelected" value="">



<!-- inizializzo le variabili da registrare -->
<input type="hidden" name="totalTime" id="totalTime" value=0>
<input type="hidden" name="selProductPrev" id="selProductPrev" value="<?php echo $idSelectProduct; ?>">
<?php 

foreach ($iid as $singleId){
  echo "<input type='hidden' name='timeProductSheet$singleId' id='timeProductSheet$singleId' value=0>";
  echo "<input type='hidden' name='clickProductSheet$singleId' id='clickProductSheet$singleId' value=0>";
}

?>
<!-- -->

</head>

<body>

<div id="container" class="row">

<div class="col-xl-3 answerBox order-md-2" > 

<div class="row qtitle">
<div class="col">
<div class="card shadow ">

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
</div>

<br/><br/>

<div style='margin-bottom:5%' class="row basket">
<div class="col">
<div class="card shadow">

   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
	<h6 class="btitle m-0 font-weight-bold text-primary"> <?php echo $basketTxt; ?>  </h6>
 </div>

<div class="card-body">  

<div class="row">

<div class="col-md-12">

<!--BASKET SPACE-->

<div id="basketItems" style="text-align:center">
  <span class="iconCart" style="font-size:80px;"><i class="fas fa-shopping-cart"></i></span>


</div>



</div>





</div>

</div>




</div>
</div>

</div>



</div>

<div class="col-xl-9 order-md-1" > 
<div class="col">
<div class="card shadow">

  <div style="background-color:#2A3139;" class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

    <div class="col-md-9">
    <h6 style="color:#fff; width:100%" class="m-0 font-weight-bold"> <?php echo $title ?> &nbsp; </h6>
    </div>
    <div class="col-md-3 text-left">
    <form role="form" name="prductOrder" >
							<select class="form-control form-control-sm Canno" name="Canno">
								<option value="1"><?php echo $orderItems[0] ?></option>
								<option value="2"><?php echo $orderItems[1] ?></option>
								<option value="3"><?php echo $orderItems[2] ?></option>
							</select>
						</form>
    </div>
  

 </div>

<div class="card-body">  

<div class="row">

<div class="col-md-12">


  
  <?php
  
$num_rows=ceil($nItems/5);
$countItems=1;
$indexArr=0;
echo "<div class='row shelfCont'>";

echo "</div>";

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
<script src="assets/js/selItem.js"></script>

<script>

//ajax code for shelf 

/* GIUSEPPE */
//modificata sintassi di passaggio data e letto selproductPrev creato sopra
function addItems(){

let can= $("select.Canno").val();
var idSelectProduct=$("#selProductPrev").val();
let products;

  //chiamata ajax
    $.ajax({

     //imposto il tipo di invio dati (GET O POST)
      type: "POST",

      //Dove devo inviare i dati recuperati dal form?
      url: "support.php",

      //Quali dati devo inviare?
      data: {Canno: can, idSelectProduct: idSelectProduct},
      dataType: "html",
	  success: function(data) 
	  					{ 
							products=$(data).filter(".products");
							$(".shelfCont").html(products);
						}

 
});

}

$("select.Canno").on('change', function() {
addItems();
});

$(document).ready(function () {
  addItems();

  /*GIUSEPPE*/
  var varStartCronometroSheet;
  //faccio partire il cronometro relativo al tempo totale
  var varStartCronometro=setInterval(startCronometro,1000);
  $("div#box1").addClass("disabledbutton");
  /* */ 
});



//script for modal window



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

/* GIUSEPPE */
//faccio partire il cronometro della scheda prodotto aperta e registro il click effettuato sulla stessa
varStartCronometroSheet=setInterval( function() { startCronometroSheet(img); }, 1000 );
recordClickSheet(img);
/* */

size=size.toString();

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
/*GIUSEPPE*/
//stoppo il contatore quando viene chiusa la modale
stopCronometroSheet();
/* */
})  



/*GIUSEPPE*/
function startCronometro(){
    var secondiTotalTime=$("#totalTime").val();
    secondiTotalTime++;
    $("#totalTime").val( secondiTotalTime );
};


function startCronometroSheet(id){
    var secondiSheetTime=$("#timeProductSheet"+id).val();
    secondiSheetTime++;
    $("#timeProductSheet"+id).val( secondiSheetTime );
};

function recordClickSheet(id){
    var clickSheet=$("#clickProductSheet"+id).val();
    clickSheet++;
    $("#clickProductSheet"+id).val( clickSheet );
};

function stopCronometroSheet(){
  clearInterval(varStartCronometroSheet);
};
/* */

</script>


</body>





</html>

