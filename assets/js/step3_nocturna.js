$(document).ready(function(_e){
    $("#side-panel").hide();
    $.ajax({
        url: "/ajax/gradoSuperior_nocturna",
        type: "POST",
        success: function(response){
            if(response != "no_grade"){
                $("#grado_matricular").html(response)
            }else{
                alert("Este alumno no se puede matricular en otro grado.")
            }
        }
    })
});

$(document).on("change",".plat_edu",function(){
    var $nin = $(this)
    if($nin.val() == "ninguna"){
        $(".plat_edu").not(this).each(function(){
            $(this).prop("checked",false);
            $(this).prop("disabled",$nin.is(":checked"))
        })
    }
})

$(document).on("change",".disp",function(){
    var $nin = $(this)
    if($nin.val() == "ninguno"){
        $(".disp").not(this).each(function(){
            $(this).prop("checked",false);
            $(this).prop("disabled",$nin.is(":checked"))
        })
    }
})

$(document).on("submit","#step3form",function(e){
    e.preventDefault();
    var data = $(this).serializeArray();
    $("#step3form :input").prop("disabled",true);
    $("#send").addClass("is-loading");
    $.ajax({
        url: "/ajax/step3",
        type: "POST",
        data: data,
        success: function(response){
            if(response == "success"){
                window.location = "aplicar?paso=4"
            }
        }
    })
})