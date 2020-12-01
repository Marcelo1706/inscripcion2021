$(document).on("click",".solicitar-cambio",function(e){
    var idProceso = $(this).data("id");
    $.ajax({
        url: "/ajax/datosCambio",
        type: "POST",
        data: {"idProceso" : idProceso},
        success: function(response){
            if(response == "Bachillerato no puede cambiar de turno"){
                $("#cuerpo-modal").addClass("is-hidden");
                $("#mensaje-error").removeClass("is-hidden");
                $("#btn-solicitar").prop("disabled",true);
                cambiar_modal();
            }else{
                $("#cuerpo-modal").removeClass("is-hidden");
                $("#mensaje-error").addClass("is-hidden");
                $("#turno").html("Grado del estudiante: "+response);
                $("#idProceso").val(idProceso);
                $("#btn-solicitar").prop("disabled",false);
                cambiar_modal();
            }
        }
    })
})

function cambiar_modal(){
    $("#modal-cambio").toggleClass("is-active");
    $("html").toggleClass("is-clipped");
}

$(document).on("click","#btn-solicitar",function(){
    $("#datos-cambio").submit();
})

$(document).on("submit","#datos-cambio",function(e){
    e.preventDefault();
    $("#btn-solicitar").addClass("is-loading");
    var data = $(this).serializeArray();
    $.ajax({
        url: "/ajax/solicitarCambio",
        type: "POST",
        data: data,
        success: function(response){
            if(response == "success"){
                window.location.reload();
            }else{
                alert(response);
            }
        }
    })
})