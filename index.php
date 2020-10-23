<?php
    include 'header.php';
?>
<!-- contens my web-->
<!-- <section>
    <img src="images/shark.jpg" style="width: 1920px; height: 1080px;">
</section> -->
<!-- <style>
    body{
        background-image: url(images/shark.jpg);
    }
</style> -->
<!-- <div style="background-color: red; height: 100px; z-index: 20;">

</div> -->
<style>
.middle {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: transparent;
}

.card {
    cursor: pointer;
    width: 185px;
    height: 160px;
    transform: rotate(2deg);
    border: 0px;
}

.front,
.back {
    width: 100%;
    height: 100%;
    overflow: hidden;
    backface-visibility: hidden;
    position: absolute;
    transition: transform .4s linear;
    box-shadow: 7px 8px 13px 0px;
}

.front {
    transform: perspective(600px) rotateY(0deg);
}

.back {
    transform: perspective(600px) rotateY(-180deg);
}

.card:hover>.front {
    transform: perspective(600px) rotateY(180deg);
}

.card:hover>.back {
    transform: perspective(600px) rotateY(0deg);
}

#margin-card {
    margin-right: 60px;
}

#main {



    margin-top: 100px;
    margin-bottom: 100px;

    border-radius: 15px;
    height: 500px;
    width: 100%;
    /* background: rgba(0, 0, 0, 0.2); */
}

#fish {
    border: 4px solid transparent;
    border-image: url('images/border-1.png') 4 4 4 repeat;
    background-image: url('images/panel-content.jpg');
    border-image-outset: 3px;
    height: 500px;
}

