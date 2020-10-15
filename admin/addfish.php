<?php
    include_once("header.php");
    include_once("..\util\DBConnection.php");
    include_once("../dao\includeWithVar.php");
    include_once("../dao/fish.php")
 ?>
<?php
$statusTrue = false;
$statusFalse = false;
$stuatusExist = false; 
if (isset($_POST['submit'])) {
    $fishname = $_POST['fishname'];
    $fishscientificname = $_POST['fishscientificname'];
    $habitat = $_POST['habitat'];
    $diet = $_POST['diet'];
    $status = $_POST['status'];
    $size = $_POST['size'];
    $weight = $_POST['weight'];
    $gestationperiod = $_POST['gestationeriod'];
    $achievableage = $_POST['achievableage'];
    try{
    $locationid = getId("location",$_POST['locationid']);
    } catch(Exception $e)
    {
        includeWithVariables("popup.php",array('title'=>'Failed to Select ','color'=>'#dc3545','content' =>'Please enter a valid location!'));

    }
    try
    {
    $typeid = getId("type",$_POST['typeid']);
    }catch(Exception $e)
    {
        includeWithVariables("popup.php",array('title'=>'Failed to Select ','color'=>'#dc3545','content' =>'Please enter a valid type!'));

    }
    if(strcmp($_POST['fishdetail'],""))
    {
        $fishdetail = $_POST['fishdetail'];
        $j = 0; //Variable for indexing uploaded image 
    
        $target_path = "../uploads/$fishscientificname"; //Declaring Path for uploaded images
           for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array
                $target_path = "../uploads/$fishscientificname";
               $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
               $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
               $file_extension = end($ext); //store extensions in the variable
               if (!file_exists("../uploads/$fishscientificname")) {
                   mkdir("../uploads/$fishscientificname", 0777, true);
               }
         $target_path = $target_path ."/". $fishscientificname.$i . "." . $ext[count($ext) - 1];//set the target path with a new name of image
               $j = $j + 1;//increment the number of uploaded images according to the files in array       
             
          if (($_FILES["file"]["size"][$i] < 1000000) //Approx. 1000mb files can be uploaded.
                       && in_array($file_extension, $validextensions)) {
                   if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder
                   
                        
                   } else {//if file was not moved.
                       includeWithVariables("popup.php",array('title'=>'Failed To upload','color'=>'#dc3545','content' =>'Please check your images again!'));
       
                   }
               } else {//if file size and file type was incorrect.
                   includeWithVariables("popup.php",array('title'=>'Failed To upload','color'=>'#dc3545','content' =>'Please check your images again!'));
                   
       
               }
           }
           $fp = fopen("../uploads/$fishscientificname/$fishscientificname.txt","w");
           if ($fp == true)
           {
               if (fwrite($fp,$fishdetail))
               {
                   $fish = new fish();
                   $fish->setfishname($fishname);
                   $fish->setfishscientificname($fishscientificname);
                   $fish->sethabitat($habitat);
                   $fish->setdiet($diet);
                   $fish->setsize($size);
                   $fish->setweight($weight);
                   $fish->setgestationperiod($gestationperiod);
                   $fish->setachievableage($achievableage);
                   $fish->setlocationid($locationid);
                   $fish->settypeid($typeid);
                   $fish->setstatus($status);
                   $fish->setfishstatus(1);
                   $fish->setfishdetail($fishscientificname.".txt");
                   if(Create($fish))
                   {
                       includeWithVariables("popup.php",array('title'=>'Sucessfully Added','color'=>'#28a745','content' =>$fishscientificname.' has been added to database'));

                   }
                   else
                   {
                       includeWithVariables("popup.php",array('title'=>'Failed To Added','color'=>'#dc3545','content' =>$fishscientificname.' has not been added to database'));

                   }

               }
               else
               {
                   includeWithVariables("popup.php",array('title'=>'Failed To Add','color'=>'#dc3545','content' =>'Please try again later!'));

               }
           }
           else{
               includeWithVariables("popup.php",array('title'=>'Failed To Add','color'=>'#dc3545','content' =>'Please try again later!'));

           }
    }
    else
    {
        includeWithVariables("popup.php",array('title'=>'Failed To Added','color'=>'#dc3545','content' =>'Please enter all information!'));

    }
 
}
?>

<div class="space"></div>
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form enctype="multipart/form-data" action="" method="post">
                    <div class="row">
                        <div class="form-group col">
                            <label for="fishname">Fish's name</label>
                            <input type="fishanem" class="form-control" id="" aria-describedby=""
                                placeholder="Enter fish's name" name="fishname" required>
                        </div>
                        <div class="form-group col">
                            <label for="fishscientificname">Fish's scientific name</label>
                            <input type="fishscientificname" class="form-control" id="" aria-describedby=""
                                placeholder="Enter fish's scientific name" name="fishscientificname" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="type">Type</label>
                            <select class="custom-select" name="typeid">
                                <option selected>Type</option>
                                <?php
                            $typeArray = getSelectedItems("type","typename");
                            foreach($typeArray as $item)
                            {
                                echo  "<option value=\"$item\">$item</option>";
                            }
                         ?>
                            </select>
                        </div>
                        <div class="form-group col">
                            <label for="location">Location</label>
                            <select class="custom-select" name="locationid">
                                <option selected>Location</option>
                                <?php
                            $typeArray = getSelectedItems("location","locationname");
                            foreach($typeArray as $item)
                            {
                                echo  "<option value=\"$item\">$item</option>";
                            }
                         ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="size">Size</label>
                            <input type="number" min="0" type="size" class="form-control" id="" aria-describedby=""
                                placeholder="Enter size (cm)" name="size" required>
                        </div>

                        <div class="form-group col">
                            <label for="weight">Weight</label>
                            <input type="number" min="0" type="weight" class="form-control" id="" aria-describedby=""
                                placeholder="Enter weight (g)" name="weight" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="habitat">Habitat</label>
                            <input type="habitat" class="form-control" id="" aria-describedby=""
                                placeholder="Enter habitat" name="habitat" required>
                        </div>
                        <div class="form-group col">
                            <label for="diet">Diet</label>
                            <input type="diet" class="form-control" id="" aria-describedby="" placeholder="Enter diet"
                                name="diet" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="status">Status</label>
                            <input type="status" class="form-control" id="" aria-describedby=""
                                placeholder="Enter status" name="status" required>
                        </div>
                        <div class="form-group col">
                            <label for="gestationperiod">Gestation Period</label>
                            <input type="gestationeriod" class="form-control" id="" aria-describedby=""
                                placeholder="Enter getstation period" name="gestationeriod" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="achievableage">Achievableage</label>
                        <input type="achievableage" class="form-control" id="" aria-describedby=""
                            placeholder="Enter achievableage" name="achievableage" required>
                    </div>
                    <div class="form-group">
                        <label for="images">Fish Images</label>
                        <div id="filediv"><input name="file[]" type="file" id="file" multiple /></div>
                    </div>
                    <div class="form-group">
                        <label for="fishdetail">Fish Detail</label>
                        <textarea name="fishdetail" id="fishdetail" rows="10" cols="80"> </textarea>
                        <script>
                        CKEDITOR.replace('fishdetail')
                        </script>
                    </div>

                    <div class="center-item"><button name="submit" value="submit" type="submit"
                            class="btn-sm btn-dark button-size">Add</button></div>

                </form>

            </div>
            <div class="col-2"></div>

           
        </div>
    </div>
</div>
<?php
     include_once("footer.php")
  ?>