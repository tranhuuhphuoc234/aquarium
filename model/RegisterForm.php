<!doctype html>
<htmllang="en">

    <head>
        <meta charset="utf-8">
        <title>The HTML5 Herald </title>
        <meta name="description" content="The HTML5 Herald">
        <meta name="author" content="SitePoint">

        <link rel="stylesheet" href="/aquarium/css/bootstrap.css">
        <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
        <!-- <link rel="stylesheet" href="..\css\mysite.css"> -->
    </head>
    <style>
    body {
        background: url('../images/shark.jpg');
        background-repeat: no-repeat;
        background-size: 100%;
    }

    #background-form {
        background: rgba(0, 0, 0, 0.5);
        border-radius: 15px;
        height: 600px;
        text-align: center;
        padding-top: 43px;
    }

    #line-error {
        /* background-color: red; */
        display: block;
    }

    #line-error>#er-email #er-phone {
        display: block;
        /* background-color: black; */
    }
    </style>

    <body>
        <script>
        //check phone number
        function checkphonenumber(phonenumber) {
            var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
            if (phonenumber.match(phoneno)) {
                return true;
            } else {
                return false;
            }
        }
        $(document).ready(function() {
            $('#login').click(function() {
                //reset form
                $('#er-pass').remove();
                $('#er-enterpass').remove();
                $('#result-email').css("display", "none");
                $('#result-phone').html("");
                $('#er-phone').html("");

                var email = $('#emailorusername');
                var pass = $('#pass');
                var enterpass = $('#enter-pass');
                var phone = $('#phone');
                $.post("register.php", {
                    email: email.val(),
                    pass: pass.val(),
                    enterpass: enterpass.val(),
                    phone: phone.val()
                }, function(data) {
                    if (email.val() == "") {
                        $("#line-email").append(data);
                    } else {
                        if (pass.val() == "") {
                            $("#line-pass").append(data);
                        } else {
                            if (enterpass.val() == "") {
                                $('#line-enterpass').append(data);
                            } else {
                                if (phone.val() == "") {
                                    $('#line-phone').append(data);
                                } else {
                                    var checkphone = $('#phone').val();
                                    if(checkphonenumber(checkphone)){
                                        $('#result').html(data);
                                    }else{
                                        var er = "<span style='color: red; font-size: 13px; font-weight: bold; display: block; position:absolute; left:103px;' id='result'>Phone number incorrect !!</span>";
                                        $('#result').html(er);
                                    }
                                }
                            }
                        }
                    }

                })
            });
            $('#back').click(function(){
                window.location.href = "LoginForm.php";
            });
        });
        </script>
        <div class="container-fluid firts" style="padding-top: 100px;">
            <div class="container col-4 centerPage" id="background-form">
                <span style="text-align:center; color: white;">
                    <h3>
                        Register
                    </h3>
                </span>
                <br>
                <div class="container col-11 centerPage">
                    <div id="line-email">
                        <input type="email" class="form-control" id="emailorusername" value placeholder="Email"
                            name="emailorusername">
                    </div>
                    <br>
                    <div id="line-pass">
                        <input type="password" class="form-control" id="pass" value placeholder="Password">
                    </div>
                    <br>
                    <div id="ketqua">

                    </div>
                    <div id="line-enterpass">
                        <input type="password" class="form-control" id="enter-pass" value
                            placeholder="re-enter password">
                    </div>
                    <br>
                    <div id="line-phone">
                        <input type="text" aria-label="phone" class="form-control" id="phone" value
                            placeholder="Phone Number">
                    </div>
                    <br>
                    <div id="line-error" style="position: absolute; width: 100%;">
                        <div id="result" style="position: absolute; width: 95%; text-align:center;">
                           
                        </div>
                    </div>
                    <br>

                    <div class="form-group" style="text-align: center;">
                        <button type="submit" class="btn btn-primary" id="login"
                            style="width: 80%; font-weight: bold;">Register</button>
                    </div>
                    <div class="form-group" style="text-align: center;">
                        <button type="button" class="btn btn-warning" id="back"
                            style="width: 80%; font-weight: bold;">Back to login page</button>
                    </div>
                </div>
            </div>
        </div>
        <script>

        </script>
    </body>

    </html>