<div class="pcoded-content">
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10"><?php echo $page_header; ?></h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>/user"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#!"><?php echo $page_header; ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <?php if($session->getFlashdata('success_message')) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> <?php echo $session->getFlashdata('success_message');?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <?php } ?>
                    <?php if($session->getFlashdata('error_message')) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> <?php echo $session->getFlashdata('error_message');?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Booking No</th>
                                    <th>Booking Date/Time</th>
                                    <th>Event Details</th>
                                    <th>Payment Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($bookings) { $i=1; foreach($bookings as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row->booking_no; ?></td>
                                    <td>
                                        <?php echo date_format(date_create($row->booking_date), "M d, Y"); ?><br>
                                        <?php echo date_format(date_create($row->booking_time), "h:i A"); ?>
                                    </td>
                                    <td>
                                        <?php
                                        $event = $moduleDetail['model']->find_data('sms_events', 'row', ['id' => $row->event_id]);
                                        if($user){
                                        ?>
                                        <b>Name :</b> <?=$event->title?><br>
                                        <b>Date :</b> <?=$event->event_date?><br>
                                        <b>Venue :</b> <?=$event->event_venue?><br>
                                        <b>Theme :</b> <?=$event->event_theme?>
                                        <?php }?>
                                    </td>
                                    <td>
                                        <?php echo $row->booking_amount; ?><br>
                                        <?php echo (($row->payment_status == 1)?'<span class="text-success">PAID</span>':'<span class="text-danger">UNPAID</span>'); ?><br>
                                        <?php echo $row->payment_mode; ?><br>
                                        <?php echo $row->txn_id; ?><br>
                                        <?php echo date_format(date_create($row->payment_date_time), "M d, Y h:i A"); ?>
                                    </td>                                    
                                </tr>                                    
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>            
    </div>
</div>
<script type="text/javascript">
    function sweet_multiple(url) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this data!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = url;
                swal("Poof! Your data has been deleted!", {
                    icon: "success",
                });
            } else {
                swal("Your data is safe!", {
                    icon: "error",
                });
            }
        });
    }
</script>