$(document).ready(function(_e){
    $("#side-panel").hide();
});

$(document).on("change","input[name=tipo_discapacidad]",function(e){
    if($(this).val() == 13){
        $("input[name=otra_discapacidad]").prop("disabled",false);
    }else{
        $("input[name=otra_discapacidad]").val("");
        $("input[name=otra_discapacidad]").prop("disabled",true);
    }
})

$(document).on("change","input[name=actividad_laboral]",function(e){
    if($(this).val() == 15){
        $("input[name=otra_actividad]").prop("disabled",false);
    }else{
        $("input[name=otra_actividad]").val("");
        $("input[name=otra_actividad]").prop("disabled",true);
    }
})

$(document).on("submit","#step2form",function(e){
    e.preventDefault();
    var data = $(this).serializeArray();
    $("#step2form :input").prop("disabled",true);
    $("#send").addClass("is-loading");
    $.ajax({
        url: "/ajax/step2",
        type: "POST",
        data: data,
        success: function(response){
            if(response == "success"){
                window.location = "aplicar?paso=3"
            }
        }
    })
})