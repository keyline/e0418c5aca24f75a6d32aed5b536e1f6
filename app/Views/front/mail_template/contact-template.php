<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Contact Us Templete</title>
	<style type="text/css">
		body {
			font-family: Arial;
		}
		.left-side {
			background-image: linear-gradient(45deg,#9ece2b,#009b3d);
		    padding: 17px;
		    color: #fff;
		    font-size: 16px;
		}
		.logo {
			text-align: center;
		}
		table td {
		    border: 1px solid #19181824;
		}
		table {
		    border: 2px solid #009b3d;
		    border-collapse: collapse;
		    border-spacing: 0;
		}
	</style>
</head>
<body>
	<table border="1" align="center" cellpadding="5" cellspacing="3" style="width: 900px;">		
		<tr>
			<td colspan="2" class="logo">
				<img src="https://indiainfocom-event.keylines.in/uploads/1665553218logo.gif" style="width: 241px; text-align: center;">
			</td>			
		</tr>
		<tr>
			<td class="left-side">Name</td>
			<td><?php echo $name; ?></td>
		</tr>
		<tr>
			<td class="left-side">Email</td>
			<td><?php echo $email; ?></td>
		</tr>
		<tr>
			<td class="left-side">Phone</td>
			<td><?php echo $phone; ?></td>
		</tr>
		<tr>
			<td class="left-side">Description</td>
			<td><?php echo $comment; ?></td>
		</tr>
		<tr>
			<td style="text-align: left; font-size: 9px;">
				Best Regards,<br>
				India Infocom<br>
				West Bengal, India 

			</td>
			<td style="text-align: right; font-size: 9px;">
				Reach us,<br>
				infocom@abp.in<br>
				www.indiainfocom.com
			</td>
		</tr>		
	</table>
</body>
</html>