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
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <tr>
                                <td style="font-weight: bold;">Show :</td>
                                <td>
                                    <?php
                                    $showDTL = $moduleDetail['model']->find_data('abp_shows', 'row', ['id' => $row->show_id]);
                                    echo (($showDTL)?$showDTL->show_title:'');
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Media Code :</td>
                                <td>
                                    <?=$row->media_code?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Media Title :</td>
                                <td>
                                    <?=$row->media_title?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Media Embed Code :</td>
                                <td>
                                    <?=$row->media_embed_code?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Media Description :</td>
                                <td>
                                    <p style="text-align: justify;" ><?php echo wordwrap($row->media_description,130,"<br>\n"); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;" >Media Publish Start Datetime :</td>
                                <td>
                                    <?php echo date("F j, Y h:m:s A" ,strtotime($row->media_publish_start_datetime)); ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Media Publish End Datetime :</td>
                                <td>
                                    <?php echo date("F j, Y h:m:s A" ,strtotime($row->media_publish_end_datetime)); ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Media Publish UTC Datetime :</td>
                                <td>
                                    <?php echo date("F j, Y h:m:s A" ,strtotime($row->media_publish_utc_datetime)); ?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Media Category :</td>
                                <td>
                                    <?=$row->media_category?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Media Thumbnail :</td>
                                <td>
                                    <?php if ($showDTL) { if($showDTL->show_cover_image != '') { ?>
                                        <img src="<?=base_url('/uploads/show/'.$showDTL->show_cover_image)?>" alt="<?=(($showDTL)?$showDTL->show_title:'')?>" class="img-responsive img-thumbnail" style="height:300px; width:300px;"  />
                                    <?php } }?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Media Author :</td>
                                <td>
                                    <?=$row->media_author?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Media Permalink :</td>
                                <td>
                                    <?=$row->media_permalink?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Media Type :</td>
                                <td>
                                    <?=$row->media_type?>
                                </td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">Media Video :</td>
                                <td>
                                    <div style="position:relative; overflow:hidden; padding-bottom:56.25%"><iframe src="https://cdn.jwplayer.com/players/<?=$row->media_code?>-8vAGGg58.html" width="50%" height="50%" frameborder="0" scrolling="auto" title=<?=$row->media_title?> style="position:absolute;" allowfullscreen></iframe></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>            
</div>
    