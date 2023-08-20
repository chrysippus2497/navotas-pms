
$(function()
{
	$('#log-in').click(function(event){
		event.preventDefault();

		$.post('admin/includes/login.php',$('#log-in-form').serialize(),function(resp)
		{
			if (resp['status'] == true)
			{
				Swal.fire({
					icon: 'success',
					title: 'Login Successfuly!.',
					timer: 2000
				  }).then(function() {
					window.location = "admin/";
				  
			   });
			}
			else
			{
				var htm = '<button data-dismiss="alert" class="close" type="button"></button>';
				$.each(resp['msg'],function(index,val){
					htm += val+" <br>";
					});
				$("#error-msg").html(htm);
				$("#error-msg").show();	
		
			}
		},'json');
	});
});