<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<title>Registration</title>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js" type="text/javascript"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>

</head>
<body>
	<div class="signin-form">
		<div class="container">
			<form class="form-signin" method="post" id="register-form" name="my_form">
				<h2 class="form-signin-heading">Додати користувача</h2><hr />
				<div id="error">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" placeholder="ПІБ" name="user_name" id="user_name" style="width:350px;"/>
				</div>
				<div class="form-group">
					<input type="email"  class="form-control" placeholder="Електронна пошта" name="user_email" id="user_email" style="width:350px;"/>
					<span id="check-e"></span>
				</div>
				<div class="form-group" id="region_dv_1">
					<select class="chosen-select" id="region_ch_1" title="Область" data-placeholder="Область"
					name="region_1_sel" style="width:350px;">
					<option value=''></option>
				</select>
			</div>
			
			<div class="form-group" id="region_dv_2">
				<select class="chosen-select" id="region_ch_2" title="Район" data-placeholder="Район" 
				name="region_2_sel" style="width:350px;">
				<option value=''></option>
			</select>
		</div>
		
		<div class="form-group" id="region_dv_3">
			<select class="chosen-select" id="region_ch_3" title="Населений пункт" data-placeholder="Населений пункт"  
			name="region_3_sel" style="width:350px;">
			<option value=''></option>
		</select>
	</div>

	<hr/>
	<div class="form-group">
		<button type="submit" class="btn btn-default" name="btn-save" id="btn-submit" >
			<span class="glyphicon glyphicon-log-in"></span> &nbsp; Зберегти дані
		</button>
	</div>
</form>
</div>
</div>

</body>
</html>