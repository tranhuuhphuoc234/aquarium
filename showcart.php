<?php
include 'header.php';
session_start();
// $cart=(isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];  

    // echo '<pre>';
    // print_r($cart);
    // die();
?>
<div class="container" style="margin-top:10vh">
    <table class="table-cart" style="width:100%; border-collapse: collapse;">
        <tr>
            <th>STT</th>
            <th>Name Tickets</th>
            <th>Quantity</th>
            <th>Ticket Price</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        <?php
            if (isset($_SESSION['cart'])) {
                $cart=$_SESSION['cart'];
                $total=0;
            
         foreach ($cart as $key => $value){
        ?>
            
        <tr>
            <td><?php echo $key++?></td>
            <td><?php echo $value['nametic']?></td>
            <td><?php echo $value['quantity']?></td>
            <td><?php echo $value['pricetic']?>$</td>
            <td><?php echo $total_value=$value['quantity'] * $value['pricetic']?>$</td>
            <td><a href="cart.php?ticketid=<?php echo $value['idtic']?>&action=delete">Delete</a></td>
        </tr>
        <?php
            $total=$total +  $total_value;
         }
        ?>
        <tr>
            <!-- <td colspan="3" style="align:right;"></td> -->
            <td colspan="6" style="text-align:center;">Total : <?php echo $total?>$</td>
        </tr>
        <?php
            }        
        ?>
    </table>
</div>

<?php
include 'footer.php';
?>