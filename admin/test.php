<?php
  include_once("header.php")
 ?>
  <script>
  $( function() {
    $( "#dialog-message" ).dialog({
      modal: true,
      buttons: {
        Ok: function() {
          $( this ).dialog( "close" );
        }
      }
    }).prev(".ui-dialog-titlebar").css("background","red");;
  } );
  </script>
</head>
<body>
 
<div id="dialog-message" title="Download complete">
  <p>
    Your files have downloaded successfully into the My Downloads folder.
  </p>
</div>
  
 
</body>
</html>