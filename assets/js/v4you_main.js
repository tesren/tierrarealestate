if ($(window).width() < 768) {
    $('#tr-logo-header-grande').addClass('d-none');
    $('.tr-header-brand').removeClass('d-none');

    $('#tr-boton-nosotros').removeClass('d-none');
    $('#tr-nosotros-grande').addClass('d-none');
}
if($(window).width() > 768) {
    $('#tr-logo-header-grande').removeClass('d-none');
    $('.tr-header-brand').addClass('d-none');

    $('#tr-boton-nosotros').addClass('d-none');
    $('#tr-nosotros-grande').removeClass('d-none');   
}

if($(window).width() > 2048){
    $('#tr-contenedor-resoluciones-grandes').addClass('container');

    $('.labels-form-small').addClass('d-none');
    $('.labels-form-grande').removeClass('d-none');
}else{
    $('#tr-contenedor-resoluciones-grandes').removeClass('container');

    $('.labels-form-small').removeClass('d-none');
    $('.labels-form-grande').addClass('d-none');
}

//slide de imagenes
document.addEventListener( 'DOMContentLoaded', () => wait(1700).then(() =>{
	var secondarySlider = new Splide( '#secondary-slider', {
		fixedWidth  : 100,
		height      : 60,
		gap         : 10,
        pagination : false,
		cover       : true,
		isNavigation: true,
		focus       : 'center',
		breakpoints : {
			'600': {
				fixedWidth: 66,
				height    : 40,
			}
		},
	} ).mount();
	
	var primarySlider = new Splide( '#primary-slider', {
		type       : 'fade',
		heightRatio: 0.5,
		pagination : false,
		arrows     : false,
		cover      : true,
        visibility : true,
	} ); // do not call mount() here.
	
	primarySlider.sync( secondarySlider ).mount();
} ));


//animacion de carga
const wait = (delay = 0) =>
  new Promise(resolve => setTimeout(resolve, delay));

const setVisible = (elementOrSelector, visible) => 
  (typeof elementOrSelector === 'string'
    ? document.querySelector(elementOrSelector)
    : elementOrSelector
  ).style.display = visible ? 'block' : 'none';

setVisible('.tr-page', false);
setVisible('#loading-logo', true);
setVisible('#loading', true);

document.addEventListener('DOMContentLoaded', () =>
  wait(1500).then(() => {
    setVisible('.tr-page', true);
    setVisible('#loading', false);
    setVisible('#loading-logo', false);
  }));
    
    
  //mapa
    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 12,
          center: { lat: 20.760950, lng: -105.419700 }, 
        });
        // Create an array of alphabetical characters used to label the markers.
        const labels = "NSG";
        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.
        const markers = locations.map((location, i) => {
          return new google.maps.Marker({
            position: location,
            label: labels[i % labels.length],
          });
        });
    
        new MarkerClusterer(map, markers, {
            imagePath:
              "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m",
          });
        
      }
      const locations = [
        { lat: 20.7491092, lng: -105.4317617 },
        { lat: 20.7600277, lng: -105.4784779 },
        { lat: 20.7101048, lng: -105.286734 },
      ];

      //carrusel de cards
      let items = document.querySelectorAll('#recipeCarousel .carousel-item')

        items.forEach((el) => {
            const minPerSlide = 4
            let next = el.nextElementSibling
            for (var i=1; i<minPerSlide; i++) {
                if (!next) {
                    
                    next = items[0]
                }
                let cloneChild = next.cloneNode(true)
                el.appendChild(cloneChild.children[0])
                next = next.nextElementSibling
            }
        })
    
    /**Contact form submission */

    $('#osContactForm').on('submit', function (e) {
        e.preventDefault();

        $('.has-error').removeClass('has-error');
        $('.js-show-feedback').removeClass('js-show-feedback');

        var form = $(this);

        var name = form.find('#name').val(),
            email = form.find('#email').val(),
            message = form.find('#message').val(),
            phone = form.find('#phone').val(),
            ajaxurl = form.data('url');

        if (name === '') {
            $('#name').parent('.col').addClass('has-error');
            return;
        }

        if (email === '') {
            $('#email').parent('.col').addClass('has-error');
            return;
        }

        if (message === '') {
            $('#message').parent('.col').addClass('has-error');
            return;
        }

        form.find('input, button, textarea').attr('disabled', 'disabled');

        $('.js-form-submission').addClass('js-show-feedback');

        $.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                name: name,
                email: email,
                phone: phone,
                message: message,
                action: 'v4you_save_contact'
            },

            error: function (response) {
                $('.js-form-submission').removeClass('js-show-feedback');
                $('.js-form-error').removeClass('js-show-feedback');
                form.find('input, button, textarea').removeAttr('disabled');
            },
            success: function (response) {
                if (response == 0) {
                    setTimeout(function () {
                        $('.js-form-submission').removeClass('js-show-feedback');
                        $('.js-form-error').removeClass('js-show-feedback');
                        form.find('input, button, textarea').removeAttr('disabled');
                    }, 1500);


                } else {
                    setTimeout(function () {
                        $('.js-form-submission').removeClass('js-show-feedback');
                        $('.js-form-success').removeClass('js-show-feedback');
                        form.find('input, button, textarea').removeAttr('disabled').val('');
                    }, 1500);

                }
            }
        });

        console.log('Form submited');
    });

    

