<?php
include 'header.php';
include 'util\DBConnection.php';
session_start(); 
    if (isset($_SESSION['mail'])) {
        $email=$_SESSION['mail'];
        $id=$_SESSION['idacc'];
    }else{
        header("location:model\LoginForm.php");
    }

?>
<div style="height: auto;">
    <div id="al">
        <img src="images\background.jpg" alt="" style="width: 100%;">
    </div>
    <div style="background: url(images/blue-snow.png); height: 1300px; width: 100%; padding-top: 50px;">
        <div class="container col-8 centerPage">
            <div class="container">
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
                // echo '<pre>';
                // print_r($cart);
                // die();
                $total=0;
            
                foreach ($cart as $key => $value){
                ?>

                    <tr>
                        <td><?php echo $key++?></td>
                        <td>
                            <div id='nametic'><?php echo $value['nametic']?></div>
                        </td>
                        <td>
                            <form action="cart.php">
                                <input type="hidden" name="ticketid" value="<?php echo $value['idtic']?>">
                                <input type="hidden" name="action" value="update">
                                <input type="number" name="quantity" value="<?php echo $value['quantity']?>" min="1">
                                <button type="submit" id="add" class="add"><i class="fas fa-edit"></i></button>
                            </form>
                        </td>
                        <td><?php echo $value['pricetic']?>$</td>
                        <td><?php echo $total_value=$value['quantity'] * $value['pricetic']?>$</td>
                        <td><a href="cart.php?ticketid=<?php echo $value['idtic']?>&action=delete"><i
                                    class="fas fa-trash-alt"></i></a></td>
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
            <!--Infor user -->
            <div class="container" style="margin-top:20px">
                <form action="" method="post">
                    <div>
                        <h1>Infor User</h1>
                        <hr>
                        <?php
                            if (isset($_POST['btnOrder'])) {
                                $date_curent= date("Y-m-d H:i:s");
                                $totals=0;
                                $calendar=$_POST['calendar'];
                                $cars=$_POST['cars'];
                                $message=$_POST['message'];
                                foreach ($cart as $key => $value) {
                                    $total_value=$value['quantity'] * $value['pricetic'];
                                    $nametic=$value['nametic'];
                                    $quantity=$value['quantity'];

                                    $totals=$totals +  $total_value;
                                }
                               
                                $conn=OpenConnection();
                                $sql_insert="INSERT INTO orders(accountid,price,date) values($id,$totals,'$date_curent'); SELECT SCOPE_IDENTITY()";
                                $result=sqlsrv_query($conn,$sql_insert);
                                sqlsrv_next_result($result);
                                sqlsrv_fetch($result);
                                $idorder=sqlsrv_get_field($result,0);
                                foreach ($cart as $key => $value) {
                                    $idtic=$value['idtic'];
                                    $quantity=$value['quantity'];
                                    $query="INSERT INTO orderdetail(orderid,ticketid,quantity,ordertime,message,times) values($idorder,$idtic,$quantity,'$calendar','$message','$cars')";
                                    $result=sqlsrv_query($conn,$query);
                                }
                               
                                
                            }
                        ?>

                        <div>
                            <div class="form-group">
                                <label for="">Full Name</label>
                                <input type="text" class="form-control" id="" name="name-infor" value="">

                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" id="" name="email-infor" value="<?= $email?>">
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="phone" class="form-control" id="" name="phone-infor" value="">
                            </div>
                        </div>
                        <hr>


                    </div>
                    <hr>
                    <div>
                        <label>Calendar :</label>
                        <input type="date" name="calendar">
                    </div>
                    <div>
                        <label for="cars">Chosse Time:</label>
                        <select name="cars" id="cars">
                            <option value="8:00 AM"> 8:00 AM</option>
                            <option value="10:00 AM"> 10:00 AM</option>
                            <option value="13:00 PM">13:00 PM</option>
                            <option value="17:00 PM">17:00 PM</option>
                        </select>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="message"
                            rows="3"></textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" style="width:100%" value="Order"
                            name="btnOrder">Order</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
    <?php
include 'footer.php';
?>