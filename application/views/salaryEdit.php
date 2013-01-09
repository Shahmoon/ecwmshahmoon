<html>
<head>
		<link rel="stylesheet" href="<?php echo base_url('css/styles.css') ?>" type="text/css" media="screen"> 
</head>
<body>
<?php include_once("menu_template.php") ?>
<form action="/w1183443/index.php/person/editSal" method="GET">
Employee id: 
<input type=text name="emp_no"><br />
Salary: 
<input type=text name="salary"><br />

<input type="submit" value="submit"/>
<br />



</body>
</html>