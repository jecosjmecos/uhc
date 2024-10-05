document.addEventListener('DOMContentLoaded', function(){
	setBodyPaddingByHeader();
	burgerMenu();

	window.addEventListener('resize', setBodyPaddingByHeader);
});

function setBodyPaddingByHeader(){
	const header = document.querySelector('.header');

	if(!header) return;

	let headerHeight = header.offsetHeight,
		mobileMenuHead = document.querySelector('.mobile-menu-area-head'),
		mobileMenuBody = document.querySelector('.mobile-menu-area-body');

	document.querySelector('body').style.paddingTop = headerHeight + 'px';
	if(mobileMenuHead) mobileMenuHead.style.height = headerHeight + 'px';
	if(mobileMenuBody) mobileMenuBody.style.paddingTop = headerHeight + 'px';
}

function burgerMenu(){
	const burger = document.querySelector('#headerBurger');

	if(!burger) return;

	burger.addEventListener('click', function(e){
		e.preventDefault();

		document.body.classList.toggle('header-menu-opened');
	})
}
