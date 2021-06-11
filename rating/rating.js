$(document).ready(function () {
  // if the user clicks on the like button ...
  $(".like-btn").on("click", function () {
    var film_id = $(this).data("id");
    $clicked_btn = $(this);
    if ($clicked_btn.hasClass("fa-heart-o")) {
      action = "like";
    } else if ($clicked_btn.hasClass("fa-heart")) {
      action = "unlike";
    }
    $.ajax({
      url: "http://localhost:8080/WebFilmFast/rating.php",
      type: "post",
      data: {
        action: action,
        film_id: film_id,
      },
      success: function (data) {
        res = JSON.parse(data);          
        if (action == "like") {
          $clicked_btn.removeClass("fa-heart-o");
          $clicked_btn.addClass("fa-heart");
        } else if (action == "unlike") {
          $clicked_btn.removeClass("fa-heart");
          $clicked_btn.addClass("fa-heart-o");
        }
        // display the number of likes and dislikes
        $clicked_btn.siblings("span.likes").text(res.likes);
      },
    });
  });
});
