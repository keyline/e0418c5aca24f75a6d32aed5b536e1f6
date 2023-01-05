<style type="text/css">
    label {
        font-weight: bold;
    }
</style>
<?php
if($row) {
    $agenda_title                       = $row->agenda_title;
    $agenda_day                         = $row->agenda_day;
    $agenda_date                        = $row->agenda_date;
    $agenda_venue                       = $row->agenda_venue;
    $rank                               = $row->rank;
}
 else {
    $agenda_title                       = set_value('agenda_title', '');
    $agenda_day                         = set_value('agenda_day', '');
    $agenda_date                        = set_value('agenda_date', '');
    $agenda_venue                       = set_value('agenda_venue', '');
    $rank                               = set_value('rank', '');
}
?>
<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
<div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10"><?php echo $page_header; ?></h5>
                            <!-- <h5 class="m-b-10"><a href="<?php echo base_url('admin/'); ?>/<?php echo $moduleDetail['controller']; ?>/manage_image" target="_blank">Upload Images</a></h5> -->
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>/user"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>/<?php echo $moduleDetail['controller']; ?>">Manage <?php echo $moduleDetail['module']; ?></a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>/<?php echo $moduleDetail['controller']; ?>/agenda_list/<?=$event->id?>">Manage <?php echo $moduleDetail['module']; ?> Agenda</a></li>
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
                        <h5><?php echo $page_header; ?></h5>
                        <h6 class="text-danger">Star (*) marks fields are mandatory</h6>
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
                        <form id="validation-form123" action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Event Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="agenda_date" id="agenda_date"value="<?php echo $agenda_date; ?>" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Day <span class="text-danger">*</span></label>
                                        <select class="form-control" name="agenda_day" id="agenda_day" required="required">
                                            <option value="" selected>Select Event Day</option>
                                            <?php for($i=1;$i<=10;$i++){?>
                                            <option value="<?=$i?>" <?=(($agenda_day == $i)?'selected':'')?>>Day <?=$i?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Event Agenda Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="agenda_title" id="agenda_title" placeholder="Event  Agenda Title" value="<?php echo $agenda_title; ?>" required="required">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Event Agenda Venue</label>
                                        <input type="text" class="form-control" name="agenda_venue" id="agenda_venue" placeholder="Event Agenda Venue" value="<?php echo $agenda_venue; ?>" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label" for="rank">Rank <span class="text-danger">*</span></label>
                                        <select class="form-control" name="rank" id="rank" required="required">
                                            <option value="" selected>Select Rank</option>
                                            <?php for($i=1;$i<=20;$i++){?>
                                            <option value="<?=$i?>" <?=(($rank == $i)?'selected':'')?>><?=$i?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="field_wrapper2">
                                <?php
                                    if($action == 'Edit') {
                                    $eventAgendaDetails = $moduleDetail['model']->find_data('event_agenda_details', 'array', ['agenda_id' => $row->agenda_id, 'published' => 1]);
                                    if($eventAgendaDetails){ $sl=1; foreach($eventAgendaDetails as $eventAgendaDetail){
                                ?>
                                <div class="row" style="border: 1px solid #045e51fc;padding: 10px;margin-bottom: 10px;">
                                    <div class="col-md-2">
                                        <input type="hidden" name="ev_ag_id[]" value="<?=$eventAgendaDetail->ev_ag_id?>">
                                        <label class="form-label">Hall Number</label>
                                        <input type="text" class="form-control" name="hall_number[]" placeholder="Hall Number" value="<?=$eventAgendaDetail->hall_number?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">From Time</label>
                                        <input type="time" class="form-control" name="from_time[]" placeholder="From Time" value="<?=$eventAgendaDetail->from_time?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">To Time</label>
                                        <input type="time" class="form-control" name="to_time[]" placeholder="To Time" value="<?=$eventAgendaDetail->to_time?>">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Wishlist Enabled</label>
                                        <select class="form-control" name="is_wishlist[]">
                                            <option value="" selected>Select Event Day</option>
                                            <option value="1" <?=(($eventAgendaDetail->is_wishlist == 1)?'selected':'')?>>YES</option>
                                            <option value="0" <?=(($eventAgendaDetail->is_wishlist == 0)?'selected':'')?>>NO</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Session Subject Line</label>
                                        <textarea class="form-control" name="subject_line[]" placeholder="Session Subject Line" rows="5"><?=$eventAgendaDetail->subject_line?></textarea>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="javascript:void(0);" class="remove_button2 btn btn-danger" style="margin-top: 29px;"><i class="fa fa-minus-circle"></i></a>
                                    </div>
                                </div>
                                <?php } } }?>
                                <div class="row" style="border: 1px solid #045e51fc;padding: 10px;margin-bottom: 10px;">
                                    <div class="col-md-2">
                                        <input type="hidden" name="ev_ag_id[]" value="">
                                        <label class="form-label">Hall Number</label>
                                        <input type="text" class="form-control" name="hall_number[]" placeholder="Hall Number">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">From Time</label>
                                        <input type="time" class="form-control" name="from_time[]" placeholder="From Time">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">To Time</label>
                                        <input type="time" class="form-control" name="to_time[]" placeholder="To Time">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Wishlist Enabled</label>
                                        <select class="form-control" name="is_wishlist[]">
                                            <option value="" selected>Select Event Day</option>
                                            <option value="1">YES</option>
                                            <option value="0">NO</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Session Subject Line</label>
                                        <textarea class="form-control" name="subject_line[]" placeholder="Session Subject Line" rows="5"></textarea>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="javascript:void(0);" class="add_button2 btn btn-success" style="margin-top: 29px;"><i class="fa fa-plus-circle"></i></a>
                                    </div>
                                </div> 
                            </div>
                            <button type="submit" class="btn  btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var maxField    = 20;
        var addButton   = $('.add_button2'); 
        var wrapper     = $('.field_wrapper2');
        var fieldHTML   = '<div class="row" style="border: 1px solid #045e51fc;padding: 10px;margin-bottom: 10px;">\
                                <div class="col-md-2">\
                                    <input type="hidden" name="ev_ag_id[]" value="">\
                                    <label class="form-label">Hall Number</label>\
                                    <input type="text" class="form-control" name="hall_number[]" placeholder="Hall Number">\
                                </div>\
                                <div class="col-md-2">\
                                    <label class="form-label">From Time</label>\
                                    <input type="time" class="form-control" name="from_time[]" placeholder="From Time">\
                                </div>\
                                <div class="col-md-2">\
                                    <label class="form-label">To Time</label>\
                                    <input type="time" class="form-control" name="to_time[]" placeholder="To Time">\
                                </div>\
                                <div class="col-md-2">\
                                    <label class="form-label">Wishlist Enabled</label>\
                                    <select class="form-control" name="is_wishlist[]">\
                                        <option value="" selected>Select Event Day</option>\
                                        <option value="1">YES</option>\
                                        <option value="0">NO</option>\
                                    </select>\
                                </div>\
                                <div class="col-md-3">\
                                    <label class="form-label">Session Subject Line</label>\
                                    <textarea class="form-control" name="subject_line[]" placeholder="Session Subject Line" rows="5"></textarea>\
                                </div>\
                                <div class="col-md-1">\
                                    <a href="javascript:void(0);" class="remove_button2 btn btn-danger" style="margin-top: 29px;"><i class="fa fa-minus-circle"></i></a>\
                                </div>\
                            </div>';
        var x = 1;
        $(addButton).click(function(){
            if(x < maxField){ 
                x++; 
                $(wrapper).append(fieldHTML);
            }
        });
        $(wrapper).on('click', '.remove_button2', function(e){
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
            x--;
        });
    });
</script>