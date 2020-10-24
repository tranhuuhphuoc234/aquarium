<?php
    include_once("header.php");
    include_once("..\util\DBConnection.php");
    include_once("../dao\includeWithVar.php");
    include_once("../dao/event.php")
 ?>
<?php
     if(isset($_POST["submit"]))
     {
         if(isset($_POST["event"]))
        {
           
        $eventname = $_POST["event"];
        $eventdetail = $_POST["eventdetail"];
        $eventtime = $_POST['time'];
        
        if(!checkExist("event","eventname",$eventname))
        {
        $event = new event();
        $event -> seteventname($eventname);
        $event -> seteventdetail($eventdetail);
        $event -> seteventtime($eventtime);
        $event -> seteventstatus(0);
        if (!file_exists("../uploads/$eventname")) {
            mkdir("../uploads/$eventname", 0777, true);
        }
        $j = 0; //Variable for indexing uploaded image 
            $target_path = "../uploads/$eventname"; //Declaring Path for uploaded images
            for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array
                 $target_path = "../uploads/$eventname";
                $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
                $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
                $file_extension = end($ext); //store extensions in the variable
              
          $target_path = $target_path ."/". $eventname. "." . $ext[count($ext) - 1];//set the target path with a new name of image
                $j = $j + 1;//increment the number of uploaded images according to the files in array       
              
           if (($_FILES["file"]["size"][$i] < 1000000) //Approx. 1000mb files can be uploaded.
                        && in_array($file_extension, $validextensions)) {
                    if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder
                   
                     $event->seteventimg($eventname+"."+$ext[count($ext)-1]);
                   
                     if (Create($event))
                     {
                        includeWithVariables("popup.php",array('title'=>'Sucessfully Added','color'=>'#28a745','content' =>$eventname.' has been added to database'));

                     }
 
                         
                    } else {//if file was not moved.
                        includeWithVariables("popup.php",array('title'=>'Failed To upload','color'=>'#dc3545','content' =>'Please check your images again!'));
        
                    }
                } else {//if file size and file type was incorrect.
                    includeWithVariables("popup.php",array('title'=>'Failed To upload','color'=>'#dc3545','content' =>'Please check your images again!'));
                    
        
                }

        }
       
    }
    else{
        includeWithVariables("popup.php",array('title'=>'Failed to Add ','color'=>'#dc3545','content' =>'Event name has already existed'));

    }
    }
    }
?>
<div class="space"></div>
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <form enctype="multipart/form-data" action="" method="post">
                    <div class="form-group">
                        <label for="event">Event</label>
                        <input type="Event" class="form-control" id="" aria-describedby=""
                            placeholder="Enter event name" name="event" required>
                    </div>
                    <div class="form-group ">
                        <label for="event">Event Detail</label>
                        <textarea type="eventdetail" class="form-control" id="" aria-describedby=""
                            placeholder="Enter event detail" name="eventdetail" required></textarea>
                    </div>
                    <div class="form-group ">
                        <label for="time">Time</label>
                        <select class="custom-select" name="time">
                            <option>8:00</option>
                            <option>10:00</option>
                            <option>12:00</option>
                            <option>14:00</option>
                            <option>16:00</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="images">Event Images</label>
                        <div id="filediv"><input name="file[]" type="file" id="file" /></div>
                        <div class="slideshow-container" id="preview-img">

                        </div>
                    </div>
                    <div class="center-item"><button name="submit" value="submit" type="submit"
                            class="btn-sm btn-dark button-size">Add</button></div>

                </form>

            </div>
            <div class="col-4"></div>

            </form>
        </div>
    </div>
</div>
<script src="..\admin\plugins\uploadimage\script.js"></script>

<?php
    include_once("footer.php");
 ?>