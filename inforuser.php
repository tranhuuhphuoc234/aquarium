<?php
    session_start();
    include 'header.php';
    include 'util\DBConnection.php';
   
?>
<?php
    if (isset($_SESSION['email'])) {
        // $name=$_SESSION['fullname'];
        // $email=$_SESSION['email'];
        // $phone=$_SESSION['phone'];
        
    }
?>
<div class="container" style="margin-top:10vh">
    <form action="cart.php" method="post">
        <div>
            <h1>Infor User</h1>
            <hr>

            <div>
                <div class="form-group">
                    <label for="">Full Name</label>
                    <input type="text" class="form-control" id="" name="name-infor" value="<?=$_SESSION['name']?>">

                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" id="" name="email-infor" value="<?=$_SESSION['mail']?>">
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="phone" class="form-control" id="" name="phone-infor" value="<?=$_SESSION['phone']?>">
                </div>
            </div>
            <hr>


        </div>
        <hr>
        <div>
            <label>Calendar :</label>
            <input type="date" name="calendar">
        </div>
        <hr>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" style="width:100%" value="Next" name="btnNext"><a href="buyticket.php">Next</a></button>
        </div>
    </form>

</div>
<?php
    include 'footer.php';
?>