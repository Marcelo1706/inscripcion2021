$(document).ready(function(_e){
    $("#side-panel").hide();
});

var nombre = "";
const fileInput = document.querySelector('#datos_personales input[type=file]');

fileInput.onchange = () => {
    $("#send").prop("disabled",true);
    if (fileInput.files.length > 0) {
        nombre = fileInput.files[0].name;
        $("#preview_img").attr("src", "/assets/images/loading.gif");

        //Ajax Load
        var fd = new FormData();
        var files = $('#foto_perfil')[0].files[0];
        fd.append('file', files);
        fd.append('folder', "data/profiles/");
        fd.append('has_preview', true);
        fd.append('extensions', JSON.stringify(["jpg", "jpeg", "png", "bmp", "gif","jfif"]));


        $.ajax({
            url: '/ajax/subirFoto/',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response != 0) {
                    nombre = response;
                    var d = new Date();
                    $("#preview_img").attr("src", response+"?"+d.getTime());
                    $("#send").prop("disabled",false);
                } else {
                    alert('Archivo no válido');
                }
            },
        });
    }
}

$(document).on("submit","#datos_personales",function(e){
    e.preventDefault();
    $("#send").addClass("is-loading");
    $.ajax({
        url: "/ajax/step5",
        type: "POST",
        success: function(response){
            if(response == "success"){
                window.location = "aplicar?paso=6"
            }
        }
    })
})