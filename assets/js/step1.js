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
            url: "/ajax/step1",
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
    $("#error-text").html("");
    $("#mensaje-error").addClass("is-hidden");
    $("#buscar-nie").addClass("is-loading");
    $.ajax({
        url: "/ajax/buscarAlumno",
        type: "POST",
        data: { "tipo" : "antiguo", "nie" : $("#nie").val() },
        success: function(response){
            var obj = JSON.parse(response)
            console.log(obj.error);
            if(typeof(obj.error) == 'undefined'){
                $("#pnombre").val(obj.pnombre);
                $("#snombre").val(obj.snombre);
                $("#papellido").val(obj.papellido);
                $("#sapellido").val(obj.sapellido);
                $("#pnombre").prop("readonly",true)
                $("#snombre").prop("readonly",true)
                $("#papellido").prop("readonly",true)
                $("#sapellido").prop("readonly",true)
                $("#seccion-nombre").removeClass("is-hidden");
                $("#nie").prop("disabled",true);
                $("#buscar-nie").removeClass("is-loading");
                $("#buscar-nie").prop("disabled",true);
            }else{
                $("#error-text").html(obj.error);
                $("#mensaje-error").removeClass("is-hidden");
                $("#buscar-nie").removeClass("is-loading");
            }
        }
    })
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