// Back to top button
$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').addClass('show');
        } else {
            $('.back-to-top').removeClass('show');
        }
    });

    $('.back-to-top').click(function (e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, '300');
    });

    // Smooth scrolling for anchor links
    $('a[href*="#"]').on('click', function (e) {
        e.preventDefault();

        $('html, body').animate(
            {
                scrollTop: $($(this).attr('href')).offset().top - 70,
            },
            500,
            'linear'
        );
    });
});