$(document).ready(function(){ 
	showComments();
	$('#commentForm').on('submit', function(event){
		event.preventDefault();
		var formData = $(this).serialize();
		$.ajax({
			url: "comment/comments.php",
			method: "POST",
			data: formData,
			dataType: "JSON",
			success:function(response) {
				if(!response.error) {
					$('#commentForm')[0].reset();
					$('#commentId').val('0');
					$('#message').html(response.message);
					showComments();
				} else if(response.error){
					$('#message').html(response.message);
				}
			}
		})
	});	
	$(document).on('click', '.reply', function(){
		var commentId = $(this).attr("id");
		$('#commentId').val(commentId);
		$('#name').focus();
	});
});
// function to show comments
function showComments()	{
	var filmid = $('#filmid').val();
	var useravatar = $('#useravatar').val();
	$.ajax({
		url:"comment/show_comments.php",
		method:"POST",
		data: {
			filmid: filmid,
			useravatar: useravatar,
		},
		success:function(response) {
			$('#showComments').html(response);
		}
	})
}
