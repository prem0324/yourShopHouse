<?php 
include('includes/header.php'); 
if(isset($_SESSION['auth'])){
    $totalPrice=0;
?>

<div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <div id="mycart">
                <?php 
                $item=getCartItems();
                if(mysqli_num_rows($item)>0){
                   
                    while($cart=$item->fetch_assoc()){
                        $totalPrice+=$cart['selling_price']*$cart['prod_qty'];
                ?>

                    <tbody class="align-middle product_data">
                        <tr>
                            <td class="align-middle"><img src="uploads/<?=$cart['image'];?>" alt="" style="width: 50px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$cart['name']?></td>
                            <td class="align-middle">₹<?=$cart['selling_price']?></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <input type="hidden" class="prodId" value="<?=$cart['prod_id']?>">
                                        <button class="btn btn-sm btn-primary btn-minus updateQty" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center qty" value="<?=$cart['prod_qty']?>">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus updateQty">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle"><button class="btn btn-sm btn-danger deleteItem" value="<?=$cart['cid']?>"><i class="fa fa-times"></i></button></td>
                        </tr>
                    </tbody>
                <?php
                    }
                }
                else{
                    echo "Your Cart Is Empty";
                }
                ?>
                 </div>
                </table>
                <!-- //Payment -->
                <div class="col-lg-4">
                <form class="mb-30" action="">
                    <!-- <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div> -->
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>₹<?=$totalPrice?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">₹0</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5><?=$totalPrice?></h5>
                        </div>
                        <a class="btn btn-block btn-primary font-weight-bold my-3 py-3" href="check-out.php">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
            </div>  
        </div>
    </div>
               
<?php 
}
else{
    ?>
    <h1><?="Login To Checkout Cart";?></h1>
    <?php
    
}
include('includes/footer.php')
?>