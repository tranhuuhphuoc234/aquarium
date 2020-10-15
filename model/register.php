<?php
function OpenConnection(){
    try{
        $serverName = "(local)";
        $connectionInfo = array("Database"=>"AQUARIUM","UID"=>"sa","PWD"=>"123456"); // remember to change database name
        $conn = sqlsrv_connect($serverName, $connectionInfo);
        if ($conn)
        {
            //echo "Connection established";
            return $conn;
        }
        else
        {
            echo "Connection could not be established.</br>";
            die(print_r(sqlsrv_errors(),true));
        }

    }catch(Exception $e)
    {
        echo "Error";
    }return null;
}
    
    //check email
    if(empty($email = $_POST['email'])){
        echo ("<span style='float: left; color: red; font-size: 13px; font-weight: bold; display: block;'
        id='er-email'>Please enter your email !!</span>");
    }else{
        //check pass
        if(empty($pass = $_POST['pass'])){
            echo("<span style='float: left; color: red; font-size: 13px; font-weight: bold; display: block;'
            id='er-pass'>Please enter your password !!</span>");
        }else{
            //check re-enter password
            if(empty($enterpass = $_POST['enterpass'])){
                echo ("<span style='float: left; color: red; font-size: 13px; font-weight: bold; display: block;'
                id='er-enterpass'>re-enter password incorrect !!</span>");
            }else{
                //check phone number
                if(empty($phone = $_POST['phone'])){
                    echo ("<span style='float: left; color: red; font-size: 13px; font-weight: bold; display: block;'
                    id='er-phone'>Please enter your phone !!</span>");
                }else{

                    $query = "select * from account where email = '$email'";
                    $conn = OpenConnection();
                    $getUser = sqlsrv_query($conn, $query);
                    //check if email does not exist
                    if(empty($row = sqlsrv_fetch_array($getUser, SQLSRV_FETCH_ASSOC))){
                        //Check password coincides with re-enter password
                        if($enterpass == $pass){
                            $phoneData = "select * from account where phone = '$phone'";
                            $checkPhone = sqlsrv_query($conn, $phoneData);
                            //check if phone number does not exist
                            if(empty($row = sqlsrv_fetch_array($checkPhone, SQLSRV_FETCH_ASSOC))){
                                $pass = md5($pass);
                                $insert = "INSERT INTO account VALUES('$email','$pass','',null,'','$phone')";
                                //check if insert success
                                if($ex = sqlsrv_query($conn, $insert)){
                                    $msg = "<script>
                                        alert('Insert success');
                                        $(document).ready(function(){
                                            $('#emailorusername').val('');
                                            $('#pass').val('');
                                            $('#enter-pass').val('');
                                            $('#phone').val('');
                                        });
                                    </script>
                                    ";
                                    
                                }else{
                                    $msg = "<script>
                                        alert('insert failed');
                                    </script>";
                                }
                            }else{
                                $msg = "<span
                                style='color: red; font-size: 13px; font-weight: bold; display: block; position:absolute; left:130px;'
                                id='result'>Phone already exits !!</span>";
                            }
                            
                        }else{
                            $msg = "<span
                        style='color: red; font-size: 13px; font-weight: bold; display: block; position:absolute; left:103px;'
                        id='result'>Plese enter the password again !!</span>";
                        }
                        
                    }else{
                        $msg = "<span
                        style='color: red; font-size: 13px; font-weight: bold; display: block; position:absolute; left:130px;'
                        id='result'>Email already exits !!</span>";
                    }
                }
            } 
        }
    }
    if(isset($msg)){
        echo $msg;
    }
    
    
    
 ?>