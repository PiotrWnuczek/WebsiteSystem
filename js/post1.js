$(function () {

   var pageNumber = 1;
   var load = true;

   var loadPosts = function () {
      $.ajax({
         url: templateURL + '/template-parts/content-post1.php',
         type: 'GET',
         dataType: 'html',
         data: {
            page: pageNumber,
         },
         beforeSend: function () {
            $('.wp1s1').append('<div class="text-center gray pb-3"><span class="wp1s2 spinner-border mb-3" role="status" aria-hidden="true"></span></div>');
            load = false;
         },
         success: function (data) {
            $('.post').append(data);
            $('.wp1s2').remove();
            load = true;
         },
      });
   };

   $('.paginate').hide();

   if (wp1maxPages <= pageNumber) {
      $('.wp1more').hide();
   }

   if (wp1maxPages > pageNumber) {
      if (load) {
         $('.wp1more').click(function () {
            pageNumber++;
            loadPosts();
            if (wp1maxPages <= pageNumber) {
               $('.wp1more').hide();
            }
         });
      }
   }

});
