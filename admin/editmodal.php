<?php
include_once("..\util\DBConnection.php");
    switch ($tablename){
        case 'fish':
            echo "<div id=\"myModal\" class=\"modal fade\" role=\"dialog\">\n";
            echo "        <div class=\"modal-dialog modal-lg\">\n";
            echo "\n";
            echo "           \n";
            echo "            <div class=\"modal-content\">\n";
            echo "                <div class=\"modal-body\">\n";
            echo "                    <div class=\"container col-md-12\">\n";
            echo "                        <div class=\"row\">\n";
            echo "                            <div class=\"col-md-2\"></div>\n";
            echo "                            <div class=\"col-md-8\">\n";
            echo "                                <form enctype=\"multipart/form-data\" action=\"\" method=\"post\">\n";
            echo "                                    <div style=\"height:30px\"></div>\n";
            echo "                                    <div class=\"row\">\n";
            echo "                                        <div class=\"form-group col-md-6\">\n";
            echo "                                            <label for=\"fishname\">Fish's name</label>\n";
            echo "                                            <input type=\"fishanem\" class=\"form-control\" id=\"\" aria-describedby=\"\"\n";
            echo "                                                placeholder=\"Enter fish's name\" name=\"fishname\" required>\n";
            echo "                                        </div>\n";
            echo "                                        <div class=\"form-group col-md-6\">\n";
            echo "                                            <label for=\"fishscientificname\">Fish's scientific name</label>\n";
            echo "                                            <input type=\"fishscientificname\" class=\"form-control\" id=\"\"\n";
            echo "                                                aria-describedby=\"\" placeholder=\"Enter fish's scientific name\"\n";
            echo "                                                name=\"fishscientificname\" required>\n";
            echo "                                        </div>\n";
            echo "                                    </div>\n";
            echo "                                    <div class=\"row\">\n";
            echo "                                        <div class=\"form-group col-md-6\">\n";
            echo "                                            <label for=\"type\">Type</label>\n";
            echo "                                            <select class=\"form-control\" name=\"typeid\">\n";
            echo "                                                <option selected>Type</option>\n";

                                       $typeArray = getSelectedItems("type","typename");
                                        foreach($typeArray as $item)
                                        {
            echo "                                  <option value=\"$item\">$item</option>";
                                        };

            echo "                                            </select>\n";
            echo "                                        </div>\n";
            echo "                                        <div class=\"form-group col-md-6\">\n";
            echo "                                            <label for=\"location\">Location</label>\n";
            echo "                                            <select class=\"form-control\" name=\"locationid\">\n";
            echo "                                                <option selected>Location</option>\n";

                                      $typeArray = getSelectedItems("location","locationname");
                                        foreach($typeArray as $item)
                                        {
            echo "                             <option value=\"$item\">$item</option>";
                                        }

            echo "                                            </select>\n";
            echo "                                        </div>\n";
            echo "                                    </div>\n";
            echo "                                    <div class=\"row\">\n";
            echo "                                        <div class=\"form-group col-md-6\">\n";
            echo "                                            <label for=\"size\">Size</label>\n";
            echo "                                            <input type=\"number\" min=\"0\" type=\"size\" class=\"form-control\" id=\"\"\n";
            echo "                                                aria-describedby=\"\" placeholder=\"Enter size (cm)\" name=\"size\" required>\n";
            echo "                                        </div>\n";
            echo "\n";
            echo "                                        <div class=\"form-group col-md-6\">\n";
            echo "                                            <label for=\"weight\">Weight</label>\n";
            echo "                                            <input type=\"number\" min=\"0\" type=\"weight\" class=\"form-control\" id=\"\"\n";
            echo "                                                aria-describedby=\"\" placeholder=\"Enter weight (g)\" name=\"weight\"\n";
            echo "                                                required>\n";
            echo "                                        </div>\n";
            echo "                                    </div>\n";
            echo "                                    <div class=\"row\">\n";
            echo "                                        <div class=\"form-group col-md-6\">\n";
            echo "                                            <label for=\"habitat\">Habitat</label>\n";
            echo "                                            <input type=\"habitat\" class=\"form-control\" id=\"\" aria-describedby=\"\"\n";
            echo "                                                placeholder=\"Enter habitat\" name=\"habitat\" required>\n";
            echo "                                        </div>\n";
            echo "                                        <div class=\"form-group col-md-6\">\n";
            echo "                                            <label for=\"diet\">Diet</label>\n";
            echo "                                            <input type=\"diet\" class=\"form-control\" id=\"\" aria-describedby=\"\"\n";
            echo "                                                placeholder=\"Enter diet\" name=\"diet\" required>\n";
            echo "                                        </div>\n";
            echo "                                    </div>\n";
            echo "                                    <div class=\"row\">\n";
            echo "                                        <div class=\"form-group col-md-6\">\n";
            echo "                                            <label for=\"status\">Status</label>\n";
            echo "                                            <input type=\"status\" class=\"form-control\" id=\"\" aria-describedby=\"\"\n";
            echo "                                                placeholder=\"Enter status\" name=\"status\" required>\n";
            echo "                                        </div>\n";
            echo "                                        <div class=\"form-group col-md-6\">\n";
            echo "                                            <label for=\"gestationperiod\">Gestation Period</label>\n";
            echo "                                            <input type=\"gestationeriod\" class=\"form-control\" id=\"\" aria-describedby=\"\"\n";
            echo "                                                placeholder=\"Enter getstation period\" name=\"gestationeriod\" required>\n";
            echo "                                        </div>\n";
            echo "                                    </div>\n";
            echo "                                    <div class=\"form-group\">\n";
            echo "                                        <label for=\"achievableage\">Achievableage</label>\n";
            echo "                                        <input type=\"achievableage\" class=\"form-control\" id=\"\" aria-describedby=\"\"\n";
            echo "                                            placeholder=\"Enter achievableage\" name=\"achievableage\" required>\n";
            echo "                                    </div>\n";
            echo "                                    <div class=\"form-group\">\n";
            echo "                                        <label for=\"images\">Fish Images</label>\n";
            echo "                                        <div id=\"filediv\"><input name=\"file[]\" type=\"file\" id=\"file\" multiple /></div>\n";
            echo "                                    </div>\n";
            echo "                                    <div class=\"form-group\">\n";
            echo "                                        <label for=\"fishdetail\">Fish Detail</label>\n";
            echo "                                        <textarea name=\"fishdetail\" id=\"fishdetail\" rows=\"10\" cols=\"80\"> </textarea>\n";
            echo "                                        <script>\n";
            echo "                                        CKEDITOR.replace('fishdetail')\n";
            echo "                                        </script>\n";
            echo "                                    </div>\n";
            echo "\n";
            echo "                                    <div class=\"center-item\"><button name=\"submit\" value=\"submit\" type=\"submit\"\n";
            echo "                                            class=\"btn-sm btn-dark button-size\">Add</button></div>\n";
            echo "\n";
            echo "                                </form>\n";
            echo "\n";
            echo "                            </div>\n";
            echo "                            <div class=\"col-md-2\"></div>\n";
            echo "\n";
            echo "\n";
            echo "                        </div>\n";
            echo "                    </div>\n";
            echo "                </div>\n";
            echo "                <div class=\"modal-footer\">\n";
            echo "                    <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>\n";
            echo "                </div>\n";
            echo "            </div>\n";
            echo "\n";
            echo "        </div>\n";
            echo "    </div>\n";
break;
}
?>