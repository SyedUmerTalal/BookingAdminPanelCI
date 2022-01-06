
  $(window).on("scroll", function() {
    if($(window).scrollTop() > 5) {
        $(".centering").addClass("bg-white");
    } else {
        //remove the background property so it comes transparent again (defined in your css)
       $(".centering").removeClass("bg-white");
    }
  });

  $(window).on("scroll", function() {
    if($(window).scrollTop() > 5) {
        $(".sidebar").addClass("border-none");
    } else {
        //remove the background property so it comes transparent again (defined in your css)
       $(".sidebar").removeClass("border-none");
    }
  });

  $(window).on("scroll", function() {
    if($(window).scrollTop() > 5) {
        $(".searchwrapper").addClass("searchwrapper-bg");
    } else {
        //remove the background property so it comes transparent again (defined in your css)
       $(".searchwrapper").removeClass("searchwrapper-bg");
    }
  });