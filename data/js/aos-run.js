/**
 * Created by Krzysztof Sikora on 16.02.17.
 */

AOS.init({
            disable: 'mobile'
        }
);


if ($(window).width() < 992)
    $("data-aos").remove();
