document.addEventListener('DOMContentLoaded', function(){
    initBannerSlider();
});

function initBannerSlider(){
    const bannerSlider = new Swiper('.banner-slider', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
}