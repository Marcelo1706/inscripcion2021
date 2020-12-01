$(document).ready(function(_e){
    $("#side-panel").hide();
    $.ajax({
        url: "/ajax/departamentos",
        type: "post",
        success: function(response){
            $("#departamento").html(response);
        }
    })
});

$.validator.addMethod("valueNotEquals", function(value, element, arg){
    return arg !== value;
},"Value must not equal arg.");

$("#step1form").validate({
    rules: {
        departamento: { valueNotEquals : "0"},
        municipio : { valueNotEquals : "0"}
    },
    messages: {
        departamento: { valueNotEquals : "Seleccione una opción"},
        municipio: { valueNotEquals : "Seleccione una opción"}
    },
    errorClass: "help is-danger",
    validClass: "is-success",
    errorElement: "p",
    submitHandler: function(form){
        $("#nie").prop("disabled",false);
        var data = $("#step1form").serializeArray();
        $("#step1form :input").prop("disabled",true);
        $("#send").addClass("is-loading");
        $.ajax({
            url: "/ajax/step1_nuevos",
            type: "POST",
            data: data,
            success: function(response){
                if(response == "success"){
                    window.location = "aplicar?paso=2"
                }
            }
        })
    }
});


$(document).on("click","#buscar-nie",function(_e){
    $("#nie").prop("disabled",true);
    $("#buscar-nie").prop("disabled",true);
    $("#no-nie").prop("disabled",true);
    $("#seccion-nombre").removeClass("is-hidden");
})

$(document).on("click","#no-nie",function(e){
    $("#nie").val(0);
    $("#nie").prop("disabled",true);
    $("#buscar-nie").prop("disabled",true);
    $("#no-nie").prop("disabled",true);
    $("#seccion-nombre").removeClass("is-hidden");
})

$(document).on("change","#departamento",function(_e){
    if($(this).val() != 0){
        $.ajax({
            url: "/ajax/municipios",
            type: "post",
            data: {"departamento": $(this).val()},
            success: function(response){
                $("#municipio").html("");
                $("#municipio").html(response);
                $("#municipio").prop("disabled",false);
            }
        })
    }else{
        $("#municipio").html("");
        $("#municipio").html("<option value='0'>-- Seleccione Uno --</option>");
        $("#municipio").prop("disabled",true);
    }
})