 <?php
    $fishscientificname = $_POST['fish_scientific_name'];
    $rawpath = ('../uploads/'.$fishscientificname);
    $path = str_replace(' ', '', $rawpath);
    if ( is_dir( $path ) ) {
        $files = array_diff(scandir($path), array('.', '..'));
        echo json_encode(count($files));     
    }
    else
    {
        echo json_encode(0);
    }
   
 ?>;