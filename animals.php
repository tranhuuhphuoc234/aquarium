<?php
    include 'header.php';
 ?>
<style>
#images {
    height: 200px;
    width: 212px;
    /* background-color: red; */
    margin-right: 25px;
    margin-bottom: 25px;
    display: inline-block;
}

.fish {
    border: 4px solid transparent;
    border-image: url('images/border-1.png') 4 4 4 repeat;
    /* border-image-outset: 3px; */
}

#images:hover {
    transform: rotate(2deg);
}
</style>
<div>
    <img src="images/panel-header-3.png" alt="" style="width: 100%;">
</div>
<div style="background: url(images/blue-snow.png); height: 1300px; width: 100%;">
    <div class="container-fluid" style="padding-top: 50px;">
        <div class="container col-8 centerPage">
            <div style="margin-bottom: 15px;">
                <span
                    style="font-size: 42px;font-weight: 500;color: #00789a;line-height: 1em;letter-spacing: -.04em; ">Our
                    animals in the Aquarium</span>
            </div>
            <div style="margin-bottom: 30px;">
                <span style="font-size: 23px; font-weight: 500;">Let's find your favorite marine</span>
            </div>
            <div class="list-animals" style="display: block;">
                <div id="images">
                    <img class="fish" src="images/animal1.jpg" alt="">
                    <span
                        style="font-size: 23px;font-weight: 500;color: #00789a;line-height: 1em;letter-spacing: -.04em; ">
                        <a href="">Cá chà bặc</a>
                    </span>
                </div>
                <div id="images">
                    <img class="fish" src="images/animal2.jpg" alt="">
                    <span
                        style="font-size: 23px;font-weight: 500;color: #00789a;line-height: 1em;letter-spacing: -.04em;">
                        <a href="">Cá
                        hề</a>
                    </span>
                </div>
                <div id="images">
                    <img class="fish" src="images/animal3.jpg" alt="">
                    <span
                        style="font-size: 23px;font-weight: 500;line-height: 1em;letter-spacing: -.04em;">
                        <a href="" style="color: #00789a;">Cá
                        đeo hề</a>
                    </span>
                </div>

            </div>
        </div>
    </div>
</div>
<?php
    include 'footer.php';
 ?>