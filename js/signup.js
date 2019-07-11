$(function()
{
	$('#sign-up').click(function(event){
		$("#error-msg").html('');
		$("#success-msg").html('');
		event.preventDefault();
		$.post('include/process.php',$('#sign-up-form').serialize(),function(resp)
		{
			if (resp['status'] == true)
			{
				$("#success-msg").html(resp['msg']+" <a href='index.php'>Please login</a>");
				$("#success-msg").show();
			}
			else
			{
				var htm = '<button data-dismiss="alert" class="close" type="button">×</button>';
				$.each(resp['msg'],function(index,val){
					htm += val+" <br>";
					});
				$("#error-msg").html(htm);
				$("#error-msg").show();	
			}
		},'json');
	});

});