.slidershow {
    display: block;
    width: 100%;
    height: 100%;
    overflow: hidden;
    position: absolute;
}
</style>
<script>
// $(document).ready(function(){
//     $('#btn-click').click(function(){
//         $("#panel-header-1").attr("src","images/panel-header-2.jpg");
//     });
// });
</script>
<div style="height: auto;">
    <!-- panel-header. -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators" style="left: -1288px;">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" style="width: 15px;"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1" style="width: 15px;"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2" style="width: 15px;"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3" style="width: 15px;"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" id="panel-header-1" src="images\panel-header-1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" id="panel-header-2" src="images\panel-header-2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" id="panel-header-3" src="images\panel-header-3.png" alt="Third slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" id="panel-header-4" src="images\panel-header-4.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- main -->
    <div style="background: url(images/blue-snow.png); height: 1300px; width: 100%;">
        <div class="container col-12 centerPage"
            style="background-color: red; display: flex; width: 100%; padding-left: 130px; top: -90px;">
            <!-- Open Time  -->
            <div class="col-2" id="margin-card">
                <div class="card middle">
                    <div class="front"
                        style="background-image: url(images/1.jpg); padding-top: 8px; padding-left: 7px;">
                        <div style="position: absolute;">
                            <img src="images/time_open_front.png" alt="" style="position: absolute; z-index: 2;">
                            <span
                                style="position: absolute; z-index: 3; top: 100px; font-family: Daftbrush; width: 200px; padding-left: 20px; font-size: 25px; color: white;font-style: normal;">
                                Opening Time
                            </span>
                        </div>

                    </div>
                    <div class="back" style="background-image: url(images/1.jpg);">
                        <div class="back-content middle">
                            <span
                                style="top: 109px;left: 100px; font-family: Daftbrush; width: 100%; font-size: 24px; color: white;font-style: normal;">
                                9 AM -
                            </span>
                            <span
                                style="top: 109px;left: 100px; z-index:11; font-family: Daftbrush; width: 200px; padding-left: 36px; font-size: 22px; color: white;font-style: normal;">
                                6 PM
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="col-2" id="margin-card">
                <div class="card middle" style="transform: rotate(-3deg);">
                    <div class="front"
                        style=" background-image: url(images/2.jpg); padding-top: 8px; padding-left: 7px;">
                        <div style="position: absolute;">
                            <img src="images/online-tickets_back.png" alt="" style="position: absolute; z-index: 2;">
                            <span
                                style="position: absolute; z-index: 3; top: 100px; font-family: Daftbrush; width: 200px; padding-left: 49px; font-size: 25px; color: white;font-style: normal;">
                                Tickets
                            </span>
                        </div>
                    </div>
                    <div class="back" style="background-color: green; background-image: url(images/2.jpg);">
                        <div class="back-content middle" style="position: initial;">
                            <div style="position: absolute;">
                                <img src="images/online-tickets_back.png" alt=""
                                    style="position:absolute; width: 166px; height: 166px; z-index: 10; left: 101px; top: 9px;">
                                <span
                                    style="position: absolute;top: 109px;left: 100px; z-index:11; font-family: Daftbrush; width: 200px; padding-left: 36px; font-size: 15px; color: white;font-style: normal;">
                                    <a href="" style="color: white;">Get your Tickets</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Directions -->
            <div class="col-2" id="margin-card">
                <div class="card middle">
                    <div class="front"
                        style="background-color: yellow; background-image: url(images/3.jpg); width: 100%;">

                        <div style="position: absolute;">
                            <img src="images/anfahrt_back.png" alt="" style="position: absolute; z-index: 2;">
                            <span
                                style="position: absolute; z-index: 3; top: 100px; font-family: Daftbrush; width: 200px; padding-left: 36px; font-size: 25px; color: white;font-style: normal;">
                                Directions
                            </span>
                        </div>
                    </div>
                    <div class="back"
                        style="background-color: yellow; background-image: url(images/3.jpg); width: 100%;">
                        <div class="back-content middle" style="position: initial;">
                            <div style="position: absolute;">
                                <img src="images/anfahrt_back.png" alt=""
                                    style="position:absolute; width: 166px; height: 166px; z-index: 10; left: 96px;">
                                <span
                                    style="position: absolute;top: 109px;left: 100px; z-index:11; font-family: Daftbrush; width: 200px; padding-left: 36px; font-size: 15px; color: white;font-style: normal;">
                                    <a href="Directions.php" style="color: white;">Route directions</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 4 -->
            <div class="col-2">
                <div class="card middle" style="transform: rotate(-3deg);">
                    <div class="front" style=" background-image: url(images/4.jpg);">

                    </div>
                    <div class="back" style="background-image: url(images/4.jpg);">
                        <div class="back-content middle">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="container col-8 centerPage" id="main" style="">
            <div class="container" style="display:flex;">
                <!-- main -->
                <div class=" col-10">
                    <span
                        style=" font-size: 42px; font-weight: 500; color: #00789a; line-height: 1em; letter-spacing: -.04em;">
                        Lemon-coloured pufferfish
                    </span>
                    <div class="col-10" style="padding-left: 0px; padding-top: 20px;margin-bottom: 20px;">
                        <span style="font-size: 20px;">
                            The pufferfish family consists of two subfamilies with a total of 26 genera and 190 valid
                            species. The lemon-coloured pufferfish belongs to the arothron genus with 15 species. Its
                            circulation area extends over the Indian Ocean and the Pacific, from the coast of Eastern
                            and Southern Africa to Japan, Easter Island and Panama. They live in coral-rich, shallow
                            areas above the 25-metre mark there.
                        </span>
                    </div>
                    <!-- fish -->
                    <div class="col-10" id="fish" style="height: auto;">
                        <div class="container-fluid" style="padding: 5px; padding-top: 10px;">
                            <img src="images\ca1.jpg" alt="" style="height: 431px; width: 100%; margin-bottom: 20px;">
                            <div style="margin-bottom: 40px;">
                                <span style="font-size: 20px; font-weight: bold; color: white;">CHARACTERISTICS</span>
                            </div>
                            <div class="container" style="display: flex;">
                                <div class="col-6">
                                    <div>
                                        <div class="container">
                                            <span
                                                style="font-size: 18px; font-weight: bold; color: white;">Origin</span>
                                        </div>
                                        <div class="container">
                                            <span
                                                style="font-size: 15px;font-weight: 400; color: white; padding-left: 9px;">Viet
                                                Nam</span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="container">
                                            <span
                                                style="font-size: 18px; font-weight: bold; color: white;">Haibitat</span>
                                        </div>
                                        <div class="container">
                                            <span
                                                style="font-size: 15px;font-weight: 400; color: white; padding-left: 9px;">Coral
                                                reefs</span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="container">
                                            <span style="font-size: 18px; font-weight: bold; color: white;">Diet</span>
                                        </div>
                                        <div class="container">
                                            <span
                                                style="font-size: 15px;font-weight: 400; color: white; padding-left: 9px;">Plankton
                                                and small crustaceans</span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="container">
                                            <span
                                                style="font-size: 18px; font-weight: bold; color: white;">Status</span>
                                        </div>
                                        <div class="container">
                                            <span
                                                style="font-size: 15px;font-weight: 400; color: white; padding-left: 9px;">least
                                                concern</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- right -->
                                <div class="col-6">
                                    <div>
                                        <div class="container">
                                            <span style="font-size: 18px; font-weight: bold; color: white;">Size</span>
                                        </div>
                                        <div class="container">
                                            <span
                                                style="font-size: 15px;font-weight: 400; color: white; padding-left: 9px;">6
                                                to 8 cm</span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="container">
                                            <span
                                                style="font-size: 18px; font-weight: bold; color: white;">Weight</span>
                                        </div>
                                        <div class="container">
                                            <span
                                                style="font-size: 15px;font-weight: 400; color: white; padding-left: 9px;">Unknown</span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="container">
                                            <span style="font-size: 18px; font-weight: bold; color: white;">Brooding
                                                Time</span>
                                        </div>
                                        <div class="container">
                                            <span
                                                style="font-size: 15px;font-weight: 400; color: white; padding-left: 9px;">Larval
                                                stage of the eggs approx. 2–3 weeks, endure brooding care</span>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="container">
                                            <span style="font-size: 18px; font-weight: bold; color: white;">Achievable
                                                age</span>
                                        </div>
                                        <div class="container">
                                            <span
                                                style="font-size: 15px;font-weight: 400; color: white; padding-left: 9px;">Up
                                                to approx. 15 years</span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                    <div>
                        <?php
                            $myfile = fopen("GTAV.txt", "r") or die("Unable to open file!");
                            echo fread($myfile,filesize("GTAV.txt"));
                            fclose($myfile);
                         ?>
                    </div>
                </div>

                <!-- quảng cáo -->
                <!-- <div class="col-2">
                    <img src="images/logo-aquarium-final.png" alt="">
                </div> -->
            </div>
        </div>
    </div>
</div>
<?php
    include 'footer.php';
?>