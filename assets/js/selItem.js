const arrOpts=[];

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

$(this).addClass('edit-prod-clicked');

let numOptions=arrOpts.length;
$("h6.btitle").append("<span style='font-size:13px' class='nOpt badge badge-pill badge-primary'>"+numOptions+"</span>");

jQuery.each(arrOpts, function( i, val ) {
  
   let arrOptsElements = val.split(";");
   let prodName=arrOptsElements[2];
   let prodSize=arrOptsElements[1];
   let prodPrice=arrOptsElements[0];
   let prodImg=arrOptsElements[3];


   let finalOption=`<div class="row cartItems">
   <div class="cartImg cart col-2"><img src='res/img/`+ prodImg+`.png'/></div>
   <div class="cartName cart col-5">`+ prodName+`</div>
   <div class="cartSize cart col-2">`+ prodSize+`</div>
   <div class="cartPrice cart col-2">`+ prodPrice+`</div>
   <div class="carDel cart col-1"><i class="far fa-trash-alt"></i></div>
    </div>`;

    $("#basketItems").append(finalOption);

    console.log(finalOption);
  });


  
})