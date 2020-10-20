<?php
    include 'header.php';
    include 'util\DBConnection.php';

?>
<style>
    input{
  border-radius: 10px;
  text-align:center;
  width:10%;
  border:none;
  box-shadow: 0 1px black;
  outline: none;
  margin: 5px;
 
}
button{
    width: 7%;
  border-radius: 10px;
  border:none;
  box-shadow: 0 1px 3px black;
  outline: none;
}
</style>
<?php
if (isset($_SESSION['email'])) {
    
}

$conn=OpenConnection();
    $sql = "SELECT  * from ticket";
    $get = sqlsrv_query($conn,$sql);

?>
<div style="height: auto;">
    <div id="al">
        <img src="images\background.jpg" alt="" style="width: 100%;">
    </div>
    <div style="background: url(images/blue-snow.png); height: 1300px; width: 100%; padding-top: 50px;">
        <div class="container col-8 centerPage">
            <div class=container-fuild>
                <h1>Select ticket</h1>
                <div>

                    <table style="width:100%">
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
                            <td>
                                <div id="field1">
                                    <button type="button" id="sub" class="sub">-</button>
                                    <input type="number" id="1" value="1" min="1" max="20" data-tic="<?=$ticketid?>" />
                                    <button type="button" id="add" class="add">+</button>
                                </div>
                            </td>
                            <td><a href="#" onclick="forwardProduct(event)">Choose</a></td>
                        </tr>
                        <?php
             }
            ?>
                    </table>
                    <script>
                    function forwardProduct(e) {
                        e.preventDefault();
                        var itemTarget = e.target;
                        var parentItem = itemTarget.parentElement.parentElement;
                        var number = parentItem.getElementsByTagName("input")[0];
                        var valNumber = number.value;
                        var ticketid = number.dataset.tic;
                        window.location.href = "cart.php?ticketid=" + ticketid + "&quantity=" + valNumber;
                    }
                    </script>
                </div>
            </div>
        </div>

    </div>

    <script>
    $('.add').click(function() {
        if ($(this).prev().val()<20) {
            $(this).prev().val(+$(this).prev().val() + 1);
        }
    });
    $('.sub').click(function() {
        if ($(this).next().val() > 1) {
            if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
        }
    });
    </script>


    <?php
    include 'footer.php';
?>