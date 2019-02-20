$(document).ready(function(){

    $("button").click(function(e) {
        var idClicked = e.target.id;
        if(idClicked == "action"){
            addPost();
        }
    });
});

function addPost(){
    var originUrl = window.location.href;
    originUrl = originUrl.replace(/\/index$/, '');

    var url = originUrl+"addPost";
    
    var formSelector = "#addBlog";
    var formData = new FormData($(formSelector)[0]);
    
    var value = CKEDITOR.instances['content'].getData()
    formData.set("content", value);

    $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        success: function (data) {
            // alert("Your Post Added Successfully!");
            data = $.parseJSON(data);
            if(data.errors != null){
                $('#errors').html(data.errors);
            }else{
                alert(data.message);

                $('#errors').html(null);
                $('#title').val(null);
                $('#abstract').val(null);
                $('#author').val(null);
                $('#filePath').val(null);
                CKEDITOR.instances['content'].setData(null);
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
}
