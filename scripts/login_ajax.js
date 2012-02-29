$(document).ready(function() {

	$("#form").submit(function() {

        uname=$("#uname").val();
        pwd=$("#pwd").val();

		$.ajax({
			type: "POST",
			url: "check_login.php",
			data: "uname="+uname+"&pwd="+pwd,
			success: function(response)
			{
				if(response == 'success') {
					document.location.href = 'webtop.php';
				}
				else	{
					$("#login_response").text("Invalid username and/or password.");
					return false;}
			}
		});
		return false;
	});
});
