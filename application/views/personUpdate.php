<?php $this->load->library('validation','form')?>
<html>
<head>
		<link rel="stylesheet" href="<?php echo base_url('css/styles.css') ?>" type="text/css" media="screen"> 
</head> 
<style>
		* {
			font-family: Arial;
			font-size: 12px;
		}
		table {
			border-collapse: collapse;
		}
		td, th {
			border: 1px solid #666666;
			padding:  4px;
		}
		div {
			margin: 4px;
		}

		label {
			display: inline-block;
			width: 120px;
		}
		.search tr:nth-child(odd) {
			background:#C4B0B7;
		}
	</style>

<body>
	
	<div id="menuContainer">
<?php include_once("menu_template.php") ?>
</div>

	<div class="content">
		<h1><?php echo $title; ?></h1>
		<?php echo $message; ?>
		<?php echo validation_errors(); ?>
		<form method="post" action="<?php echo $action; ?>">
		<div class="data">
		<table border="4">
			<tr>
				<td width="30%">Employee No</td>
				<td><input type="text" name="id" class="text" value="<?php echo set_value('id') ?>"/></td>
			</tr>
			<tr>
				<td valign="top">First Name<span style="color:red;">*</span></td>
				<td><input type="text" name="first_name" class="text" value="<?php echo set_value('first_name'); ?>"/></td>
			</tr>
			<tr>
				<td valign="top">Last Name<span style="color:red;">*</span></td>
				<td><input type="text" name="last_name" class="text" value="<?php echo set_value('last_name'); ?>"/></td>
			</tr>
			<tr>
				<td valign="top">Gender<span style="color:red;">*</span></td>
				<td><input type="radio" name="gender" value="M" <?php echo $this->validation->set_radio('gender', 'M'); ?>/> M
					<input type="radio" name="gender" value="F" <?php echo $this->validation->set_radio('gender', 'F'); ?>/> F</td>
			</tr>
			<tr>
				<td valign="top">Date of birth (dd-mm-yyyy)<span style="color:red;">*</span></td>
				<td><input type="text" name="birth_date"  class="text" value="<?php echo set_value('birth_date'); ?>"/></td>
			</tr>
			<tr>
				<td valign="top">Hire Date (dd-mm-yyyy)<span style="color:red;">*</span></td>
				<td><input type="text" name="hire_date"  class="text" value="<?php echo set_value('hire_date'); ?>"/></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" value="Save"/></td>
			</tr>
		</table>
		</div>
		</form>
		<br />
		<?php //echo $link_back; ?>
	</div>
</body>
</html>