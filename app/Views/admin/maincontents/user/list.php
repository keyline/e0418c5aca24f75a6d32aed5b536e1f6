<?php use App\Models\CommonModel;   ?>
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
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Profile Image</th>
                                    <th>Poll Questions <span class="fas fa-arrow-alt-circle-right"></span> Given Answers </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($rows) { $i=1; foreach($rows as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row->name.' '.$row->lname; ?></td>
                                    <td><?php echo $row->mobile; ?></td>
                                    <td><?php echo $row->email; ?></td>
                                    <td>
                                        <?php if($row->profile_image!='') { ?>
                                          <img src="<?=base_url('/uploads/users/'.$row->profile_image)?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;" />
                                        <?php } ?>                                        
                                    </td>
                                    <td>
                                    <?php   $model = new CommonModel(); 
                                        $this->db = \Config\Database::connect();
                                        $polls = $model->find_data('sms_poll_tracking', 'array', ['published!=' => 3 , 'userId='=> $row->id ], '', '', '');
                                        if($polls){ foreach($polls as $poll){ 
                                                $pollNames = $model->find_data('sms_poll', 'array', ['published!=' => 3 , 'id='=> $poll->poll_id ], '', '', '');
                                                $pollOptions = $model->find_data('sms_poll_option', 'array', ['published!=' => 3 , 'id='=> $poll->poll_option_id ], '', '', '');
                                                    if($pollNames){ foreach($pollNames as $pollname){
                                                        if($pollOptions){ foreach($pollOptions as $pollOption){ ?>
                                                            <span class="fas fa-caret-down"></span> <?= $pollname->poll_title . '  ' ; ?><span class="fas fa-arrow-alt-circle-right"></span><?= '  ' . $pollOption->poll_option; ?><br>
                                                    <?php } } ?>
                                                    <?php } } ?>
                                        <?php }  }    ?>
                                    </td>
                                    <td>
                                        <?php $primary_key = $moduleDetail['primary_key']; ?>
                                        <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/edit/<?php echo $row->$primary_key; ?>" class="btn  btn-icon btn-primary" title="Edit"><i class="feather icon-edit"></i></a>
                                        
                                        <button type="button" class="btn btn-danger" onclick="sweet_multiple('<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/confirm_delete/<?php echo $row->$primary_key; ?>');"><i class="feather icon-trash"></i></button>

                                        <?php if($row->published) { ?>
                                            <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/deactive/<?php echo $row->$primary_key; ?>" class="btn  btn-icon btn-success" title="Active"><i class="feather icon-check-circle"></i></a>
                                        <?php } else { ?>
                                            <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/active/<?php echo $row->$primary_key; ?>" class="btn  btn-icon btn-warning" title="Deactive"><i class="feather icon-slash"></i></a>
                                        <?php } ?>

                                        <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/view_videoList/<?php echo $row->$primary_key; ?>" class="btn  btn-icon btn-warning" title="View PlayList"><i class="fas fa-play-circle"></i></a>

                                        <br>
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