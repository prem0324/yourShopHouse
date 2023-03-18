<?php 
include('../middleware/adminmiddleware.php');
include('includes/header.php'); 
if(isset($_SESSION['auth'])){
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
                <div class="card"> 
                    <div class="card-header">
                       <h4>Orders</h4>
                       <a href="order-history.php" class="btn btn-danger float-end">Order History</a>
                    </div>
                    <table>
                        <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>User ID</th>
                            <th>Tracking No</th>
                            <th>Paid Amount</th>
                            <th>Date</th>
                           <th>View </th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                                <?php 
                                $orders=getOrderHistory();
                                if(mysqli_num_rows($orders)>0){
                                    while($item=$orders->fetch_assoc()){
                                        ?>
                                        <tr>
                                            <td ><?=$item['id']?></td>
                                            <td ><?=$item['name']?></td>
                                            <td ><?=$item['user_id']?></td>
                                            <td><?=$item['tracking_no']?></td>
                                            <td>₹<?=$item['total_price']?></td>
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