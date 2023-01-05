<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;Filename=User_Report-".date('ymd').".xls");
?>
<table border="1" cellpadding="5" cellspacing="3" style="border-collapse: collapse;">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Company Name</th>
            <th>Designation</th>
            <th>Date/Time</th>
            <th>Total Booking</th>
            <th>Total Paid Booking</th>
            <th>Total Unpaid Booking</th>
        </tr>
    </thead>
    <tbody>
        <?php if($users) { $i=1; foreach($users as $row) { ?>
            <?php
            $userPaidBooking = $common_model->find_data('bookings', 'count', ['user_id' => $row->id, 'payment_status' => 1]);
            $userUnpaidBooking = $common_model->find_data('bookings', 'count', ['user_id' => $row->id, 'payment_status' => 0]);
            ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row->name.' '.$row->lname; ?></td>
            <td><?php echo $row->mobile; ?></td>
            <td><?php echo $row->email; ?></td>
            <td><?php echo $row->company_name; ?></td>
            <td><?php echo $row->designation; ?></td>
            <td><?php echo date_format(date_create($row->created_at), "M d, Y"); ?></td>
            <td><?=($userPaidBooking + $userUnpaidBooking)?></td>
            <td><?=$userPaidBooking?></td>
            <td><?=$userUnpaidBooking?></td>
        </tr>                                    
        <?php } } ?>
    </tbody>
</table>