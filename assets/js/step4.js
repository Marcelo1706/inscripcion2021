$(document).ready(function(_e){
    $("#side-panel").hide();
});

$(document).on("change","input[name=hermanos_estudiando]",function(){
    $el = $(this)
    if($el.is(":checked") && $el.val() == '1'){
        $("#hermanos").removeClass("is-hidden")
        $("#tbHermanos").show();
    }else{
        $("#hermanos").addClass("is-hidden")
        $("#tbHermanos").hide();
    }
})

$(document).on("change","input[name=padece_enfermedad]",function(){
    $el = $(this)
    if($el.is(":checked") && $el.val() == '1'){
        $("input[name=enfermedad]").prop("disabled",false)
    }else{
        $("input[name=enfermedad]").prop("disabled",true)
        $("input[name=enfermedad]").val("")
    }
})

$(document).on("change","input[name=alergia_medicamento]",function(){
    $el = $(this)
    if($el.is(":checked") && $el.val() == '1'){
        $("input[name=alergia]").prop("disabled",false)
    }else{
        $("input[name=alergia]").prop("disabled",true)
        $("input[name=alergia]").val("")
    }
})

function closeMe(element) {
    $(element).parent().parent().parent().remove();
}

function addMore() {
    var container = $('#tbHermanos');
    var item = container.find('.frmhermano').clone();
    item.removeClass('frmhermano');
    //add anything you like to item, ex: item.addClass('abc')....
    item.appendTo(container).show();
}

$(document).on("submit","#step4form",function(e){
    e.preventDefault();
    var data = $(this).serializeArray();
    $("#step4form :input").prop("disabled",true);
    $("#send").addClass("is-loading");
    $.ajax({
        url: "/ajax/step4",
        type: "POST",
        data: data,
        success: function(response){
            if(response == "success"){
                window.location = "aplicar?paso=5"
            }
        }
    })
})