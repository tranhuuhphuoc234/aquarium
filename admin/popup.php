<?php
include_once("../admin/header.php");
  echo "  <script>
  $( function() {
    $( \"#dialog-message\" ).dialog({
      modal: true,
      buttons: {
        Ok: function() {
          $( this ).dialog( \"close\" );
        }
      }
    }).prev(\".ui-dialog-titlebar\").css(\"background\",\"$color\");;
  } );
  </script>
</head>
<body>
 
<div id=\"dialog-message\" title=$title>
  <p>
    $content
  </p>
</div>";
include_once("../admin/footer.php")
 ?>
 
 
