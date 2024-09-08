class SiteSliders{

    arrowLeft = '<svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42" fill="none"><path d="M19.7679 7.79444C19.9514 7.97734 20.0971 8.19467 20.1964 8.43398C20.2958 8.67328 20.3469 8.92985 20.3469 9.18897C20.3469 9.44808 20.2958 9.70465 20.1964 9.94395C20.0971 10.1833 19.9514 10.4006 19.7679 10.5835L11.3203 19.0311H35.4375C35.9596 19.0311 36.4604 19.2385 36.8296 19.6077C37.1988 19.9769 37.4063 20.4777 37.4063 20.9998C37.4063 21.522 37.1988 22.0227 36.8296 22.3919C36.4604 22.7612 35.9596 22.9686 35.4375 22.9686H11.3203L19.7679 31.4194C20.1377 31.7893 20.3455 32.2909 20.3455 32.814C20.3455 33.337 20.1377 33.8386 19.7679 34.2085C19.398 34.5784 18.8964 34.7861 18.3734 34.7861C17.8503 34.7861 17.3487 34.5784 16.9788 34.2085L5.16633 22.396C4.98279 22.2131 4.83716 21.9958 4.7378 21.7565C4.63843 21.5171 4.58728 21.2606 4.58728 21.0015C4.58728 20.7424 4.63843 20.4858 4.7378 20.2465C4.83716 20.0072 4.98279 19.7898 5.16633 19.6069L16.9788 7.79444C17.1617 7.6109 17.3791 7.46527 17.6184 7.3659C17.8577 7.26653 18.1142 7.21538 18.3734 7.21538C18.6325 7.21538 18.889 7.26653 19.1284 7.3659C19.3677 7.46527 19.585 7.6109 19.7679 7.79444Z" fill="white"/></svg>';

    arrowRight = '<svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 42 42" fill="none"><path d="M22.2322 34.2056C22.0487 34.0227 21.9031 33.8053 21.8037 33.566C21.7043 33.3267 21.6532 33.0701 21.6532 32.811C21.6532 32.5519 21.7043 32.2954 21.8037 32.056C21.9031 31.8167 22.0487 31.5994 22.2322 31.4165L30.6798 22.9689H6.56262C6.04047 22.9689 5.53971 22.7615 5.1705 22.3923C4.80129 22.0231 4.59387 21.5223 4.59387 21.0002C4.59387 20.478 4.80129 19.9773 5.1705 19.6081C5.53971 19.2388 6.04047 19.0314 6.56262 19.0314H30.6798L22.2322 10.5806C21.8624 10.2107 21.6546 9.70908 21.6546 9.18603C21.6546 8.66298 21.8624 8.16135 22.2322 7.7915C22.6021 7.42165 23.1037 7.21387 23.6268 7.21387C24.1498 7.21387 24.6514 7.42165 25.0213 7.7915L36.8338 19.604C37.0173 19.7869 37.163 20.0042 37.2623 20.2435C37.3617 20.4829 37.4128 20.7394 37.4128 20.9985C37.4128 21.2576 37.3617 21.5142 37.2623 21.7535C37.163 21.9928 37.0173 22.2102 36.8338 22.3931L25.0213 34.2056C24.8384 34.3891 24.621 34.5347 24.3817 34.6341C24.1424 34.7335 23.8859 34.7846 23.6268 34.7846C23.3676 34.7846 23.1111 34.7335 22.8718 34.6341C22.6325 34.5347 22.4151 34.3891 22.2322 34.2056Z" fill="white"/></svg>';

    constructor(){
        this.initSwiperArrows();
        this.initBannerSlider();
        this.initImageContentSlider();
        this.initCardsSlider();
        this.initLogosTickerSlider();
        this.initQuotesSlider();
    }

    initSwiperArrows(){
        const nextArrows = document.querySelectorAll('.swiper-button-next'),
              prevArrows = document.querySelectorAll('.swiper-button-prev');

        nextArrows.forEach(item => {
            if(!item.innerHTML) {
                item.innerHTML = this.arrowRight;
            }
        });

        prevArrows.forEach(item => {
            if(!item.innerHTML) {
                item.innerHTML = this.arrowLeft;
            }
        });
    }

    initBannerSlider(){
        const bannerSlider = new Swiper('.banner-slider', {
            loop: true,
            speed: 800,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 5000,
            },
        });
    }

    initImageContentSlider(){
        const imageContentSlider = new Swiper('.image-content-slider', {
            loop: true,
            speed: 800,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            autoplay: {
                delay: 5000,
            },
        });
    }

    initCardsSlider(){
        const cardsSlider = new Swiper('.cards-slider .swiper', {
            loop: true,
            speed: 800,
            slidesPerView: 3,
            spaceBetween: 64,
            navigation: {
                nextEl: ".cards-slider .swiper-button-next",
                prevEl: ".cards-slider .swiper-button-prev",
            },
            breakpoints: {
                320: {

                },
                578: {

                },
                768: {

                },
                992: {
                    spaceBetween: 32,
                },
                1300: {
                    spaceBetween: 64,
                },
            },
        });
    }

    initLogosTickerSlider(){
        const tickers = document.querySelectorAll('.logos-ticker');
        tickers.forEach((container, index) => {
            container.swiper = new Swiper(container, {
                slidesPerView: 6,
                spaceBetween: 80,
                loop: true,
                allowTouchMove: false,
                autoplay: {
                    delay: 0,
                    disableOnInteraction: false,
                },
                speed: 3000,
                breakpoints: {
                    320: {
                        slidesPerView: 2,
                    },
                    578: {
                        slidesPerView: 3,
                    },
                    768: {
                        slidesPerView: 4,
                    },
                    992: {
                        slidesPerView: 5,
                    },
                    1200: {
                        slidesPerView: 6,
                    },
                },
            });
        });

    }

    initQuotesSlider(){
        const quotesSlider = new Swiper('.quotes-slider', {
            loop: true,
            speed: 800,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            // autoplay: {
            //     delay: 5000,
            // },
        });
    }
}

document.addEventListener('DOMContentLoaded', function(){
    const siteSlider = new SiteSliders();
});