  
  // Time selector init
  function initTimer()
	{
		var times = [];
		for (var i=0;i<24;i++) {
			for (var j=0;j<4;j++) {
				var hour = (i>12?(i-12)+"":(i==0?"12":i)+"");
				var mins = "00"; var AMPM = (i>12?" PM":" AM");
				if(j==0) { mins="00"; } 
				if(j==1) { mins="15"; } 
				if(j==2) { mins="30"; } 
				if(j==3) { mins="45"; }
				times.push(hour+":"+mins+AMPM);
			}
		}
		 
		$('input.time').val(times[0]);
		
		// initialize the autocompletes
		$('input.time').autocomplete({
				source: times,
				minLength: 0,
				delay: 0,
				autoFocus: true
			})
      .bind({
        focus:function(){
          $(this).val("");
          $(this).autocomplete("search","");
        },
        blur:function(){
          if($(this).val().length< 1){
            $(this).val(times[0]);
          }
        }
      });
	}

  $( document ).ready(function() {
	// Init timer objects
	initTimer();
	
	// Function to detect scroll.
    $(window).scroll(function (event) {
    
    var negativePositionToDisplay = 100;

    /* Check the location of each desired class box-left element */
    $('.box-left').each( function(i){

        var bottom_of_object = $(this).parent().position().top + $(this).outerHeight();
        var bottom_of_window = ($(window).scrollTop() + $(window).height()) + negativePositionToDisplay;

        /* If the object is completely visible in the window, fade it in */
        if( bottom_of_window > bottom_of_object ){
            $(this).addClass("animarLeft");
            $(this).removeClass("box-left");
        }

    });
	
	/* Check the location of each desired class box-center element */
    $('.box-center').each( function(i){
        var bottom_of_object = ($(this).parent().position().top + $(this).outerHeight());
        var bottom_of_window = ($(window).scrollTop() + $(window).height()) + negativePositionToDisplay;

        /* If the object is completely visible in the window, fade it in */
        if( bottom_of_window > bottom_of_object ){
            $(this).addClass("animarCenter");
            $(this).removeClass("box-center");
        }

    }); 

	/* Check the location of each desired class box-center element */
    $('.box-right').each( function(i){ 

        var bottom_of_object = $(this).parent().position().top + $(this).outerHeight();
        var bottom_of_window = ($(window).scrollTop() + $(window).height()) + negativePositionToDisplay;

        /* If the object is completely visible in the window, fade it in */
        if( bottom_of_window > bottom_of_object ){
            $(this).addClass("animarRight");
            $(this).removeClass("box-right");
        }

    }); 

    });


	// Drop down prevent scroll and animation to menu
	$('.dropdown-menu a[data-toggle="tab"]').click(function (e) {
		$(this).tab('show');
		e.stopPropagation();
		e.preventDefault();
	});
  
	// Protect active tabs on father element
	$('.dropdown').on('hide.bs.dropdown', function () {
	  $(this).removeClass("active");
	})

	// Start date picker
	$('input.date').datepicker({format: 'mm/dd/yy'});
	$('input.date').datepicker('setDate', new Date());

  // Button of search (Of top)
  $(".search-button").bind({
    click:function(){
      //$(".no-search").hide();
      $(".dates-from-to b").text("From " + $($(".search-date input")[0]).val() + " " + $($(".time")[0]).val() + " to " + $($(".search-date input")[1]).val() + " " + $($(".time")[1]).val());
      $("#dates-week").hide();
      $(".dates-words").removeClass("open-search");
      $(".dates-from-to").addClass("open-search");
    }
  });
  
  // Detect events on search bar (On top)
  $(".options-advanced .search").bind({
    click:function(){
      $(".options-advanced").hide();
      $(".search-advanced").fadeIn();
      $(".search-advanced input.search-box").focus();
    }
  });

   // Detect 
  $(".options-advanced .calendar").bind({
    click:function(){
      $("#create-event").modal('show');
    }
  });

  // Input to search
  $(".no-search input").bind({
    click:function(){
      $(".dates-from-to").removeClass("open-search");
      $(".dates-words").removeClass("open-search");
      $("#dates-week").show();
    }
  });


  // Input of search (On Bar search my events)
  $(".search-advanced input.search-box").keyup(function (e) {
    if (e.keyCode == 13) {
        if($(".search-advanced .search-box").val().length > 0){
              $(this).parent().hide();
              $("#dates-week").hide();
              $(".dates-from-to").removeClass("open-search");
              $(".dates-words b").text($(".search-advanced .search-box").val());
              $(".options-advanced").fadeIn();
              $(".dates-words").addClass("open-search");
              //$(".searched").fadeIn();
          } else {
            $(this).parent().hide();
            $(".options-advanced").fadeIn();
          }
    }
  });
  
  // Button to search (Of Bar search my events)
  $(".search-advanced .button-search-box").bind({
    click:function(){
           if($(".search-advanced .search-box").val().length > 0){
              $(this).parent().hide();
              $("#dates-week").hide();
              $(".dates-from-to").removeClass("open-search");
              $(".dates-words b").text($(".search-advanced .search-box").val());
              $(".options-advanced").fadeIn();
              $(".dates-words").addClass("open-search");
              //$(".searched").fadeIn();
          } else {
            $(this).parent().hide();
            $(".options-advanced").fadeIn();
          }
        }
      });
  
  // Right Search Box Events
  $("li input.search-box").bind({
    keypress: function(){
       if($(this).val().length > 1){
        $(".search-autocomplete").show();
      }
    },
    keyup: function(){
      if($(this).val().length < 1){
        $(".search-autocomplete").hide();
      }
    },
    blur: function(){
      $(".search-autocomplete").hide();
    },
    focus: function(){
      if($(this).val().length > 2){
        $(".search-autocomplete").show();
      }
    }
  });

});