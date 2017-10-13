function initSlider(){

	console.log("init Slider");

	//Store frequently elements in variables
	var slider  = $('#slider');
		
	//Call the Slider
	slider.slider({
		//Config
		orientation:"vertical",
		range: "min",
		min: 2,
		max:20,
		value: 2,

		//Slider Event
		slide: function(event, ui) { //When the slider is sliding
			
			//speedToBe = ui.value;

			$({ n: star_speed }).animate({ n: ui.value}, {
			    duration: 5000,
			    step: function(now, fx) {
			        star_speed = now;
			    }
			});

		},
	});
};
