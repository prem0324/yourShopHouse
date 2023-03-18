$(document).ready(function(){


$(document).on('click','.delete_product_btn',function(e){
        e.preventDefault();

        var id=$(this).val();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
             $.ajax({
                method :"POST",
                url:"code.php",
                data:{
                    'product_id':id,
                    'delete_product_btn':true
                },
                success: function (response) {
                    if(response==200){
                      swal("Success","Product Deleted Successfully", "success");
                      $("#product_table").load(location.href + " #product_table");
                    }
                    else if(response==500){
                      swal("Error","Somthing Went Wrong!", "error");
                    }
                }
             });
            } 
          });
    });

    $(document).on('click','.delete_category_btn',function(e){
      e.preventDefault();
      var id=$(this).val();
      swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
           $.ajax({
              method :"POST",
              url:"code.php",
              data:{
                  'category_id':id,
                  'delete_category_btn':true,
              },
              success: function (response) {
                  if(response==200){
                    swal("Success","Category Deleted Successfully", "success");
                    $("#category_table").load(location.href + " #category_table");
                  }
                  else if(response==500){
                    swal("Error","Somthing Went Wrong!", "error");
                  }
              }
           });
          } 
        });
  });
 
});

// var total_image=1;
// function add_more_images(){
//   total_image++;
//  var html='<div class="col-md-6" id="add_image_box_'+total_image+'"><label class="mb-0">Upload Image</label> <input type="file" name="image" class="form-control mb-2" required> </div><div class="col-md-12"><button class="btn btn-danger" type="button" onclick=remove_image("'+total_image+'") id="remove_image_box_'+total_image+'">Remove</div>';
//  jQuery('#image_box').after(html);
// }
// function remove_image(id){
//   jQuery('#add_image_box_'+id).remove(); 
//   jQuery('#remove_image_box_'+id).remove(); 
// }