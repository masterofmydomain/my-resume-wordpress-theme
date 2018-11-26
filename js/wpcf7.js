 $(document).ready(function() {
  $("#nav button").on("click", function() {
    $(".wpcf7-form").removeClass("invalid");
    $(".wpcf7-response-output").removeClass("wpcf7-validation-errors").html("").hide();
    $(".wpcf7-form-control").removeClass("wpcf7-not-valid").attr("aria-invalid","false");
    $("span").remove(".wpcf7-not-valid-tip");
  });

  $(".modal").on("hidden.bs.modal", function() {
    $(".wpcf7-form").removeClass("invalid");
    $(".wpcf7-response-output").removeClass("wpcf7-validation-errors").html("").hide();
    $(".wpcf7-form-control").removeClass("wpcf7-not-valid").attr("aria-invalid","false");
    $("span").remove(".wpcf7-not-valid-tip");
  });
});