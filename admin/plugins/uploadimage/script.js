$(document).ready(function () {

    //following function will executes on change event of file input to select different file	
    $('body').on('change', '#file', function () {
        const myNode = document.getElementById("preview-img");
        while (myNode.firstChild) {
            myNode.removeChild(myNode.lastChild);
        }
        var files = event.target.files;
        $('.slideshow-container').append(
            " <a class='my prev' onclick='plusDivs(-1)'>&#10094;</a><a class='my next' id ='next-img' onclick='plusDivs(1)'>&#10095;</a>"
        );

        for (i = 0; i < files.length; i++) {
            var image = files[i]
            var reader = new FileReader();
            reader.onload = function (file) {
                var img = new Image();
                img.src = file.target.result;
                console.log(img)
                $('.slideshow-container').append("<div class='mySlides'> <img src='" + img.src +
                    "' style='width:100%'></div>");
                document.getElementsByClassName("mySlides")[0].style.display = "block";

            }
            reader.readAsDataURL(image);

        };



    });


});

var id = 0;
var fish_scientific_name = "";
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('.edit.fish').click(function () {
        // get data row table
        var id = $(this).attr('value');
        var fish_name = $(this).closest('tr').find('td:nth-child(2)').text();
        var fish_scientific_name = $(this).closest('tr').find('td:nth-child(3)').text();
        var fish_type = $(this).closest('tr').find('td:nth-child(4)').text();
        var fish_location = $(this).closest('tr').find('td:nth-child(5)').text();
        var fish_size = $(this).closest('tr').find('td:nth-child(6)').text();
        var fish_weight = $(this).closest('tr').find('td:nth-child(7)').text();
        var fish_habitat = $(this).closest('tr').find('td:nth-child(8)').text();
        var fish_diet = $(this).closest('tr').find('td:nth-child(9)').text();
        var fish_gestationperiod = $(this).closest('tr').find('td:nth-child(10)').text();
        var fish_achievableage = $(this).closest('tr').find('td:nth-child(11)').text();
        var fish_status = $(this).closest('tr').find('td:nth-child(12)').text();


        

        // set value for modal
        $('#fish_name').val(fish_name.trim());
        $('#fish_scientific_name').val(fish_scientific_name.trim());
        $("#fish_type option[value=" + fish_type + "]").prop('selected', 'selected').change();
        $("#fish_location option[value=" + fish_location + "]").prop('selected', 'selected').change();
        $('#fish_size').val(Number(fish_size));
        $('#fish_weight').val(Number(fish_weight));
        $('#fish_habitat').val(fish_habitat.trim());
        $('#fish_diet').val(fish_diet.trim());
        $('#fish_gestationperiod').val(fish_gestationperiod.trim());
        $('#fish_achievableage').val(fish_achievableage.trim());
        $('#fish_status').val(fish_status.trim());

        // read txt file
        var rawlink = "../uploads/" + fish_scientific_name + "/" + fish_scientific_name + ".txt";
        var link = rawlink.split(' ').join('')
        fetch(link)
            .then(response => response.text())
            .then((data) => {
                CKEDITOR.instances['fishdetail'].setData(data);

            })

        // read img file
        $.ajax({
            url: '../dao/getImageList.php',
            data: {
                fish_scientific_name
            },

            type: 'post',
            success: function (output) {
                
                const myNode = document.getElementById("preview-img");
                while (myNode.firstChild) {
                    myNode.removeChild(myNode.lastChild);
                }
                if (parseInt(output, 10) > 0) {
                    var images = [];
                    $('.slideshow-container').append(
                        " <a class='my prev' onclick='plusDivs(-1)'>&#10094;</a><a class='my next' id ='next-img' onclick='plusDivs(1)'>&#10095;</a>"
                    );
                    for (var i = 0; i < parseInt(output, 10) - 1; i++) {
                        var raw_imgsrc = "../uploads/" + fish_scientific_name + "/" +
                            fish_scientific_name + i + ".jpg";
                        imgsrc = raw_imgsrc.split(' ').join('');
                        images.push(imgsrc);
                        $('.slideshow-container').append("<div class='mySlides'> <img src='" +
                            imgsrc +
                            "' style='width:100%'></div>");

                           

                        document.getElementsByClassName("mySlides")[0].style.display = "block";
                    }
                    
                }
            }
        });
    });
});

$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('.edit.ticket').click(function () {
        // get data row table
        var id = $(this).attr('value');
        var ticket_name = $(this).closest('tr').find('td:nth-child(2)').text();
        var price = $(this).closest('tr').find('td:nth-child(3)').text();   

        // set value for modal
        $('#ticket_name').val(ticket_name.trim());
        $('#currency-field').val(price.trim());
     
             
    });
});


