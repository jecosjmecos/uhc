document.addEventListener('DOMContentLoaded', function(){
	faq();
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