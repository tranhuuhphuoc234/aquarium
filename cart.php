<?php
    include 'util\DBConnection.php';
    session_start();
?>
<?php
    if (isset($_GET['ticketid'])) {
            $ticketid=$_GET['ticketid'];
            $acction=(isset($_GET['action'])) ? $_GET['action'] : 1;
            
            // echo '<pre>';
            // var_dump($acction);
            // die();
            $quantity=(isset($_GET["quantity"])) ? $_GET["quantity"] : 1;
            $conn=OpenConnection();
            $sql="SELECT * FROM ticket WHERE ticketid=$ticketid";
            $result=sqlsrv_query($conn,$sql);
            $row=sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC);
                if ($row) {
                    $row=[
                        'idtic' => $row['ticketid'],
                        'nametic' => $row['ticketname'],
                        'pricetic' => $row['ticketprice'],
                        'total' => $row['ticketprice'] * $quantity,
                        'quantity' =>$quantity
                    ];
                    if ($acction == 1) {
                        if (isset($_SESSION['cart'][$ticketid])) { 
                            $quantity_new=$_SESSION['cart'][$ticketid]['quantity'] +=$quantity;
                        }else{
                            $_SESSION['cart'][$ticketid]=$row;
                        }
                    }
                    if ($acction == 'delete') {
                        unset($_SESSION['cart'][$ticketid]);
                    }
                    if ($acction == 'update') {
                        $quantity_new=$_SESSION['cart'][$ticketid]['quantity']=$quantity;
                    }
                    header("location:showcart.php");
                }
}

?>
