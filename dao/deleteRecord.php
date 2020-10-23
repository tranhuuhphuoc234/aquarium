<?php
    include_once('..\util\DBConnection.php');
    $columnname = $_POST['columnname'];
    $table = $_POST['table'];
    $value = str_replace(' ', '', $_POST['value']);
    if($table == "images")
    {
      $fishscientificname = $value;
      $value =getId('fish',$value);
      $dir = '../uploads/'.$fishscientificname;
        $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
        $files = new RecursiveIteratorIterator($it,
        RecursiveIteratorIterator::CHILD_FIRST);
            foreach($files as $file) {
                if ($file->isDir()){
                    rmdir($file->getRealPath());
                } else {
                    unlink($file->getRealPath());}
                }
                rmdir($dir);        
                }
    $check = Delete($table,$columnname,$value);
    if ($check == 0 ){
        echo json_encode(false);

    }
    else
    {
        echo json_encode(true);

    }

 ?>