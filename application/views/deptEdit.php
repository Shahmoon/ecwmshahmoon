<html>
<head>
	<link rel="stylesheet" href="<?php echo base_url('css/styles.css') ?>" type="text/css" media="screen"> 
</head>
<body>
<form action="/w1183443/index.php/person/updtitle" method="POST">
	<?php include_once("menu_template.php") ?><br/>
employee id: 
<input type=text name="id"><br />
change title to: 
<select name="title">
<option value="Assistant Engineer">Assistant Engineer</option>
<option value="Engineer">Engineer</option>
<option value="Senior Engineer">Senior Engineer</option>
<option value="Senior Staff">Senior Staff</option>
<option value="Staff">Staff</option> 
</select><br />
<input type="submit" value="submit"/>
<br />
</body>
</html>