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

document.addEventListener("DOMContentLoaded", function () {

	function initMap(el) {
		let markers = el.querySelectorAll('.marker'),
			zoomValue = parseInt(el.getAttribute('data-zoom')) || 16, // Приведение zoom к числу
			mapArgs = {
				zoom: zoomValue,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				disableDefaultUI: true
			};

		let map = new google.maps.Map(el, mapArgs);

		// Add markers.
		map.markers = [];
		markers.forEach(function (marker) {
			initMarker(marker, map);
		});

		centerMap(map);

		return map;
	}

	function initMarker(marker, map) {
		let lat = marker.getAttribute('data-lat'),
			lng = marker.getAttribute('data-lng'),
			latLng = {
				lat: parseFloat(lat),
				lng: parseFloat(lng)
			};

		let mapMarker = new google.maps.Marker({
			position: latLng,
			map: map
		});

		map.markers.push(mapMarker);

		if (marker.innerHTML) {
			let infowindow = new google.maps.InfoWindow({
				content: marker.innerHTML
			});

			mapMarker.addListener('click', function () {
				infowindow.open(map, mapMarker);
			});
		}
	}

	function centerMap(map) {
		let bounds = new google.maps.LatLngBounds();
		map.markers.forEach(function (marker) {
			bounds.extend({
				lat: marker.position.lat(),
				lng: marker.position.lng()
			});
		});

		if (map.markers.length === 1) {
			map.setCenter(bounds.getCenter());
		} else {
			map.fitBounds(bounds);
		}
	}

	const pageMaps = document.querySelectorAll('.acf-map');

	if(pageMaps.length){
		pageMaps.forEach(function (el) {
			initMap(el);
		});
	}
});