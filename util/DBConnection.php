<?php
    function OpenConnection(){
        try{
            $serverName = "(local)";
            $connectionInfo = array("Database"=>"bankeygame","UID"=>"sa","PWD"=>"123456"); // remember to change database name
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

function Create($item ){
    try{
        $conn = OpenConnection();
        $tableName = get_class($item); // get class name
        $query = "INSERT INTO $tableName (";
        $fields  = get_object_vars($item);
        $class = new ReflectionClass($tableName);
        $properties = $class->getProperties(); // get class properties
        foreach ($properties as $property) {
            // skip inherited properties
            if ($property->getDeclaringClass()->getName() !== $class->getName()) {
              continue;
            }
    
            $classProperties[] = $property->getName();
          }
        
        foreach($classProperties as $columnitem)
        {
            $query .= $columnitem .",";

        }
        $query = substr($query,0,strlen($query)-1);
        $query .= ") VALUES(";
        foreach($fields as $fileditem)
        {
            if (is_string($fileditem))
            {
                $query .= "'$fileditem'".",";
            }
            else
            {
                $query .= $fileditem.",";
            }
        }
        $query = substr($query,0, strlen($query) -1);
        $query .= ")";
        $check = sqlsrv_query($conn,$query);
        if ($check == 0)
        {
            echo "that bai";
        }
        else{
            echo "thanh cong";
        }

    }
    catch (Exception $e)
    {
        echo("Error");
    }
}
function getProductValue($valueName,$productName)
{
    $conn = OpenConnection();
   
    if($valueName == "imgname")
    {
        $query = "SELECT TOP 1 imgname FROM img JOIN product ON product.productid = img.productid WHERE productname='$productName'";

    }
    else
    {
        $query = "SELECT  $valueName FROM product  WHERE productname='$productName'";
    }
    $getImg = sqlsrv_query($conn,$query);
    if($row = sqlsrv_fetch_array($getImg, SQLSRV_FETCH_ASSOC))
    {
        return $row[$valueName];
    }
}
function getSingleProduct($productId)
{
    $conn = OpenConnection();
    $query = "SELECT productname,productprice,productdiscountstatus,productdiscountprice,productstatus,productcontent FROM product WHERE productid = $productId";
    $getProduct = sqlsrv_query($conn,$query);
    while($row = sqlsrv_fetch_array($getProduct, SQLSRV_FETCH_ASSOC))
    {
            $queryGetImg = "SELECT imgname FROM img WHERE productid=$productId";
            $getProductImg = sqlsrv_query($conn,$queryGetImg);
            $imgNames=array();
            while($rowGetImg = sqlsrv_fetch_array($getProductImg,SQLSRV_FETCH_ASSOC))
            {
                array_push($imgNames,$rowGetImg['imgname']);
            }

        $productName = $row['productname'];
        $productPrice = $row['productprice'];
        $productDiscountStatus = $row['productdiscountstatus'];
        $productDiscountPrice = $row['productdiscountprice'];
        $productStatus = $row['productstatus'];
        $productContent = $row['productcontent'];
    
        
        echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="services-breadcrumb">';
        echo '<div class="agile_inner_breadcrumb">';
        echo '<div class="container">';
        echo '<ul class="w3_short">';
        echo '<li>';
        echo '<a href="index.php">Home</a>';
        echo '<i>|</i>';
        echo '</li>';
        echo "<li>$productName</li>";
        echo '</ul>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="banner-bootom-w3-agileits">';
        echo '<div class="container">';
        echo '<div class="row">';
        echo '<!-- //tittle heading -->';
        echo '<div class="col-4 single-right-left ">';
        echo '<div class="grid images_3_of_2">';
        echo"<div class=\"flexslider\">
        <ul class=\"slides\">";
        foreach ($imgNames as $imgName)
        {
            echo 
                "   <li data-thumb=\"uploads/$imgName\">
                        <div class=\"thumb-image\">
                            <img src=\"uploads/$imgName\" data-imagezoom=\"true\" class=\"img-responsive\" alt=\"\">
                        </div>
                    </li>";
        }
        echo '<ul>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="col-8 single-right-left simpleCart_shelfItem ">';
        echo "<h3>$productName</h3>";
        echo '<div class="rating1">';
        echo '<span class="starRating">';
        echo '<input id="rating5" type="radio" name="rating" value="5">';
        echo '<label for="rating5">5</label>';
        echo '<input id="rating4" type="radio" name="rating" value="4">';
        echo '<label for="rating4">4</label>';
        echo '<input id="rating3" type="radio" name="rating" value="3" checked="">';
        echo '<label for="rating3">3</label>';
        echo '<input id="rating2" type="radio" name="rating" value="2">';
        echo '<label for="rating2">2</label>';
        echo '<input id="rating1" type="radio" name="rating" value="1">';
        echo '<label for="rating1">1</label>';
        echo '</span>';
        echo '</div>';
        if($productDiscountStatus == 1)
        {
        echo "<p>
         <span class=\"item_price\">$productDiscountPrice VND</span>;
         <del>$productPrice VND</del>
         </p>";
        }
        else
        {
            echo "<p>
            <span class=\"item_price\">$productPrice VND</span>
            </p>";
        }
        echo '<div class="occasion-cart">';
        echo '<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">';
        echo   		
				"
	            	<form id=\"form$productId\" action=\"\" method=\"post\">
						
                    <input type=\"hidden\" name=\"cmd\" value=\"_cart\" />
                    <input type=\"hidden\" name=\"add\" value=\"1\" />
                    <input type=\"hidden\" name=\"business\" value=\" \" />
                    <input type=\"hidden\" name=\"product_id\" value=\"$productId\" />
                    <input type=\"hidden\" name=\"item_name\" value=\"$productName\" />";
                    if($productDiscountStatus == 0)
                    {
                    echo
                    "<input type=\"hidden\" name=\"amount\" value=\"$productPrice\" />";
                    }
                    else
                    {echo "
                    <input type=\"hidden\" name=\"discount_status\" value=\"$productDiscountStatus\" />";
                    }
                    echo
                    "
                    <input type=\"hidden\" name=\"discount_price\" value=\"$productDiscountPrice\" />
                    <input type=\"hidden\" name=\"product_status\" value=\"$productStatus\" />
                    <input type=\"hidden\" name=\"currency_code\" value=\"VND\" />
                    <input type=\"submit\" name=\"submit\" value=\"Add to cart\" href=\"#myModal\" class=\"button trigger-btn\" data-toggle=\"modal\" />

					</form>";
				
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="clearfix"> </div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<br>';
        echo '<div class="row line">';
        echo '<div>Chi tiết sản phẩm </div>';
        echo '<br>';
        
         $myfile = fopen("uploads/$productContent", "r") or die("Unable to open file!");;
         echo fread($myfile,filesize("uploads/$productContent"));;
         fclose($myfile);;
        
        echo '</div>';
        echo '</div>';
    }
}
function getProduct(){
    $conn = OpenConnection();
	$query = "SELECT DISTINCT TOP 12 product.productid,productname,productprice,productdiscountstatus,productdiscountprice,productstatus FROM product ";
	$getProducts = sqlsrv_query($conn,$query);
	while($row = sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC))
	{
		$productid = $row['productid'];
		$productName = $row['productname'];
		$productPrice = $row['productprice'];
		$productDiscountStatus = $row['productdiscountstatus'];
		$productDiscountPrice = $row['productdiscountprice'];
        $productStatus = $row['productstatus'];
        $queryGetImg ="SELECT TOP 1 imgname FROM img WHERE productid = $productid";
        $getImg = sqlsrv_query($conn,$queryGetImg);
        if ($rowGetImg = sqlsrv_fetch_array($getImg,SQLSRV_FETCH_ASSOC))
        {
            $imgName = $rowGetImg['imgname'];
        }
        

		echo "<div class=\"col-md-3 product-men\">
		<div class=\"men-pro-item simpleCart_shelfItem\">
			<div class=\"men-thumb-item\">
				<img src=\"uploads/$imgName\" alt=\"\">
				<div class=\"men-cart-pro\">
					<div class=\"inner-men-cart-pro\">
						<a id=\"$productid\" href=\"single.php?product_id={$productid}\" class=\"link-product-add-cart product-detail\">Quick View</a>
					</div>
				</div>
				<span class=\"product-new-top\" >New</span>
			</div>
			<div class=\"item-info-product \">
				<h4>
					<a id=\"$productid\" href=\"single.php?product_id={$productid}\">$productName</a>
				</h4>";
				if($productDiscountStatus == 1)
				{
				echo		
				"<div class=\"info-product-price\">
					<span class=\"item_price\">$productDiscountPrice VND</span>
					<del>$productPrice VND</del>
				</div>";
				}
				else
				{
				echo		
				"<div class=\"info-product-price\">
					<span class=\"item_price\">$productPrice VND</span>
				</div>";
				}
		echo   		
				"<div class=\"snipcart-details top_brand_home_details item_add single-item hvr-outline-out\">
					<form id=\"form$productid\" action=\"\" method=\"post\" >
						
							<input type=\"hidden\" name=\"cmd\" value=\"_cart\" />
							<input type=\"hidden\" name=\"add\" value=\"1\" />
							<input type=\"hidden\" name=\"business\" value=\" \" />
							<input type=\"hidden\" name=\"product_id\" value=\"$productid\" />
                            <input type=\"hidden\" name=\"item_name\" value=\"$productName\" />";
                            if($productDiscountStatus == 0)
                            {
                            echo
                            "<input type=\"hidden\" name=\"amount\" value=\"$productPrice\" />";
                            }
                            else
                            {echo "
                            <input type=\"hidden\" name=\"discount_status\" value=\"$productDiscountStatus\" />";
                            }
                            echo
                            "<input type=\"hidden\" name=\"discount_price\" value=\"$productDiscountPrice\" />
							<input type=\"hidden\" name=\"product_status\" value=\"$productStatus\" />
							<input type=\"hidden\" name=\"currency_code\" value=\"VND\" />
							<input type=\"submit\" name=\"submit\" value=\"Add to cart\" href=\"#myModal\" class=\"button trigger-btn\" data-toggle=\"modal\" />
					</form>
				</div>
			</div>
		</div>
	</div>";
	}
}   
 ?>