$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('.edit.event').click(function () {
        // get data row table
        var id = $(this).attr('value');
        var event_name = $(this).closest('tr').find('td:nth-child(2)').text();
        var event_detail = $(this).closest('tr').find('td:nth-child(3)').text();
        var event_time =   $(this).closest('tr').find('td:nth-child(4)').text(); 

        // set value for modal
        $('#event_name').val(event_name.trim());
        $('#event_detail').val(event_detail.trim());
        $('#event_time').val(event_time.trim());
     
             
    });
});


$(document).ready(function (){
    var location_name= "";
    $('.delete.location').click(function () {

        id = $(this).attr('value');
        location_name = $(this).closest('tr').find('td:nth-child(2)').text();
        
        
    });
    $('#deletelocation').click(function () {
        $.ajax({
            type: 'POST',
            url: '../dao/deleteRecord.php',
            data: { value: location_name.trim(), table: "location", columnname: "locationname" },
            dataType: 'json'
        })
            .done(function (data) {       
                   if(data == true)
                   {
                    id = parseInt(id, 10);
                    document.getElementById("myTable").deleteRow(id + 1);
                    $('#deleteModal').modal('hide');
                    alert('xoa roi')
                   }
                   else
                   {
                    $('#deleteModal').modal('hide');
                    alert('khong xoa dc nho doi lai modal')
                   }
            })
            .fail(function () {

                // just in case posting your form failed
                alert("Posting failed.");

            });

        // to prevent refreshing the whole page page
        return false;


    });


});

$(document).ready(function (){
    var event_name= "";
    $('.delete.event').click(function () {

        id = $(this).attr('value');
        event_name = $(this).closest('tr').find('td:nth-child(2)').text();
        
        
    });
    $('#deleteevent').click(function () {
        $.ajax({
            type: 'POST',
            url: '../dao/deleteRecord.php',
            data: { value: event_name.trim(), table: "event", columnname: "eventname" },
            dataType: 'json'
        })
            .done(function (data) {       
                   if(data == true)
                   {
                    id = parseInt(id, 10);
                    document.getElementById("myTable").deleteRow(id + 1);
                    $('#deleteModal').modal('hide');
                    alert('xoa roi')
                   }
                   else
                   {
                    $('#deleteModal').modal('hide');
                    alert('khong xoa dc nho doi lai modal')
                   }
            })
            .fail(function () {

                // just in case posting your form failed
                alert("Posting failed.");

            });

        // to prevent refreshing the whole page page
        return false;


    });


});

$(document).ready(function (){
    var ticket_name= "";
    $('.delete.ticket').click(function () {

        id = $(this).attr('value');
        ticket_name = $(this).closest('tr').find('td:nth-child(2)').text();
        
        
    });
    $('#deleteticket').click(function () {
        $.ajax({
            type: 'POST',
            url: '../dao/deleteRecord.php',
            data: { value: ticket_name.trim(), table: "ticket", columnname: "ticketname" },
            dataType: 'json'
        })
            .done(function (data) {       
                   if(data == true)
                   {
                    id = parseInt(id, 10);
                    document.getElementById("myTable").deleteRow(id + 1);
                    $('#deleteModal').modal('hide');
                    alert('xoa roi')

                   }
                   else
                   {
                    $('#deleteModal').modal('hide');
                    alert('khong xoa dc nho doi lai modal')
                   }
            })
            .fail(function () {

                // just in case posting your form failed
                alert("Posting failed.");

            });

        // to prevent refreshing the whole page page
        return false;


    });


});

$(document).ready(function (){
    var type_name= "";
    $('.delete.type').click(function () {

        id = $(this).attr('value');
        type_name = $(this).closest('tr').find('td:nth-child(2)').text();
        
        
    });
    $('#deletetype').click(function () {
        $.ajax({
            type: 'POST',
            url: '../dao/deleteRecord.php',
            data: { value: type_name.trim(), table: "type", columnname: "typename" },
            dataType: 'json'
        })
            .done(function (data) {       
                   if(data == true)
                   {
                    id = parseInt(id, 10);
                    document.getElementById("myTable").deleteRow(id + 1);
                    $('#deleteModal').modal('hide');
                                        alert('xoa roi')

                   }
                   else
                   {
                    $('#deleteModal').modal('hide');
                    alert('khong xoa dc nho doi lai modal')
                   }
            })
            .fail(function () {

                // just in case posting your form failed
                alert("Posting failed.");

            });

        // to prevent refreshing the whole page page
        return false;


    });


});

