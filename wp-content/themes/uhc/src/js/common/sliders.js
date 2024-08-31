class SiteSliders{
    constructor(){
        this.initBannerSlider();
        this.initImageContentSlider();
    }

    initBannerSlider(){
        const bannerSlider = new Swiper('.banner-slider', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }

    initImageContentSlider(){
        const imageContentSlider = new Swiper('.image-content-slider', {
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }
}

document.addEventListener('DOMContentLoaded', function(){
    const siteSlider = new SiteSliders();

    // siteSlider.init();
});