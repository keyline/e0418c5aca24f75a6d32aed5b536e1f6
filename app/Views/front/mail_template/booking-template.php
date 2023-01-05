<?php
use App\Models\CommonModel;
$this->common_model         = new CommonModel();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Booking Templete</title>
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
			<td class="left-side">Booking No</td>
			<td><?=$booking_no?></td>
		</tr>
		<tr>
			<td class="left-side">Booking Date/Time</td>
			<td><?=date_format(date_create($booking_date), "M d, Y")?> <?=date_format(date_create($booking_time), "h:i A")?></td>
		</tr>
		<tr>
			<td class="left-side">Booking Details</td>
			<td>
				<ul class="list-group">
                    <?php
                    $booking_name = json_decode($booking_name);
                    $booking_email = json_decode($booking_email);
                    $booking_phone = json_decode($booking_phone);
                    $booking_company = json_decode($booking_company);
                    $booking_designation = json_decode($booking_designation);
                    if(!empty($booking_name)){ for($i=0;$i<count($booking_name);$i++){
                    ?>
                    <li class="list-group-item"><?=$booking_name[$i]?> || <?=$booking_email[$i]?> ||<br> <?=$booking_phone[$i]?> || <?=$booking_company[$i]?>  ||<br> <?=$booking_designation[$i]?></li>
                    <?php } }?>
                </ul>
			</td>
		</tr>
		<tr>
			<td class="left-side">Booking Day</td>
			<td>
				<?php
				$planName = [];
                $booking_day = json_decode($booking_day);
                if(!empty($booking_day)){ for($p=0;$p<count($booking_day);$p++){
                    $plan = $this->common_model->find_data('package_plans', 'row', ['id' => $booking_day[$p]]);
                    if($plan){
                        $planName[] = $plan->package_name;
                    }
                } }
                echo implode(", ", $planName);
				?>
			</td>
		</tr>
		<tr>
			<td class="left-side">Payment Details</td>
			<td>
				<p><strong>Booking Amount:</strong> <?=$booking_amount?></p>
                <p><strong>Discount Amount:</strong> <?=$discount_amount?> (<?=$discount_percent?> %)</p>
                <p><strong>GST Amount:</strong> <?=$gst_amount?> (<?=$gst_percent?> %)</p>
                <p><strong>Payable Amount:</strong> <?=$grand_total?></p>
                <?php if($payment_status) {?>
                    <p><strong>Payment Status:</strong> <span class="text-success" style="font-weight:bold;">PAID</span></p>
                    <p><strong>Payment Mode:</strong> <?=$payment_mode?></p>
                    <p><strong>Txn ID:</strong> <?=$txn_id?></p>
                    <p><strong>Payment Date/Time:</strong> <?=date_format(date_create($payment_date_time), "M d, Y h:i A")?></p>
                <?php }?>
			</td>
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