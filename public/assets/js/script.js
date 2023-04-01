$( document ).ready(function() {
    $(window).scroll(function() {
        let header = $(".header");
        let scrollTop = $(this).scrollTop();
        let position = $("#header").height() + header.height();
        if (scrollTop > position) {
            if (!header.hasClass('scrolled')) {
                header.addClass('scrolled');
            }
        }
        // else {
        //     if (header.hasClass('scrolled')) {
        //         header.removeClass('scrolled')
        //     }
        // }
        if ($(this).scrollTop() > 500) {
            $('.scroll-to-top').show().fadeIn();
        } else {
            $('.scroll-to-top').fadeOut().hide();
        }
    });

    $('.scroll-to-top').on('click', function () {
        window.scrollTo({top: 0, behavior: 'smooth'});
    })

    $('.view-more').on('click', function () {
        $(this).closest('.feature-content').find('p').css('-webkit-line-clamp','unset')
    })
});
