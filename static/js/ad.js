function closeAd() {
  $(".closeAd").hide();
}
function openAd() {
  $("#ad").html(
    "<div class='container closeAd' style='width:290px;bottom:0;right:10%;border:solid blue;position:fixed;'><div class='row'><button onclick='closeAd();'><i class='fas fa-times cross items'></i></button></div><div class='row'><img src='./static/img/add.PNG' height='200px' style='margin:0;'></div></div>"
  );
}