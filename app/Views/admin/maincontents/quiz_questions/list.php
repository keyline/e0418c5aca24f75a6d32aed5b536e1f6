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
                                    <th>Quize Category</th>
                                    <th>Quize Type</th>
                                    <th>Quize Question</th>
                                    <th>Quize Choices</th>
                                    <th>Correct Choices</th>
                                    <th>Quize Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($rows) { $i=1; foreach($rows as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td>
                                        <?php   $model = new CommonModel();
                                                $titles = $model->find_data('abp_quizzes', 'row', ['is_active!=' => 3 , 'quiz_id='=> $row->question_quiz_id ], '', '', '');
                                                 echo $titles->quiz_title;   ?>
                                    </td> 
                                    <td><?php echo $row->question_type; ?></td>
                                    <td><?php echo $row->quiz_description_txt; ?></td>
                                    <td>
                                        <?php   $model = new CommonModel();
                                                $options = $model->find_data('abp_quiz_question_choices', 'array', ['question_active!='=>3 , 'choice_question_id='=> $row->question_id ], '', '', '');
                                                if($options) { $i=1; foreach($options as $option) { ?>
                                                    <span class="fas fa-arrow-alt-circle-right"></span><?= '  ' . $option->choice_description . ' '?><br>
                                        <?php }   } ?>
                                    </td>
                                    <td>
                                        <?php   $model = new CommonModel();
                                                $answers = $model->find_data('abp_quiz_question_choices', 'array', ['question_active!='=>3 , 'choice_question_id='=> $row->question_id ,'choice_is_right !='=> 1 ], '', '', '');
                                                if($answers) { $i=1; foreach($answers as $answer) { ?>
                                                    <span class="fas fa-arrow-alt-circle-right"></span><?= '  ' . $answer->choice_description . ' '?><br>
                                        <?php }   } ?>
                                    </td>
                                    <td>
                                        <?php  if($row->question_type != 'text'){  ?>
                                                <?php if($row->question_attachment_title!='') { ?>
                                                    <img src="<?=base_url('/uploads/quizeImage/'.$row->question_attachment_title)?>" class="img-responsive img-thumbnail" style="max-height:100px; max-width:200px;"  />
                                                <?php } }else{ ?>
                                                    <img src="<?=base_url('/uploads/No-Image.png')?>" class="img-responsive img-thumbnail" style="max-height:100px; max-width:200px;"  />
                                        <?php   }   ?>

                                        <?php if($row->abp_video_link ){  ?>
                                                <iframe width="250" height="200" src="https://www.youtube.com/embed/<?php echo $row->abp_video_code ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php $primary_key = $moduleDetail['primary_key']; ?>
                                        <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/edit/<?php echo $row->$primary_key; ?>" class="btn  btn-icon btn-primary" title="Edit"><i class="feather icon-edit"></i></a>
                                        
                                        <button type="button" class="btn btn-danger" onclick="sweet_multiple('<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/confirm_delete/<?php echo $row->$primary_key; ?>');"><i class="feather icon-trash"></i></button>

                                        <?php if($row->question_active) { ?>
                                            <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/deactive/<?php echo $row->$primary_key; ?>" class="btn  btn-icon btn-success" title="Active"><i class="feather icon-check-circle"></i></a>
                                        <?php } else { ?>
                                            <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/active/<?php echo $row->$primary_key; ?>" class="btn  btn-icon btn-warning" title="Deactive"><i class="feather icon-slash"></i></a>
                                        <?php } ?>

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