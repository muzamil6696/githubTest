toggleDisplay = (eId) => {
  $(eId).is(':visible') ? $(eId).hide() : $(eId).show();
}
$(document).ready(function () {
 $('.favourite').click(function (e) {
   e.stopPropagation();

   var movieId = $(this).parents('.movie').first().data('movieid');

   if ($(this).find('.far').length !== 0) {
     $.post('/worldmovies/inc/favourite.php', {movieId: movieId, action: 'add'}, function (data) {
        if (data == "added") {
          $('.movie[data-movieid=' + movieId + '] .favourite').html('<i class=\"fas fa-heart\"></i>');
        }
     });
   } else {
     console.log('remove');
     $.post('/worldmovies/inc/favourite.php', {movieId: movieId, action: 'remove'}, function (data) {
        if (data == "removed") {
          $('.movie[data-movieid=' + movieId + '] .favourite').html('<i class=\"far fa-heart\"></i>');
        }
     });
   }

 });

 $('.movie').click(function () {
   var movieId = $(this).data('movieid');
   console.log(movieId);

   window.location.href = 'movie.php?id=' + movieId;
 });
});
