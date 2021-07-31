$(function () {

   var pageNumber = 1;
   var load = true;

   var loadPosts = function () {
      $.ajax({
         url: templateURL + '/template-parts/content-searched.php',
         type: 'GET',
         dataType: 'html',
         data: {
            page: pageNumber,
            search: searchq,
         },
         beforeSend: function () {
            $('.ses1').append('<div class="text-center pb-2"><span class="ses2 spinner-border mb-3" role="status" aria-hidden="true"></span></div>');
            load = false;
         },
         success: function (data) {
            $('.post').append(data);
            $('.ses2').remove();
            load = true;
         },
      });
   };

   $('.paginate').hide();

   if (semaxPages <= pageNumber) {
      $('.searchmore').hide();
   }

   if (semaxPages > pageNumber) {
      if (load) {
         $('.searchmore').click(function () {
            pageNumber++;
            loadPosts();
            if (semaxPages <= pageNumber) {
               $('.searchmore').hide();
            }
         });
      }
   }

});
