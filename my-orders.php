<?php 
include('includes/header.php'); 
if(isset($_SESSION['auth'])){
?>

<div class="container-fluid">
            <div class="row px-xl-5">                           
                    <div class="col-lg-8 table-responsive mb-5">  
                        <table class="table table-light table-borderless table-hover text-center mb-0">
                        <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Tracking No</th>
                            <th>Price</th>
                            <th>Date</th>
                           <th>View </th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                                <?php 
                                $orders=getOrders();
                                if(mysqli_num_rows($orders)>0){
                                    while($item=$orders->fetch_assoc()){
                                        ?>
                                        <tr>
                                            <td ><?=$item['id']?></td>
                                            <td><?=$item['tracking_no']?></td>
                                            <td> <?=$item['total_price']?></td>
                                            <td> <?=$item['created_at']?></td>
                                            <td>
                                                <a href="view-order.php?t=<?=$item['tracking_no']?>" class="btn btn-primary">View Details</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                else{
                                    echo "You Don't Have Any Orders";
                                }
                                ?>
                    </tbody>
                        </table>
                    </div>                          
            </div>                              
 </div>                                         
<?php 
}
else{
    ?>
    <h1><?="You Must To Login";?></h1>
    <?php 
}
include('includes/footer.php')
?>