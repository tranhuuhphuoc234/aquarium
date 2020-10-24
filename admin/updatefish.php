<?php
include_once('..\util\DBConnection.php');
include_once("..\util\DBConnection.php");
include_once("..\dao\includeWithVar.php");
include_once("../dao/fish.php");
include_once("../dao/images.php");

        $fishscientificname = $_REQUEST['fishscientificname'];
         $j = 0; //Variable for indexing uploaded image 
         $target_path = "../uploads/$fishscientificname"; //Declaring Path for uploaded images
         $fishid = getId('fish',$fishscientificname);
         if(count($_FILES['file']['name'])>0) //check if folder already exists
         {
            if (file_exists("../uploads/$fishscientificname")) {
                Delete("images","fishid",$fishid);
                        $it = new RecursiveDirectoryIterator($target_path, RecursiveDirectoryIterator::SKIP_DOTS);
                        $files = new RecursiveIteratorIterator($it,
                        RecursiveIteratorIterator::CHILD_FIRST);
                        foreach($files as $file) {
                     if ($file->isDir()){
                         rmdir($file->getRealPath());
                    
                     } else {
                         unlink($file->getRealPath());}
                  
                     }
            }
            else
            {
                mkdir("../uploads/$fishscientificname", 0777, true);
            }
          
       
        }
    
         for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array
              $target_path = "../uploads/$fishscientificname";
              
             $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
             $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
             $file_extension = end($ext); //store extensions in the variable
           
       $target_path = $target_path ."/". $fishscientificname.$i . "." . $ext[count($ext) - 1];//set the target path with a new name of image
             $j = $j + 1;//increment the number of uploaded images according to the files in array       
           
        if (($_FILES["file"]["size"][$i] < 1000000) //Approx. 1000mb files can be uploaded.
                     && in_array($file_extension, $validextensions)) {
                 if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder
                  $image = new images();
                  $image->setimagename($fishscientificname.$i);
                  $image->setfishid($fishid);
                  if(Create($image))
                  {
                    
                   
                
                  }
    
                      
                 } else {//if file was not moved.
                    
                     includeWithVariables("popup.php",array('title'=>'Failed To upload','color'=>'#dc3545','content' =>'Please check your images again!'));
     
                 }
             } else {//if file size and file type was incorrect.
                 includeWithVariables("popup.php",array('title'=>'Failed To upload','color'=>'#dc3545','content' =>'Please check your images again!'));
                 
             }
            }
        
                $fishname = $_POST['fishname']; 
                    $habitat = $_POST['habitat'];
                    $diet = $_POST['diet'];
                    $status = $_POST['status'];
                    $size = $_POST['size'];
                    $weight = $_POST['weight'];
                    $gestationperiod = $_POST['gestationperiod'];
                    $achievableage = $_POST['achievableage'];
                    $locationid = getId("location",$_POST['locationid']);
                    $typeid = getId("type",$_POST['typeid']);
            
                        $fishdetail = $_POST['fishdetail'];
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
                                if(Update($fish,$fishid,'fishid'));
                                {
                                  
                                     
                                       
                                    }
                                    includeWithVariables("popup.php",array('title'=>'Sucessfully Added','color'=>'#28a745','content' =>$fishscientificname.' has been updated '));
                
                                }
                                else
                                {
                                    includeWithVariables("popup.php",array('title'=>'Failed To Added','color'=>'#dc3545','content' =>$fishscientificname.' has not been updated '));
                
                                }
                
                            }
                            else
                            {
                                includeWithVariables("popup.php",array('title'=>'Failed To Add','color'=>'#dc3545','content' =>'Please try again later!'));
                
                            }
            
          
 ?>