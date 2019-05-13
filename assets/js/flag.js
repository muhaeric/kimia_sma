        $(".dropdown-flag").on('click', 'li a', function(){
          var selText = $(this).children("h5").html();
         $(this).parent('li').siblings().removeClass('active');
          $(this).parents('.flag-dropdown').find('.text-flag').html(selText);
          $(this).parents('li').addClass("active");
        });  