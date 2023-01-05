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
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <tr>
                                <td style="font-weight: bold;">Title</td>
                                <td>
                                    <?=$rows[0]->title?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Event Date</td>
                                <td>
                                    <?=$rows[0]->event_date?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Event Venue</td>
                                <td>
                                    <?=$rows[0]->event_venue?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Event Theme</td>
                                <td>
                                    <?=$rows[0]->event_theme?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Overview Description</td>
                                <td>
                                    <?=$rows[0]->overview_description?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Conference Desscription</td>
                                <td>
                                    <?=$rows[0]->conference_desscription?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Event Banner</td>
                                <td>
                                    <?php if($rows[0]->event_banner!='') { ?>
                                        <img src="<?=base_url('/uploads/events/'.$rows[0]->event_banner)?>" class="img-responsive img-thumbnail" style="height:100px; width:300px;"  />
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Post By</td>
                                <td>
                                    <?=$rows[0]->post_by?>
                                </td>
                            </tr>
                        </table>
                    </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-label" for="event_banner" style="font-weight: bold;">Event Images</label>
                                
                                <div class="row">
                                    <?php if(!empty($eventImages)) { foreach($eventImages as $eventImage){?>
                                    <div class="col-md-2 mb-3">
                                        <img src="<?php echo base_url();?>/uploads/events/<?php echo $eventImage->event_image; ?>" class="img-responsive img-thumbnail" style="height:150px; width:100%;" />
                                    </div>
                                    <?php } }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
    </div>
    