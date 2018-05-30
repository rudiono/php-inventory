(function($){
	$(document).ready(function(){

		// Show Password
		$('#show-password').click(function()
		{
			if ($(this).hasClass('fa-eye'))
			{
				$('#login-password').attr('type', 'text');
				$(this).removeClass('fa-eye');
				$(this).addClass('fa-eye-slash');
			} else {
				$('#login-password').attr('type', 'password');
				$(this).removeClass('fa-eye-slash');
				$(this).addClass('fa-eye');
			}
		})

		// MENU
		$('#bars').click(function()
		{
			$('#menu-list').slideToggle('fast');
			return false;
		});
	});
})(jQuery);
