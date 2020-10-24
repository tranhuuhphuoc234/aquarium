<style type="text/css">
#preview img {
    margin: 5px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<form method='post' action='' enctype="multipart/form-data">
    <input type="file" id='file' name="file[]" multiple><br>
    <input type="button" id="submit" value='Upload'>
    <input type="fishscientificname" class="form-control" id="fishscientificname" aria-describedby=""
        placeholder="Enter getstation period" name="fishscientificname" required>
</form>

<!-- Preview -->
<div id='preview'></div>




<script>
$('#submit').click(function() {

    $.ajax({
        type: 'POST',
        url: '../admin/updatefish.php',
        data: {

        },
        success: function(data) {
            result = data;
        }
    })
})
</script>;