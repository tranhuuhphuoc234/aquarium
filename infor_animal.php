<?php
include 'header.php';
include 'util\DBConnection.php';
?>

<?php
    $fishid=$_GET['fishid'];
    $conn = OpenConnection();
    $sql = "SELECT DISTINCT TOP 12 * FROM fish where fishname = '$fishid' ";
    $getanimal = sqlsrv_query($conn,$sql);
    $infor = sqlsrv_fetch_array($getanimal,SQLSRV_FETCH_ASSOC);
    // print_r($infor);
?>

<main style="margin-top:12vh;">
    <div class="container" style="margin-bottom:20px;">
        <div class="row">
            <div class="col-sm-9">
                <div class="recommend">
                    <h2><?php echo $infor['fishname']?></h2>
                    <div>
                        <p>Which belongs to a very old family of fish phylogenetically,
                            is one of the largest freshwater fish in the world, reaching a size of over two meters.
                            The giant fish is one of audience's favourite at the Aquarium Berlin.</p>
                    </div>
                </div>
                <div class="featured-image">
                    <div class="image"><img src="images\fish0.jpg" style="width:100%"></div>
                    <div class="featured">
                        <h3 style="margin: 10px 0;">CHARACTERISTICS</h3>
                        <hr style="background:black; height:2px">
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="width:50%;">
                                        <p class="bodytext"><b>Origin</b><br>Indian Ocean, Indo-Pacific</p>
                                        <p><b>Habitat<br></b><?php echo $infor['habitat']?></p>
                                        <p><b>Diet<br></b><?php echo $infor['diet']?></p>
                                        <p><b>Status<br></b><?php echo $infor['status']?></p>
                                    </td>
                                    <td>
                                        <p class="bodytext"><b>Size<br></b><?php echo $infor['size']?></p>
                                        <p><b>Weight</b><br><?php echo $infor['weight']?></p>
                                        <p><b>Brooding/gestation time</b><br><?php echo $infor['gestationperiod']?></p>
                                        <p><b>Achievable age</b><br><?php echo $infor['achievableage']?></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="txt"> <?php
$myfile = fopen("uploads\live-show\oke.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("uploads\live-show\oke.txt"));
// fclose($myfile);
?></div>
                </div>
                <div class="back-page" style="margin:0">
                    <a href="animals.php">Back page animal</a>
                </div>
            </div>
            <div class="col-sm-3">
                <div id="recommend-other" style="margin:20px 0;">
                    <div class="">
                        <div class="">
                            <div class=""><img src="images\fish0.jpg" style="width:300px;
                                    height:300px"></div>
                        </div>
                        <p style="position: absolute;left: 45px;top: 21%;margin:0;" class="bodytext"><a href=""
                                class="">Find out more</a></p>
                    </div>
                </div>
                <div id="recommend-other" style="margin:20px 0;">
                    <div class="">
                        <div class="">
                            <div class=""><img src="images\fish0.jpg" style="width:300px;
                                    height:300px"></div>
                        </div>
                        <p style="position: absolute;left: 45px;top: 46%; margin-top:0;" class="bodytext"><a href=""
                                class="">Find out more</a></p>
                    </div>
                </div>
                <div id="recommend-other" style="margin:20px 0;">
                    <div class="">
                        <div class="">
                            <div class=""><img src="images\fish0.jpg" style="width:300px;
                                    height:300px"></div>
                        </div>
                        <p style="position: absolute;left: 45px;bottom: 26%;" class="bodytext"><a href="" class="">Find
                                out more</a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

<?php
include 'footer.php';
?>