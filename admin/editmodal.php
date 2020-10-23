<?php
include_once("..\util\DBConnection.php");
include_once('..\dao\includeWithVar.php');

 ?>
<?php
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
            echo "                                            <input type=\"fishname\" class=\"form-control\" id=\"fish_name\" aria-describedby=\"\"\n";
            echo "                                                placeholder=\"Enter fish's name\" name=\"fishname\" disabled>\n";
            echo "                                        </div>\n";
            echo "                                        <div class=\"form-group col-md-6\">\n";
            echo "                                            <label for=\"fishscientificname\">Fish's scientific name</label>\n";
            echo "                                            <input type=\"fishscientificname\" class=\"form-control\" id=\"fish_scientific_name\"\n";
            echo "                                                aria-describedby=\"\" placeholder=\"Enter fish's scientific name\"\n";
            echo "                                                name=\"fishscientificname\" disabled>\n";
            echo "                                        </div>\n";
            echo "                                    </div>\n";
            echo "                                    <div class=\"row\">\n";
            echo "                                        <div class=\"form-group col-md-6\">\n";
            echo "                                            <label for=\"type\">Type</label>\n";
            echo "                                            <select class=\"form-control\" name=\"typeid\" id=\"fish_type\">\n";

                                       $typeArray = getSelectedItems("type","typename");
                                        foreach($typeArray as $item)
                                        {
            echo "                                  <option value=$item>$item</option>";
                                        };

            echo "                                            </select>\n";
            echo "                                        </div>\n";
            echo "                                        <div class=\"form-group col-md-6\">\n";
            echo "                                            <label for=\"location\">Location</label>\n";
            echo "                                            <select class=\"form-control\" name=\"locationid\" id=\"fish_location\">\n";

                                      $typeArray = getSelectedItems("location","locationname");
                                        foreach($typeArray as $item)
                                        {
            echo "                             <option value=$item>$item</option>";
                                        }

            echo "                                            </select>\n";
            echo "                                        </div>\n";
            echo "                                    </div>\n";
            echo "                                    <div class=\"row\">\n";
            echo "                                        <div class=\"form-group col-md-6\">\n";
            echo "                                            <label for=\"size\">Size</label>\n";
            echo "                                            <input type=\"number\" min=\"0\" type=\"size\" class=\"form-control\" id=\"fish_size\"\n";
            echo "                                                aria-describedby=\"\" placeholder=\"Enter size (cm)\" name=\"size\" required>\n";
            echo "                                        </div>\n";
            echo "\n";
            echo "                                        <div class=\"form-group col-md-6\">\n";
            echo "                                            <label for=\"weight\">Weight</label>\n";
            echo "                                            <input type=\"number\" min=\"0\" type=\"weight\" class=\"form-control\" id=\"fish_weight\"\n";
            echo "                                                aria-describedby=\"\" placeholder=\"Enter weight (g)\" name=\"weight\"\n";
            echo "                                                required>\n";
            echo "                                        </div>\n";
            echo "                                    </div>\n";
            echo "                                    <div class=\"row\">\n";
            echo "                                        <div class=\"form-group col-md-6\">\n";
            echo "                                            <label for=\"habitat\">Habitat</label>\n";
            echo "                                            <input type=\"habitat\" class=\"form-control\" id=\"fish_habitat\" aria-describedby=\"\"\n";
            echo "                                                placeholder=\"Enter habitat\" name=\"habitat\" required>\n";
            echo "                                        </div>\n";
            echo "                                        <div class=\"form-group col-md-6\">\n";
            echo "                                            <label for=\"diet\">Diet</label>\n";
            echo "                                            <input type=\"diet\" class=\"form-control\" id=\"fish_diet\" aria-describedby=\"\"\n";
            echo "                                                placeholder=\"Enter diet\" name=\"diet\" required>\n";
            echo "                                        </div>\n";
            echo "                                    </div>\n";
            echo "                                    <div class=\"row\">\n";
            echo "                                        <div class=\"form-group col-md-6\">\n";
            echo "                                            <label for=\"status\">Status</label>\n";
            echo "                                            <input type=\"status\" class=\"form-control\" id=\"fish_status\" aria-describedby=\"\"\n";
            echo "                                                placeholder=\"Enter status\" name=\"status\" required>\n";
            echo "                                        </div>\n";
            echo "                                        <div class=\"form-group col-md-6\">\n";
            echo "                                            <label for=\"gestationperiod\">Gestation Period</label>\n";
            echo "                                            <input type=\"gestationeriod\" class=\"form-control\" id=\"fish_gestationperiod\" aria-describedby=\"\"\n";
            echo "                                                placeholder=\"Enter getstation period\" name=\"gestationeriod\" required>\n";
            echo "                                        </div>\n";
            echo "                                    </div>\n";
            echo "                                    <div class=\"form-group\">\n";
            echo "                                        <label for=\"achievableage\">Achievableage</label>\n";
            echo "                                        <input type=\"achievableage\" class=\"form-control\" id=\"fish_achievableage\" aria-describedby=\"\"\n";
            echo "                                            placeholder=\"Enter achievableage\" name=\"achievableage\" required>\n";
            echo "                                    </div>\n";
            echo "                                    <div class=\"form-group\">\n";
            echo "                                        <label for=\"images\">Fish Images</label>\n";
            echo "                                        <div id=\"filediv\"><input name=\"file[]\" type=\"file\" id=\"file\" multiple /></div>\n";
            echo"                                        <div class=\"slideshow-container\" id=\"preview-img\"></div>";
            echo "                                    </div>\n";
            echo "                                    <div class=\"form-group\">\n";
            echo "                                        <label for=\"fishdetail\">Fish Detail</label>\n";
            echo "                                        <textarea name=\"fishdetail\" id=\"fishdetail\" rows=\"10\" cols=\"80\"> </textarea>\n";
            echo "                                        <script>\n";
            echo "                                        CKEDITOR.replace('fishdetail')\n";
            echo "                                        </script>\n";
            echo "                                    </div>\n";
            echo "\n";
            echo "                                    <div class=\"center-item\"><button name=\"submit\" value=\"submit\" id = \"submit\"type=\"submit\"\n";
            echo "                                            class=\"btn-sm btn-dark button-size\">Save</button></div>\n";
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
            echo "
            <script>
