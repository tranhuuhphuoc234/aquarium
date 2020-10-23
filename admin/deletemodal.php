

<?php
    switch($tablename)
    {
        case 'fish':
            echo "<div id=\"deleteModal\" class=\"modal fade\">\n";
            echo "	<div class=\"modal-dialog\">\n";
            echo "		<div class=\"modal-content\">\n";
            echo "			<form>\n";
            echo "				<div class=\"modal-header\">						\n";
            echo "					<h4 class=\"modal-title\">Delete </h4>\n";
            echo "					<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>\n";
            echo "				</div>\n";
            echo "				<div class=\"modal-body\">					\n";
            echo "					<p>Are you sure you want to delete this record?</p>\n";
            echo "					<p class=\"text-warning\"><small>This action cannot be undone.</small></p>\n";
            echo "				</div>\n";
            echo "				<div class=\"modal-footer\">\n";
            echo "					<input type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" value=\"Cancel\">\n";
            echo "					<input id = \"deletefish\" type=\"submit\" class=\"btn btn-danger\" value=\"Delete\">\n";
            echo "				</div>\n";
            echo "			</form>\n";
            echo "		</div>\n";
            echo "	</div>\n";
            echo "</div>\n";
        break;
        case 'location':
            echo "<div id=\"deleteModal\" class=\"modal fade\">\n";
            echo "	<div class=\"modal-dialog\">\n";
            echo "		<div class=\"modal-content\">\n";
            echo "			<form>\n";
            echo "				<div class=\"modal-header\">						\n";
            echo "					<h4 class=\"modal-title\">Delete </h4>\n";
            echo "					<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>\n";
            echo "				</div>\n";
            echo "				<div class=\"modal-body\">					\n";
            echo "					<p>Are you sure you want to delete this record?</p>\n";
            echo "					<p class=\"text-warning\"><small>This action cannot be undone.</small></p>\n";
            echo "				</div>\n";
            echo "				<div class=\"modal-footer\">\n";
            echo "					<input type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" value=\"Cancel\">\n";
            echo "					<input id = \"deletelocation\" type=\"submit\" class=\"btn btn-danger\" value=\"Delete\">\n";
            echo "				</div>\n";
            echo "			</form>\n";
            echo "		</div>\n";
            echo "	</div>\n";
            echo "</div>\n";
        break;
        case 'type':
            echo "<div id=\"deleteModal\" class=\"modal fade\">\n";
            echo "	<div class=\"modal-dialog\">\n";
            echo "		<div class=\"modal-content\">\n";
            echo "			<form>\n";
            echo "				<div class=\"modal-header\">						\n";
            echo "					<h4 class=\"modal-title\">Delete </h4>\n";
            echo "					<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>\n";
            echo "				</div>\n";
            echo "				<div class=\"modal-body\">					\n";
            echo "					<p>Are you sure you want to delete this record?</p>\n";
            echo "					<p class=\"text-warning\"><small>This action cannot be undone.</small></p>\n";
            echo "				</div>\n";
            echo "				<div class=\"modal-footer\">\n";
            echo "					<input type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" value=\"Cancel\">\n";
            echo "					<input id = \"deletetype\" type=\"submit\" class=\"btn btn-danger\" value=\"Delete\">\n";
            echo "				</div>\n";
            echo "			</form>\n";
            echo "		</div>\n";
            echo "	</div>\n";
            echo "</div>\n";
        break;
        case 'ticket':
            echo "<div id=\"deleteModal\" class=\"modal fade\">\n";
            echo "	<div class=\"modal-dialog\">\n";
            echo "		<div class=\"modal-content\">\n";
            echo "			<form>\n";
            echo "				<div class=\"modal-header\">						\n";
            echo "					<h4 class=\"modal-title\">Delete </h4>\n";
            echo "					<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>\n";
            echo "				</div>\n";
            echo "				<div class=\"modal-body\">					\n";
            echo "					<p>Are you sure you want to delete this record?</p>\n";
            echo "					<p class=\"text-warning\"><small>This action cannot be undone.</small></p>\n";
            echo "				</div>\n";
            echo "				<div class=\"modal-footer\">\n";
            echo "					<input type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\" value=\"Cancel\">\n";
            echo "					<input id = \"deleteticket\" type=\"submit\" class=\"btn btn-danger\" value=\"Delete\">\n";
            echo "				</div>\n";
            echo "			</form>\n";
            echo "		</div>\n";
            echo "	</div>\n";
            echo "</div>\n";
        break;
    }
 ?>