import $ from "jquery";

export default function ()
{
  // $("#menu-toggle").on('click', function(e) {
  //   e.preventDefault();
  //   $("#wrapper").toggleClass("toggled");
  // });
  $("#openNav").on('click', function (e)
  {
    if ($(".myblog_sidebar").hasClass("d-none"))
    {
      $('.myblog_sidebar').removeClass('d-none')
      console.log('持ってます');
      var w = $(window).width();
      var x = 500;
      if (w <= x)
      {
        $('#sample').css({
          color: 'red'
        });
      }
    } else
    {
      $('.myblog_sidebar').addClass('d-none');
      console.log('持ってません');
    }
  });

  $(".menu-item-has-children").hover(
    function ()
    {
      $(this).children('.collapse').collapse('show');
    },
    function ()
    {
      $(this).children('.collapse').collapse('hide');
    }
  );
};