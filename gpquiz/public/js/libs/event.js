
$( document ).ready(function() {

	$('.modal').on('show.bs.modal', function (event) {
        var idx = $('.modal:visible').length;
        $(this).css('z-index', 1040 + (10 * idx));
    });

    $('.modal').on('shown.bs.modal', function (event) {
        var idx = ($('.modal:visible').length) - 1; // raise backdrop after animation.
        $('.modal-backdrop').not('.stacked').css('z-index', 1039 + (10 * idx));
        $('.modal-backdrop').not('.stacked').addClass('stacked');
    });

    $('.modal[tabindex=-1]').on('hidden.bs.modal', function (event) {
       $("body").addClass("modal-open");
    });

	// Show modal of events
	$(".box-my-events").bind({
		click:function(){
			if($(this).hasClass("mine")){
				$('#default-event').modal('show');
			} else {
				$('#event').modal('show');
			}
		}
	});


	// Prevent button to make event
	$(".bottom-join").bind({
		click:function(e){
			e.stopPropagation();
			
			// Can made ajax call here.
			//on return $(this).addClass("joined")
		}
	});

	//-- Midia gallery
	$("#event .midias[image]").bind({
		click: function(){
			//$('#event').modal('hide');
			$('#photo-preview').modal('show');
			$('#photo-preview img').attr("src", "../images/gallery/" + $(this).attr("image") + ".jpg");
		}
	});

	$("#event .midias[video]").bind({
		click: function(){
			var video = $(this).attr("video").replace("https://www.youtube.com/watch?v=", "")
			$('#video-preview iframe').attr("src", "//www.youtube.com/embed/" + video);
			//$('#event').modal('hide');
			$('#video-preview').modal('show');
		}
	});

	$('#video-preview').on('hidden.bs.modal', function () {
	  $('#video-preview iframe').attr("src", "");
	  $('#event').modal('show');
	})

	// Show invite friends
	$("#event .invite-friends").bind({
		click: function(){
			//$('#event').modal('hide');
			$('#invite-friends').modal('show');
		}
	});

	// Show invite friends
	$(".default .invite-friends").bind({
		click: function(){
			//$('.default').modal('hide');
			$('#invite-friends').modal('show');
		}
	});

	$("#event .friends .show-all").bind({
		click: function(){
			$('#find-friends').modal('show');
		}
	});

	$("#event .friends .more").bind({
		click: function(){
			$('#find-friends').modal('show');
		}
	});

	// --More comments
	$("#event .comments .show-all").bind({
		click: function(){
			var stringBuilder = "";

			stringBuilder += "<tr> ";
            stringBuilder += "<td width='30'> ";
            stringBuilder += "  <a href='#''><img class='photo-peoples' src='../images/notifications/general/img1.jpg' alt='Photo Peoples' /></a> ";
            stringBuilder += "</td> ";
            stringBuilder += "<td> ";
            stringBuilder += "  <a href='#''>John Edgerton </a> ";
            stringBuilder += "  <br/> ";
            stringBuilder += "  Wow good luck!Crossing my fingers for you. ";
            stringBuilder += "</td> ";
          	stringBuilder += "</tr> ";
          	$("#event .comments table").append(stringBuilder);
          	$("#event .comments table").append(stringBuilder);
          	$("#event .comments table").append(stringBuilder);
          	$("#event .comments table").append(stringBuilder);
          	$("#event .comments table").append(stringBuilder);
          	$("#event .comments table").append(stringBuilder);
			
		}
	});
	
});