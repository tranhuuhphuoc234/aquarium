<?php
    include 'header.php';
    include 'util\DBConnection.php';
?>
<?php
 $conn = OpenConnection();
 $sql = "SELECT DISTINCT TOP 12 * FROM fish ";
 $getanimal = sqlsrv_query($conn,$sql);

?>
<div class="container" style="margin-top:10vh">
    <!-- div 1 -->
    <div id="c5997" class="csc-default intro-copy">
        <div class="csc-header csc-header-n1">
            <h1 class="csc-firstHeader">Our animals in the Aquarium Berlin</h1>
        </div>
        <p class="bodytext">Marine life across the alphabet from anemonefish to turtles – find your favourite species
            with us at the Aquarium Berlin!</p>
    </div>
    <!-- div 2 -->
    <div>
    <?php
             while($row = sqlsrv_fetch_array($getanimal, SQLSRV_FETCH_ASSOC))
             {
                $fishid=$row['fishid'];
                 $fishname=$row['fishname'];
                 if ($fishid) {
                    $query="SELECT * From images i join fish f on i.fishid=f.fishid where fishid=$fishid";
                    $get_namefish = sqlsrv_query($conn,$sql);
                    $row=sqlsrv_fetch_array($get_namefish,SQLSRV_FETCH_ASSOC);
                    if ($row) {
                        $namefish=$row['fishscientificname'];
                    }else{
                        echo 'ngu';
                    }
                    
                 }
                 ?>
        
            <!-- first -->
            <div id="first-part " style="display:inline-block;" class="part-general ">
                <div class="above" id="general">
                    <div class="imagewrap" id="general">
                        <div class="center-outer" id="general">
                            <div class="center-inner" id="general">
                                <div id="general" class="image-part-last"><img src="uploads\$namefish"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="csc-header csc-header-n1">
                    <h1 class="csc-firstHeader"><a href="infor_animal.php?fishid=<?php echo $fishname ?>">
                            <?php echo $fishname ?> </a></h1>
                </div>
            </div>
        <?php
             }
     ?>
    </div>
</div>
<?php
    include 'footer.php';
?>