document.addEventListener('DOMContentLoaded', function(){
	setBodyPaddingByHeader();

	window.addEventListener('resize', setBodyPaddingByHeader);
});

function setBodyPaddingByHeader(){
	const header = document.querySelector('.header');

	if(!header) return false;

	let headerHeight = header.offsetHeight;

	document.querySelector('body').style.paddingTop = headerHeight + 'px';
}