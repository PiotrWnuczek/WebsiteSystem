$(function () {

   var pageNumber = 1;
   var load = true;

   var loadProjects = function () {
      $.ajax({
         url: templateURL + '/template-parts/content-post2.php',
         type: 'GET',
         dataType: 'html',
         data: {
            page: pageNumber,
         },
         beforeSend: function () {
            $('.wp2s1').append('<div class="text-center gray pb-3"><span class="wp2s2 spinner-border mb-3" role="status" aria-hidden="true"></span></div>');
            load = false;
         },
         success: function (data) {
            $('.project').append(data);
            $('.wp2s2').remove();
            load = true;
         },
      });
   };

   $('.paginate').hide();

   if (wp2maxPages <= pageNumber) {
      $('.wp2more').hide();
   }

   if (wp2maxPages > pageNumber) {
      if (load) {
         $('.wp2more').click(function () {
            pageNumber++;
            loadProjects();
            if (wp2maxPages <= pageNumber) {
               $('.wp2more').hide();
            }
         });
      }
   }

});
