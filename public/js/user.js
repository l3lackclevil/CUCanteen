$(document).ready(function() {

});

var doLogin = function() {
	$.ajax({
		url: '/user',
		type: 'POST',
		dataType: 'json',
		data: {
			_token: $('meta[name="csrf-token"]').attr('content'),
			a: $('input[name="user"]').val(),
			b: $('input[name="pass"]').val(),
		},
	})
	.done(function(data) {
		console.log(data);
		if (data.success == 'ok')
		{
			$('a[data-target="#login-modal"]').append(data.name);
			$('#login-modal').modal('hide');
		}
		else
		{
			//do someting
		}
	}).fail(function(html, statusCode) {
		errorShow(html.responseText);
	});

	return false;
}