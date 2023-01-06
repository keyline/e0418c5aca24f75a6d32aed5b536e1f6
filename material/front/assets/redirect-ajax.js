 $(document).on('click','a.nav-link', function(e){
  e.preventDefault();
  var pageURL=$(this).attr('href');
  // console.log(pageURL);
  var base_url = 'https://abp-podcast.keylines.in/';
  history.pushState(null, '', pageURL);    
  $.ajax({
    type: "GET",
    url: base_url + "dynamic-page-content",
    data:{page:pageURL},
    dataType: "html",
    beforeSend: function () {
      $(".loadingio-spinner-pulse-4ofwcox9r54").show();
    },
    success: function(data){
      $(".loadingio-spinner-pulse-4ofwcox9r54").hide();
      $('#pageContent').html(data);
    }
  });

});