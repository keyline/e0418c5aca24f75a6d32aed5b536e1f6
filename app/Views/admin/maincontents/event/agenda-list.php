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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>/<?php echo $moduleDetail['controller']; ?>">Manage <?php echo $moduleDetail['module']; ?></a></li>
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
                    <h5>
                        <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/agenda_add/<?=$event->id?>" class="btn btn-success">Add <?php echo $moduleDetail['module']; ?> Event Agenda</a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Day</th>
                                    <th>Title</th>
                                    <th>Venue</th>
                                    <th>Rank</th>
                                    <th>Details</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($rows) { $i=1; foreach($rows as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?=date_format(date_create($row->agenda_date), "M d, Y")?></td>
                                    <td><?=$row->agenda_day?></td>
                                    <td><?=$row->agenda_title?></td>
                                    <td><?=$row->agenda_venue?></td>
                                    <td><?=$row->rank?></td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-info btn-sm" data-toggle="modal" data-target="#agendaModal<?=$row->agenda_id?>"><i class="fa fa-info-circle"></i> VIEW DETAILS</a>
                                    </td>
                                    <td>
                                        <?php $primary_key = $moduleDetail['primary_key']; ?>
                                        <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/agenda_edit/<?php echo $row->event_id; ?>/<?php echo $row->agenda_id; ?>" class="btn btn-icon btn-primary" title="Edit"><i class="feather icon-edit"></i></a>
                                        
                                        <button type="button" class="btn btn-danger" onclick="sweet_multiple('<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/agenda_delete/<?php echo $row->event_id; ?>/<?php echo $row->agenda_id; ?>');"><i class="feather icon-trash"></i></button>                                        
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
<?php if($rows) { $i=1; foreach($rows as $row) { ?>
    <?php $eventAgendaDetails = $moduleDetail['model']->find_data('event_agenda_details', 'array', ['agenda_id' => $row->agenda_id, 'published' => 1]); ?>
<!-- Modal -->
<div class="modal fade" id="agendaModal<?=$row->agenda_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="max-width: 1200px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            <?=$row->agenda_title?><br>
            <p>
                <?=date_format(date_create($row->agenda_date), "M d, Y")?> || Day : <?=$row->agenda_day?> || Venue : <?=$row->agenda_venue?>
            </p>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Hall Number</th>
                    <th>Timing</th>
                    <th>Wishlist Enabled</th>
                    <th>Subject Line</th>
                </tr>
            </thead>
            <tbody>
                <?php if($eventAgendaDetails){ $sl=1; foreach($eventAgendaDetails as $eventAgendaDetail){?>
                <tr>
                    <td><?=$sl++?></td>
                    <td><?=$eventAgendaDetail->hall_number?></td>
                    <td><?=date_format(date_create($eventAgendaDetail->from_time), "h:i A")?> - <?=(($eventAgendaDetail->to_time!='')?date_format(date_create($eventAgendaDetail->to_time), "h:i A"):'Onwards')?></td>
                    <td><?=(($eventAgendaDetail->is_wishlist)?'YES':'NO')?></td>
                    <td><?=wordwrap($eventAgendaDetail->subject_line,30,"<br>\n")?></td>
                </tr>
                <?php } }?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?php } } ?>
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