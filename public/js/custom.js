jQuery(document).ready(function() {
	jQuery(document).on("click", ".delete_message a", function() {
		var curElement = jQuery(this).parent().parent().parent();
		if (confirm("Are you sure, you want to delete this message?")) {
			var deleteId = jQuery(this).attr("id");
			jQuery.ajaxSetup({
			  headers: {
				  'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
			  }
		  });
		   jQuery.ajax({
			  url: delete_url,
			  method: 'post',
			  data: {
				 id: deleteId
			  },
			  success: function(result){
				 if(!result.success){
					alert(result.message);
				 }else{
					curElement.fadeOut("slow");
				 }
			  }
			});
		} else {
			return false;
		}
	})
})