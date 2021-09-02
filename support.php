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

/* GIUSEPPE */
$order=$_POST["Canno"];
$idSelectProduct=$_POST["idSelectProduct"];

if ($order=="2"){array_multisort($price,$size,$iid,$desc);}
if ($order=="3"){array_multisort($price,SORT_DESC,$size,$iid,$desc);}
/* */
  
$num_rows=ceil($nItems/5);
$countItems=1;
$indexArr=0;

for ($r = 1; $r <= $num_rows; $r++) 
{

 
for ($i = 1; $i <= 5; $i++) 
{
  

    if ($countItems<=$nItems)
    {
      $id=$iid[ $indexArr];
      $viewPrice=number_format($price[$indexArr],2);
      $viewPrice=$viewPrice.$currency;

    echo"
    
    <div id='box$id' class='products col-lg-2 col-md-3 col-sm-4' >
    <div id='img".$id."' class='imgShelf'><img src='res/img/".$id.".png'/></div> 

    <div id='size".$id."' class='sizeShelf'>
    <span class='badge badge-dark'>".$size[ $indexArr]."</span>
    <span id='edit-item' class='zoom'  data-price='$viewPrice' data-size='$size[$indexArr]' data-info=\"$desc[$indexArr]\" data-img='$id' >
    <i class='fas fa-search-plus'></i>
   </span>
    
    </div>
    <div class='priceInfo'>
    <div id='price".$id."' class='priceShelf'><span>".$viewPrice."</span></div>
    <div id='addButton".$id."' class='addShelf'><span id='edit-prod' class='cart".$id." viewCart' data-price='$viewPrice' data-size='$size[$indexArr]' data-info=\"$desc[$indexArr]\" data-img='$id'><i class='fas fa-cart-plus'></i></span></div>
    </div>

    <div id='des".$id."' class='description'> <span class='justify-content-center'>".$desc[ $indexArr]."</span>  </div>

     </div>";
    $countItems++;
    $indexArr++;
    } 

  }
  



}






?>