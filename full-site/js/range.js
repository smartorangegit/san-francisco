function AddFilter(){

	var filterBy=['floor','area'];
	var slidersArray=[];
	var rangesArray=[];
	var filteredButHidden = [];
	var showPlansOnPage = 12;

	for(var i=0; i<filterBy.length; i++){
		rangesArray[i]= $("#"+filterBy[i]);
	}

	// Checkboxes start
	// Detect change in checkboxes if at least one checkbox selected then it will filter results start
	var roomsUnchecked = true;
	var buildingsUnchecked = true;
	var sectionsUnchecked = true;
	
	$('.checkboxes__rooms').change(function() {
		roomsUnchecked = checkedCheckBoxes($(this).children('input'));
	});
	$('.checkboxes__building').change(function() {
		buildingsUnchecked = checkedCheckBoxes($(this).children('input'));
	});
	$('.checkboxes__section').change(function() {
		sectionsUnchecked = checkedCheckBoxes($(this).children('input'));
	});
	function resetCheckboxes() {
		roomsUnchecked = true;
		buildingsUnchecked = true;
		sectionsUnchecked = true;
		$('input[type="checkbox"]').each(function(index, checkbox) {
			$(checkbox).prop('checked', false);
		});
	}
	function checkedCheckBoxes(inputs) {
		for(var i = 0; i < inputs.length; i++) {
		  if(inputs[i].checked) {
			return false;
		  } 
		}
		return true;
	}
    //This function creates array from checked checkboxes later you compare result against it 
    function createCheckboxArray(jqSelector) {
		var arr = []
		$.each(jqSelector, function(i, el) {
		  if(el.checked) {
			arr.push($(el).val());
		  }
		});
		return arr;
	} //end createCheckboxArray
	$('.checkbox__item').change(updateFilterResults)
	// Checkboxes end

	// Manual area and floor input start
	$('.slider__currentMax').change(function() {
		var max = parseInt($(this).attr('max'));
		var min = parseInt($(this).attr('min'));
		var slider = $(this).siblings('.irs-hidden-input').data("ionRangeSlider");
		if($(this).val() > max) {
		  $(this).val(max);
		} else if($(this).val() < min) {
		  $(this).val(max);
		} else if(parseInt($(this).val()) < parseInt($(this).siblings('.slider__currentMin').val())) {
		  $(this).val(max);
		}
		slider.update({
		  from: $(this).siblings('.slider__currentMin').val(),
		  to: $(this).val()
		})
	  });
  
	$('.slider__currentMin').change(function() {
		var max = parseInt($(this).attr('max'));
		var min = parseInt($(this).attr('min'));
		var slider = $(this).siblings('.irs-hidden-input').data("ionRangeSlider");
		if($(this).val() < min) {
		  $(this).val(min);
		} else if($(this).val() > max) {
		  $(this).val(min);
		} else if(parseInt($(this).val()) > parseInt($(this).siblings('.slider__currentMax').val())) {
		  $(this).val(min);
		}
		slider.update({
		  from: $(this).val(),
		  to: $(this).siblings('.slider__currentMin').val()
		})
	  });
	// Manual input end

	// Sliders initialisation start
	var n=[];
	for(var i=0; i<filterBy.length; i++){
		str=document.getElementById(filterBy[i]+"_min_max").value;
		console.log(document.getElementById(filterBy[i]+"_min_max"));

		n[filterBy[i]]=str.split('/');
		n[filterBy[i]][0]=Number(n[filterBy[i]][0]);
		n[filterBy[i]][1]=Number(n[filterBy[i]][1]);

		rangesArray[i].ionRangeSlider({
		min: n[filterBy[i]][0],
		max: n[filterBy[i]][1],
		from: n[filterBy[i]][0],
		to: n[filterBy[i]][1],
		type: 'double',
		hide_min_max: true,
		onChange: function(data) {
			updateSliderDisplayValues(data);
			$('.result__list').addClass('blured');
		},
		onFinish: function(data) {
			$('.result__list').removeClass('blured');	
			updateSliderDisplayValues(data);
			updateFilterResults()
		},
		onUpdate: function(data) {
			updateSliderDisplayValues(data);
			updateFilterResults();
		}
		});
	}
	// Sliders initialisation end

	// Reset sliders and checkboxes start
	$('.js-reset-filter-button').click(function(e) {
		e.preventDefault();
		for(var i=0; i<filterBy.length; i++){
			slidersArray[i] = rangesArray[i].data("ionRangeSlider");
		}
		slidersArray[0].update({
			from: $('.slider__currentMinfloor').prop('min'),
			to: $('.slider__currentMinfloor').prop('max')
		});
		slidersArray[1].update({
			from: $('.slider__currentMaxarea').prop('min'),
			to: $('.slider__currentMaxarea').prop('max')
		});

		resetCheckboxes();
		updateFilterResults();
	});
	// Reset sliders and checkboxes end
	
	// Load more plans start
	$('.js-load-more-button').click(function(e) {
		e.preventDefault();
		for(var i = 0; i < showPlansOnPage; i++) {
			if(filteredButHidden.length > 0) {
				filteredButHidden[0].style.display = 'block';
				filteredButHidden.shift();
			} else {
				break;
			}
		}
	});
	// Load more plans end

	function updateSliderDisplayValues(data) {
        $(data.input).siblings('.slider__currentMin').val(data.from + '');
        $(data.input).siblings('.slider__currentMax').val(data.to + '');
    }

	function updateFilterResults() {
		var hidden = 0;
		var visible = 0;
		var vals=[];
		var data = $('.sort');
		var checkedRooms = createCheckboxArray($('.checkbox__room'));
		var checkedBuildings = createCheckboxArray($('.checkbox__building'));
		var checkedSections = createCheckboxArray($('.checkbox__section'));
		filteredButHidden = [];

		for(var i=0; i<filterBy.length; i++){
			vals[i]=$("#"+filterBy[i]).data("ionRangeSlider");
		}

		for(var i=0; i<data.length; i++){
			if (data[i].dataset.floor>=vals[0].old_from && data[i].dataset.floor<=vals[0].old_to &&
				data[i].dataset.area>=vals[1].old_from && data[i].dataset.area<=vals[1].old_to &&
				(roomsUnchecked || checkedRooms.indexOf(data[i].dataset.room)!==-1) &&
				(buildingsUnchecked || checkedBuildings.indexOf(data[i].dataset.build)!==-1) &&
				(sectionsUnchecked || checkedSections.indexOf(data[i].dataset.sec)!==-1))
			{
				data[i].style.display='block';
				visible++;
				if(visible > showPlansOnPage) {
					data[i].style.display='none';
					filteredButHidden.push(data[i]);
				}
			} else {
				data[i].style.display='none';
				hidden++;
			}
		}
		// check if have results
		if(hidden === data.length) {
			$('.js-no-results').removeClass('no-results_hidden').addClass('no-results_visible');
		} else {
			$('.js-no-results').removeClass('no-results_visible').addClass('no-results_hidden');
		}
	}; // end updateInputs

	updateFilterResults(); //filter when loading page

} //end AddFilter
AddFilter();
