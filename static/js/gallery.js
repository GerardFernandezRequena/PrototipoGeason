var dataActual = new Date();
document.getElementById('mesEscogido').value=dataActual.getMonth() + 1;
document.getElementById('anyEscogido').value=dataActual.getFullYear();
getImages();

function getImages() {

    $('#instagram').hide();
    $('#album').show();
    $("#container-gallery1").empty();
    $("#container-gallery2").empty();

    let parametres = {
        mes:$("#mesEscogido").val(),
        any:$("#anyEscogido").val()
    };
    $.ajax({
        data: parametres,
        url: "./static/php/funcionsGallery.php",
        type: "post",
        dataType: "text",
        beforeSend: function () {},
        success: function (response) {
            $("#container-gallery1").append(response);
            $("#container-gallery1").addClass("h5");
            $("#container-gallery2").append(response);
            $("#container-gallery2").addClass("h2");

            $(".gallery2").removeClass("mb-5");
            $(".gallery2").addClass("mmt-5");

            $("#container-gallery1").find('.figcaptionDescripcio').removeClass("w-50");

            $('#container-gallery1').find('.figcaptionDescripcio').remove();

        },
        fail: function () {
            $("#container-gallery1").append("Error");
        },
    });
}

function instagram(idimage){
    if (!$('#container-gallery1').is(':empty')){
        $('#container-gallery1').empty();
        $('#instagram').show();
        $('html, body').animate({
            scrollTop: $("#"+idimage).offset().top-200
        }, 200)
    }
}
