(function ($) {
    "use strict";
    
    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Vendor carousel
    $('.vendor-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:2
            },
            576:{
                items:3
            },
            768:{
                items:4
            },
            992:{
                items:5
            },
            1200:{
                items:6
            }
        }
    });


    // Related carousel
    $('.related-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:4
            }
        }
    });
//product Increment Decrement
$(document).ready(function(){
    $('.btn-plus').click(function(e){
            e.preventDefault();
            
            var qty=$(this).closest('.product_data').find('.qty').val();
            var value=parseInt(qty);
            value=isNaN(value)?0:value;
            value++;
            $(this).closest('.product_data').find('.qty').val(value);
    });
    $('.btn-minus').click(function(e){
            e.preventDefault();
            
            var qty=$(this).closest('.product_data').find('.qty').val();
            var value=parseInt(qty);
            value=isNaN(value)?0:value;
            value--;
            $(this).closest('.product_data').find('.qty').val(value);
    });
});
    //Add To Cart
    $('.addToCartBtn').on('click', function (e) {
        e.preventDefault();
        var prod_id=$(this).val();
        var qty=  $('.qty').val();

      $.ajax({
        method :"POST",
        url:"functions/handlecart.php",
        data :{
            "prod_id":prod_id,
            "prod_qty":qty,
            "scope":"add"
        },
        success: function(response){
            if(response==201){
              alertify.success("Product Added To Cart");
            }
            if(response=="existing"){
                alertify.success("Product Already In Cart");
          
              }
            else if(response==401){
                alertify.success("Login To Continue");
            }
            else if(response==500){
                alertify.success("Somthing Went Wrong");
            }
        }
      });
    });

    $(document).on('click','.updateQty',function(){
        var prod_id=$(this).closest('.product_data').find('.prodId').val();
        var qty=$(this).closest('.product_data').find('.qty').val();
        $.ajax({
            method :"POST",
            url:"functions/handlecart.php",
            data :{
                "prod_id":prod_id,
                "prod_qty":qty,
                "scope":"update"
            },
            success:function(response){
                 
            }
    });
}); 

//delet Cart BTn
$(document).on('click','.deleteItem',function(){
    var cart_id=$(this).val();
    // alert(cart_id);
    $.ajax({
        method :"POST",
        url:"functions/handlecart.php",
        data :{
            "cart_id":cart_id,
            "scope":"delete"
        },
        success:function(response){
             if(response==200){
                alertify.success("Item Deleted");
                $('#mycart').lod(location.href + " #mycart");
             }
             else{
                alertify.success(response);

             }
        }
});
});

// $(document).on('click','.cart_btn',function(){
//     var prod_id=$(this).closest('.cart_data').find('.cartId').val();
//        alert(prod_id);
//             $.ajax({
//                method : "POST",
//                url:"functions/handlecart.php",
//                data :{
//                    "prod_id":prod_id,
//                    "scope":"addToCart"
//                },
//                success: function(response){
//                 if(response==201){
//                   alertify.success("Product Added To Cart");
//                 }
//                 if(response=="existing"){
//                     alertify.success("Product Already In Cart");
              
//                   }
//                 else if(response==401){
//                     alertify.success("Login To Continue");
//                 }
//                 else if(response==500){
//                     alertify.success("Somthing Went Wrong");
//                 }
//             }
//             });
// });



})(jQuery);