$(document).ready(function () {

    $('.delete.fish').click(function () {

        id = $(this).attr('value');
        fish_scientific_name = $(this).closest('tr').find('td:nth-child(3)').text();
    });
    $('#deletefish').click(function () {
        $.ajax({
            type: 'POST',
            url: '../dao/deleteRecord.php',
            data: { value: fish_scientific_name, table: "images", columnname: "fishid" }
        })
            .done(function (data) {
                $.ajax({
                    type: 'POST',
                    url: '../dao/deleteRecord.php',
                    data: { value: fish_scientific_name, table: "fish", columnname: "fishscientificname" }
                })
                    .done(function (data) {
                        id = parseInt(id, 10);
                        document.getElementById("myTable").deleteRow(id + 1);
                        $('#deleteModal').modal('hide');


                    })
                    .fail(function () {

                        // just in case posting your form failed
                        alert("Posting failed.");

                    });


            })
            .fail(function () {

                // just in case posting your form failed
                alert("Posting failed.");

            });

        // to prevent refreshing the whole page page
        return false;


    });

});
$(document).ready(function () {
    $('.check.fish').click(function () {
        var $this = $(this);

        if ($this.is(':checked')) {
            $.ajax({
                type: 'POST',
                url: '../dao/checkStatus.php',
                data: {
                    checked: true,
                    id: $(this).attr('id'),
                    table: 'fish',
                    valuecheck: 'fishstatus'
                },
                success: function (data) {
                    result = data;
                }
            });

        } else {

            $.ajax({
                type: 'POST',
                url: '../dao/checkStatus.php',
                data: {
                    checked: false,
                    id: $(this).attr('id'),
                    table: 'fish',
                    valuecheck: 'fishstatus'
                },
                success: function (data) {
                    result = data;
                }
            })
        }
    })
})

$(document).ready(function () {
    $('.check.location').click(function () {
        var $this = $(this);

        if ($this.is(':checked')) {
            $.ajax({
                type: 'POST',
                url: '../dao/checkStatus.php',
                data: {
                    checked: true,
                    id: $(this).attr('id'),
                    table: 'location',
                    valuecheck: 'locationstatus'
                },
                success: function (data) {
                    result = data;
                }
            });

        } else {

            $.ajax({
                type: 'POST',
                url: '../dao/checkStatus.php',
                data: {
                    checked: false,
                    id: $(this).attr('id'),
                    table: 'location',
                    valuecheck: 'locationstatus'
                },
                success: function (data) {
                    result = data;
                }
            })
        }
    })
})

$(document).ready(function () {
    $('.check.type').click(function () {
        var $this = $(this);

        if ($this.is(':checked')) {
            $.ajax({
                type: 'POST',
                url: '../dao/checkStatus.php',
                data: {
                    checked: true,
                    id: $(this).attr('id'),
                    table: 'type',
                    valuecheck: 'typestatus'
                },
                success: function (data) {
                    result = data;
                }
            });

        } else {

            $.ajax({
                type: 'POST',
                url: '../dao/checkStatus.php',
                data: {
                    checked: false,
                    id: $(this).attr('id'),
                    table: 'type',
                    valuecheck: 'typestatus'
                },
                success: function (data) {
                    result = data;
                }
            })
        }
    })
})

$(document).ready(function () {
    $('.check.ticket').click(function () {
        var $this = $(this);

        if ($this.is(':checked')) {
            $.ajax({
                type: 'POST',
                url: '../dao/checkStatus.php',
                data: {
                    checked: true,
                    id: $(this).attr('id'),
                    table: 'ticket',
                    valuecheck: 'ticketstatus'
                },
                success: function (data) {
                    result = data;
                }
            });

        } else {

            $.ajax({
                type: 'POST',
                url: '../dao/checkStatus.php',
                data: {
                    checked: false,
                    id: $(this).attr('id'),
                    table: 'ticket',
                    valuecheck: 'ticketstatus'
                },
                success: function (data) {
                    result = data;
                }
            })
        }
    })
})

$(document).ready(function () {
    $('.check.event').click(function () {
        var $this = $(this);

        if ($this.is(':checked')) {
            $.ajax({
                type: 'POST',
                url: '../dao/checkStatus.php',
                data: {
                    checked: true,
                    id: $(this).attr('id'),
                    table: 'event',
                    valuecheck: 'eventstatus'
                },
                success: function (data) {
                    result = data;
                }
            });

        } else {

            $.ajax({
                type: 'POST',
                url: '../dao/checkStatus.php',
                data: {
                    checked: false,
                    id: $(this).attr('id'),
                    table: 'event',
                    valuecheck: 'eventstatus'
                },
                success: function (data) {
                    result = data;
                }
            })
        }
    })
})


var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = x.length
    }
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex - 1].style.display = "block";
}