document.addEventListener("DOMContentLoaded", function () {
    const multipleItemCarousel = document.querySelector(
        "#carouselExampleControls"
    );

    if (window.matchMedia("(min-width: 576px)").matches) {
        var carousel = new bootstrap.Carousel(multipleItemCarousel, {
            interval: false,
            wrap: true,
        });

        var carouselInner = $("#carouselExampleControls .carousel-inner");
        var carouselWidth = carouselInner[0].scrollWidth;
        var cardWidth = $("#carouselExampleControls .carousel-item").outerWidth(
            true
        );
        var scrollPosition = 0;

        $("#carouselExampleControls .carousel-control-next").on(
            "click",
            function () {
                if (scrollPosition < carouselWidth - cardWidth * 3) {
                    scrollPosition += cardWidth;
                    carouselInner.animate({ scrollLeft: scrollPosition }, 600);
                }
            }
        );

        $("#carouselExampleControls .carousel-control-prev").on(
            "click",
            function () {
                if (scrollPosition > 0) {
                    scrollPosition -= cardWidth;
                    carouselInner.animate({ scrollLeft: scrollPosition }, 600);
                }
            }
        );
    } else {
        $(multipleItemCarousel).addClass("slide");
    }
});
