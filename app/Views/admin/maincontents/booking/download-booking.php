<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=Booking_Report-".date('ymd').".xls");
?>
<table border="1" cellpadding="5" cellspacing="3" style="border-collapse: collapse;">
    <thead>
        <tr>
            <th>#</th>
            <th>Booking No</th>
            <th>Date/Time</th>
            <th>Booking User</th>
            <th>Booking Day</th>
            <th>Booking Details</th>
            <th>Qty</th>
            <th>Booking Amount</th>
            <th>Discount Amount</th>
            <th>GST Amount</th>
            <th>Grand Total</th>
            <th>Transaction Id</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php if($bookings) { $i=1; foreach($bookings as $row) {
            $planName = [];
            $booking_day = json_decode($row->booking_day);
            if(!empty($booking_day)){ for($p=0;$p<count($booking_day);$p++){
                $plan = $common_model->find_data('package_plans', 'row', ['id' => $booking_day[$p]]);
                if($plan){
                    $planName[] = $plan->package_name;
                }
            } }
        ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row->booking_no; ?></td>
            <td><?php echo date_format(date_create($row->booking_date), "M d, Y"); ?> <?php echo date_format(date_create($row->booking_time), "h:i A"); ?></td>
            <td>
                <?php
                $user = $common_model->find_data('sms_users', 'row', ['id' => $row->user_id]);
                if($user){
                ?>
                <?=$user->name.' '.$user->lname?><br>
                <?=$user->mobile?><br>
                <?=$user->email?>
                <?php }?>
            </td>
            <td><?=implode(", ", $planName)?></td>
            <td>
                <ul class="list-group">
                    <?php
                    $booking_name = json_decode($row->booking_name);
                    $booking_email = json_decode($row->booking_email);
                    $booking_phone = json_decode($row->booking_phone);
                    $booking_company = json_decode($row->booking_company);
                    $booking_designation = json_decode($row->booking_designation);
                    if(!empty($booking_name)){ for($i=0;$i<count($booking_name);$i++){
                    ?>
                    <li class="list-group-item"><?=$booking_name[$i]?> || <?=$booking_email[$i]?> ||<br> <?=$booking_phone[$i]?> || <?=$booking_company[$i]?>  ||<br> <?=$booking_designation[$i]?></li>
                    <?php } }?>
                </ul>
            </td>
            <td><?php echo $row->qty; ?></td>
            <td><?php echo $row->booking_amount; ?></td>
            <td><?php echo $row->discount_amount; ?></td>
            <td><?php echo $row->gst_amount; ?></td>
            <td><?php echo $row->grand_total; ?></td>
            <td><?php echo $row->txn_id; ?></td>
            <td>
                <?=(($row->payment_status)?'<span style="color:green;">PAID</span>':'<span style="color:red;">UNPAID</span>'); ?>
            </td>
        </tr>                                    
        <?php } } ?>
    </tbody>
</table>