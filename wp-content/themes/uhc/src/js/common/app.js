document.addEventListener('DOMContentLoaded', function(){
	faq();
	quotesSliderSection();
});

function faq(){
	const faqs = document.querySelectorAll('.faq .faq-item');

	if(!faqs.length) return false;

	faqs.forEach(faqItem => {
		faqItem.querySelector('.faq-item__head').addEventListener('click', function (e) {
			e.preventDefault();

			if(faqItem.classList.contains('active')){
				faqItem.classList.remove('active');
			}else{
				faqs.forEach(item => {
					item.classList.remove('active');
				});

				faqItem.classList.add('active');
			}
		})
	});
}

function quotesSliderSection(){
	const buttons = document.querySelectorAll('.quotes-button');

	if(!buttons.length) return false;

	buttons.forEach(button => {
		button.addEventListener('click', (e) => {
			e.preventDefault();

			let section = button.closest('.quotes-slider-section'),
				bottomPosition = section.offsetTop + section.offsetHeight;


			window.scrollTo({
				top: bottomPosition,
				behavior: 'smooth'
			});
		});
	});
}