$(document).ready(function() {

    $('#submit').click(function() {
     

        var form_data = new FormData();

        // Read selected files
        var totalfiles = document.getElementById('file').files.length;

        var fishscientificname = $('#fish_scientific_name').val();
        var fishname = $('#fish_name').val();
        var habitat = $('#fish_habitat').val();
        var diet = $('#fish_diet').val();
        var status = $('#fish_status').val();
        var size = $('#fish_size').val();
        var weight = $('#fish_weight').val();
        var gestationperiod = $('#fish_gestationperiod').val();
        var achievableage = $('#fish_achievableage').val();
        var locationid = $('#fish_location').val();
        var typeid = $('#fish_type').val();
        var fishdetail = CKEDITOR.instances.fishdetail.getData()
        for (var index = 0; index < totalfiles; index++) {
            form_data.append('file[]', document.getElementById('file').files[index]);
        }
        form_data.append('fishscientificname', fishscientificname.trim());
        form_data.append('fishname', fishname.trim());
        form_data.append('habitat', habitat.trim());
        form_data.append('diet', diet.trim());
        form_data.append('status', status.trim());
        form_data.append('size', size.trim());
        form_data.append('weight', weight.trim());
        form_data.append('gestationperiod', gestationperiod.trim());
        form_data.append('achievableage', achievableage.trim());
        form_data.append('locationid', locationid.trim());
        form_data.append('typeid', typeid.trim());
        form_data.append('fishdetail', fishdetail.trim());

        // AJAX request
        $.ajax({
            url: '../admin/updatefish.php',
            type: 'post',
            data: form_data,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(response) {
                alert(response)

            }
        });

    });

});
</script>
            ";
                    
break;

case 'ticket':
break;
}
?>