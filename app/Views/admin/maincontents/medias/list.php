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
                    <?php if ($session->getFlashdata('success_message')) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> <?php echo $session->getFlashdata('success_message');?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <?php } ?>
                    <?php if ($session->getFlashdata('error_message')) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> <?php echo $session->getFlashdata('error_message');?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php } ?>                        
                    <h5>
                        <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/add" class="btn btn-success">Add <?php echo $moduleDetail['module']; ?></a>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Media Code</th>
                                    <th>Media Title</th>
                                    <th>Media Author</th>
                                    <!-- <th>Media Description</th> -->
                                    <th>Media Thumbnail</th>
                                    <!-- <th>Media Category</th> -->
                                    <!-- <th>Media Type</th> -->
                                    <!-- <th>Media Publish Start Date/Time</th> -->
                                    <!-- <th>Media Publish End Date/Time</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($rows) {
                                    $i=1;
                                    foreach ($rows as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row->media_code; ?></td>
                                    <td><?php echo $row->media_title; ?></td>
                                    <td><?php echo $row->media_author; ?></td>
                                    <!-- <td>
                                        <?php  // $string =$row->media_description;
                                               // $string = (strlen($string) > 20)?substr($string,0,50).'......': $string;
                                               // echo $string;?>
                                    </td> -->
                                    <td>
                                        <?php if ($row->media_placeholder_image_txt !='') { ?>
                                          <img src="<?=base_url('/uploads/media/'.$row->media_placeholder_image_txt)?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;"  />
                                        <?php } ?>                                        
                                    </td>
                                    <!-- <td><?php // echo $row->media_category;?></td> -->
                                    <!-- <td><?php // echo ($row->media_type == 'a') ? 'Audio' : 'Video';?></td> -->
                                    <!-- <td><?php // echo date("F j, Y h:m:s A" ,strtotime($row->media_publish_start_datetime));?></td> -->
                                    <!-- <td><?php // echo date("F j, Y h:m:s A" ,strtotime($row->media_publish_end_datetime));?></td> -->
                                    <td>
                                        <?php $primary_key = $moduleDetail['primary_key']; ?>
                                        <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/edit/<?php echo $row->$primary_key; ?>" class="btn  btn-icon btn-primary" title="Edit"><i class="feather icon-edit"></i></a>
                                        <?php if ($row->media_is_active) { ?>
                                            <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/details/<?php echo $row->$primary_key; ?>" class="btn btn-info"  title="Details"><i class="fas fa-info-circle"></i></a>
                                        <?php } ?>
                                        <?php if ($row->media_is_active) { ?>
                                            <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/deactive/<?php echo $row->$primary_key; ?>" class="btn  btn-icon btn-success" title="Active"><i class="feather icon-check-circle"></i></a>
                                        <?php } else { ?>
                                            <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/active/<?php echo $row->$primary_key; ?>" class="btn  btn-icon btn-warning" title="Deactive"><i class="feather icon-slash"></i></a>
                                        <?php } ?>
                                        <button type="button" class="btn btn-danger" onclick="sweet_multiple('<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/confirm_delete/<?php echo $row->$primary_key; ?>');"><i class="feather icon-trash"></i></button>
                                        
                                    </td>
                                </tr>                                    
                                <?php }
                                    } ?>
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