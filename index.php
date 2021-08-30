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

}

foreach($shelfInfo as $setShelf) {
  $size = $setShelf['size'];
  $price = $setShelf['price'];
  $desc = $setShelf['description'];

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

    echo"
    <div id='r".$i."_c".$r."' class='products' >
    <div id='img".$countItems."' class='imgShelf'><img src='res/img/".$countItems.".png'/></div> 
    <div id='size".$countItems."' class='sizeShelf'><span class='badge badge-dark'>".$size[ $indexArr]."</span></div>
    <div class='priceInfo'>
    <div id='price".$countItems."' class='priceShelf'><span>".$price[ $indexArr]."</span></div>
    <div id='addButton".$countItems."' class='addShelf'><span><i class='fas fa-cart-plus'></i></span></div>
    <div id='addButton".$countItems."' class='addShelf'><button id='edit-item'  data-price=$price[$indexArr] data-size=$size[$indexArr] data-info=$desc[$indexArr] data-img=$countItems>Apri</button></div>
    </div>

    <div id='des".$countItems."' class='description'> <span>".$desc[ $indexArr]."</span>  </div>

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

<!-- modal window -->

<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifica Progetto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <form id="modForm" action="#" method="POST" >
                          <input type="hidden" name="_method" value="PATCH">
                          <input type="hidden" id="idmodaltab" name="tab" value="">
                          <input type="hidden" name="salvaid" id="salvaid" value="">
                          <div class="form-group">
                          <label>Codice progetto</label>
                          <input required type="text" class="form-control" id="modal-input-name" name="name" aria-describedby="Codice" placeholder="Inserisci codice del progetto" value="">
                          </div>
                          <div class="form-group">
                            <div class="bootstrap-select-wrapper">
                              <label>Tipologia</label>
                              <select required title="Scegli una opzione" name="idtipo[]" id="idtipomod" class="selectpicker" multiple data-live-search="true">
                                <option value="CAWI">CAWI</option>
                                <option value="CAPI">CAPI</option>
                                <option value="CATI">CATI</option>
                                <option value="MYSTERY">MYSTERY</option>
                                <option value="Focus Group">FOCUS GROUP</option>
                                <option value="IDI/ETHNO">IDI / ETHNO</option>
                                <option value="GANG">GANG</option>
                                <option value="ALTRE QUALI">ALTRE QUALI</option>
                                </select>
                                
                            </div>
                            </div>
                            
                            <div class="form-group" id="formpaesi">
                              <div class="bootstrap-select-wrapper">
                                <label>Paesi</label>
                                <select required title="Scegli una opzione" name="idpaesi[]" id="idpaesimod" class="selectpicker" multiple data-live-search="true">
                                  <option value="ITALIA">ITALIA</option>
                                  <option value="UK">UK</option>
                                  <option value="SPAGNA">SPAGNA</option>
                                  <option value="GERMANIA">GERMANIA</option>
                                  <option value="FRANCIA">FRANCIA</option>
                                  <option value="USA">USA</option>
                                  <option value="RUSSIA">RUSSIA</option>
                                  <option value="SVIZZERA">SVIZZERA</option>
                                  <option value="OLANDA">OLANDA</option>
                                  <option value="POLONIA">POLONIA</option>
                                  <option value="CINA">CINA</option>
                                  <option value="GIAPPONE">GIAPPONE</option>
                                  </select>
                                  
                              </div>
                              </div>


                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CHIUDI</button>
                    <button type="submit" class="btn btn-primary">MODIFICA</button>
                </form>
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
//var price=
console.log(price);
//alert('tabname:'+tabname);

// prelva id inserito nel campo href come data
var id = el.data('item-id');
var description = el.data('description');
var name = el.data('prjname');
//var paesi=el.data('country');
var tipo=el.data('type');
var idpm=el.data('idpm');
var idcl=el.data('idcl');
var paesi=el.data('paesi');

/*
var startData = row.children(".sd").text();
var endData = row.children(".ed").text();
*/
var startData = el.data('start');
var endData = el.data('end');
//elaboro url per action form e lo aggiungo
var urlAction="/projects/"+id;
//alert(urlAction);
$('#modForm').attr('action', urlAction);
$("#formpm select").val(idpm);
$("#formcustomer select").val(idcl);


//alert(description);
// fill the data in the input fields
$("#modal-input-id").val(id);
$("#modal-input-description").val(description);
$("#modal-input-name").val(name);
$("#modal-input-sd").val(startData);
$("#modal-input-ed").val(endData);
$("#salvaid").val(id);

var customerselected=el.data('customer');
$('#idcustomer2').val( customerselected );


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

