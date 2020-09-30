   <!-- footer my web -->
   <footer class="container-fruid">
        <div class="first-footer">
            <div class="container footer-first">
                <!--About Us-->
                <div class="about-us">
                    <h4>About Us</h4>
                    <p>An option on the Views menu in Windows Explorer that shows the most appropriate details for the
                        file
                        type in a flexible layout rather than only showing the details
                        associated with the column headers in the view.</p>
                </div>
                <!--Link-->
                <div class="link">
                    <h4>Link</h4>
                    <p><a href="">Home</a></p>
                    <p><a href="">Contact</a></p>
                    <p><a href="">Aquarium</a></p>
                    <p><a href="">Blog</a></p>
                </div>
                <!--Contact-->
                <div class="contact">
                    <h4>Contact</h4>
                    <p>Address: 999 HCM Aptech School</p>
                    <p>Phone:0787751485</p>
                    <p>Email:snake@gmail.com</p>
                </div>
            </div>
        </div>

        <div class="footer-second">
            <div class="late">
                <p>
                    <a href="">AncoraThemes</a>
                    © 2020. All Rights Reserved
                    <a href="">Terms of Use</a>
                    and
                    <a href="">Privacy Policy</a>
                </p>
            </div>
        </div>
    </footer>

    <!-- icons bar -->
    <div class="icons-bar">
        <a href=""><i class="fa fa-facebook"></i></a>
        <a href=""><i class="fa fa-twitter"></i></a>
        <a href=""><i class="fa fa-google"></i></a>
        <a href=""><i class="fa fa-youtube"></i></a>
    </div>



    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.icon-bars').click(function() {
            $('.icon-bars').toggleClass('active')
            $('nav').toggleClass('active')
        })
    })
    </script>

    <script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
        scrollFunction()
        scrollsFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("navbar-display").style.top = "0";
        } else {
            document.getElementById("navbar-display").style.top = "-80px";
        }
    }

    function scrollsFunction() {
        var currentScrollPos = window.pageYOffset;
        if (currentScrollPos == 0) {
            document.getElementById("navbar").style.top = "0";
        } else {
            document.getElementById("navbar").style.top = "-80px";
        }
        prevScrollpos = currentScrollPos;
    }
    </script>


</html>