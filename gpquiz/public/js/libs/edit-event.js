
$( document ).ready(function() {
	$(".default .box-join .join").bind({
		click: function(){
			$(".default").modal('hide');
			$(".create-event.edit").modal('show');
		}
	})
});