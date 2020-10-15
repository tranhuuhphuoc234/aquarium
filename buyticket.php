<?php
    include 'header.php';
    include 'util\DBConnection.php';

?>
<?php
if (isset($_SESSION['email'])) {
    
}

$conn=OpenConnection();
    $sql = "SELECT * from ticket";
    $get = sqlsrv_query($conn,$sql);

?>

<div>
    <h1>Select ticket</h1>
    <div>
        
            <table>
                <tr>
                    <th>Name ticket</th>
                    <th>Price</th>
                    <th>quangtity</th>
                    <th>choose</th>

                </tr>
                <?php
             while($row = sqlsrv_fetch_array($get, SQLSRV_FETCH_ASSOC))
             {  
                $ticketid=$row['ticketid'];
                $ticketname=$row['ticketname'];
                $ticketprice=$row['ticketprice']; 
                 ?>
                <tr>
                    <td><?php echo $ticketname ?></td>
                    <td><?php echo $ticketprice?>$</td>
                    <td><input type="number" id="number" value="1" data-tic="<?=$ticketid?>"></td>
                    <td><a href="#" onclick="forwardProduct(event)">Choose</a></td>
                </tr>
                <?php
             }
            ?>
            </table>
        <script>
        function forwardProduct(e){
            e.preventDefault();
            var itemTarget=e.target;
            var parentItem=itemTarget.parentElement.parentElement;
            var number=parentItem.getElementsByTagName("input")[0];
            var valNumber=number.value;
            var ticketid=number.dataset.tic;
            window.location.href = "cart.php?ticketid="+ticketid+"&quantity="+valNumber;
        }
        </script>
    </div>
</div>


<?php
    include 'footer.php';
?>