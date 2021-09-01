
//add item in cart box
let arrOpts=[];
let arrId=[];

let arrOptsElements;
let prodName;
let prodSize;
let prodPrice;
let prodImg;

$(document).on('click', "#edit-prod", function() {

    $("#basketItems").empty();
    $(".nOpt").empty();
   

    let pri=$(this).attr('data-price');
    let siz=$(this).attr('data-size');
    let des=$(this).attr('data-info');
    let img=$(this).attr('data-img');

    let info=String(pri)+";"+String(siz)+";"+String(des)+";"+String(img);

if (!$(this).hasClass("edit-prod-clicked")) 
{
$(this).html("<i style=\"color:green\" class=\"fas fa-check\"></i>");
arrOpts.push(info); 
}


let numOptions=arrOpts.length;
$("h6.btitle").append("<span style='font-size:13px' class='nOpt badge badge-pill badge-primary'>"+numOptions+"</span>");

jQuery.each(arrOpts, function( i, val ) {
  
   arrOptsElements = val.split(";");
   prodName=arrOptsElements[2];
   prodSize=arrOptsElements[1];
   prodPrice=arrOptsElements[0];
   prodImg=arrOptsElements[3];



   let finalOption=`<div class="row cartItems">
   <div class="cartImg cart col-2"><img src='res/img/`+ prodImg+`.png'/></div>
   <div class="cartName cart col-5">`+ prodName+`</div>
   <div class="cartSize cart col-2">`+ prodSize+`</div>
   <div class="cartPrice cart col-2">`+ prodPrice+`</div>
   <div id='delOp`+ prodImg+`' class="carDel cart col-1" data-optId=`+prodImg+` data-optInfo="`+arrOptsElements+`"><i class="far fa-trash-alt"></i></div>
    </div>`;

    $("#basketItems").append(finalOption);

  });

if (!$(this).hasClass("edit-prod-clicked")) 
{
  arrId.push(prodImg); 
}

$(this).addClass('edit-prod-clicked');


})


//delete item from cart box

$(document).on('click', ".carDel", function() {

let idDelete=$(this).attr("id");
let optDel=$(this).attr('data-optId');

$("#"+idDelete).parent().remove();

console.log(arrId)

var index = arrId.indexOf(optDel);
if (index >= 0) {
  arrOpts.splice( index, 1 );
  arrId.splice( index, 1 );
}

console.log(arrOpts)

$(".cart"+optDel).removeClass("edit-prod-clicked");
$(".cart"+optDel).html("<i class='fas fa-cart-plus'></i>");



$(".nOpt").empty();
let numOptions2=arrOpts.length;

if (numOptions2==0)
{
  $(".nOpt").hide();
  $("#basketItems").html("<span class=\"iconCart\" style=\"font-size:80px;\"><i class=\"fas fa-shopping-cart\"></i></span>");
}

else 
{
$("h6.btitle").append("<span style='font-size:13px' class='nOpt badge badge-pill badge-primary'>"+numOptions2+"</span>");
}

});