<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Demo FlexCode SDK</title>

<!-- Bootstrap -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/ajaxmask.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.timer.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/ajaxmask.js"></script>

<script type="text/javascript">
	function load(page) {
	$.ajax({
		type		: 'GET',
		url		: page,
		success	: function(data) {
			try {
				$('#content').html(data);
			} catch (err) {
				alert(err);
			}
		}
	});
}

function push(page) {

	$.ajax({
		beforeSend	: function() {
			$('.help-blok').remove();
		},
		type		: 'GET',
		url		: page,
		success	: function(data) {
			try {

				console.log(data);

				console.log('Data has been pushed....');

				var res = jQuery.parseJSON(data);

				if (res.result) {

					$.each(res, function(key, value) {

						if (key == 'reload') {

							load(value);

							alert('Data saved..');

						}

					});

				} else if (res.result == false) {

					$.each(res, function(key, value) {

						if (key != 'result' && key != 'server' && key != 'notif' ) {

							$('#'+key).after("<span class='help-blok'>"+value+"</span>")

						} else if (key == 'server') {

							alert(value);

						}
					});

				}

			} catch (err) {

				alert(err.message);

			}
		}
	});

}

</script>

<link type="image/gif" href="assets/image/favicon.gif" rel="icon">