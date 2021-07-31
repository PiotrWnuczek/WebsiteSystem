$(function () {

   var pageNumber = 1;
   var load = true;

   var loadPosts = function () {
      $.ajax({
         url: templateURL + '/template-parts/content-archived.php',
         type: 'GET',
         dataType: 'html',
         data: {
            page: pageNumber,
            cat: catid,
         },
         beforeSend: function () {
            $('.ars1').append('<div class="text-center pb-2"><span class="ars2 spinner-border mb-3" role="status" aria-hidden="true"></span></div>');
            load = false;
         },
         success: function (data) {
            $('.post').append(data);
            $('.ars2').remove();
            load = true;
         },
      });
   };

   $('.paginate').hide();

   if (armaxPages <= pageNumber) {
      $('.archivemore').hide();
   }

   if (armaxPages > pageNumber) {
      if (load) {
         $('.archivemore').click(function () {
            pageNumber++;
            loadPosts();
            if (armaxPages <= pageNumber) {
               $('.archivemore').hide();
            }
         });
      }
   }

});
