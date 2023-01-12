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
                    <!-- <h5>
                        <a href="<?php echo base_url(); ?>/admin/<?php echo $moduleDetail['controller']; ?>/add" class="btn btn-success">Add <?php echo $moduleDetail['module']; ?></a>
                    </h5> -->
                </div>
                <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Auth Provider</th>
                                    <th>Email</th>
                                    <th>Profile Image</th>
                                    <th>Poll Questions <span class="fas fa-arrow-alt-circle-right"></span> Given Answers </th>
                                    <th>Quiz Questions <span class="fas fa-arrow-alt-circle-right"></span> Given Answers </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($rows) { $i=1; foreach($rows as $row) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row->user_first_name.' '.$row->user_last_name; ?></td>
                                    <td><?php echo $row->user_oauth_provider; ?></td>
                                    <td><?php echo $row->user_email; ?></td>
                                    <td>
                                        <?php if($row->user_picture!='') { ?>
                                          <img src="<?= $row->user_picture ?>" class="img-responsive img-thumbnail" style="height:100px; width:100px;" />
                                        <?php } ?>                                        
                                    </td>
                                    <td>
                                        <?php   
                                            $model = new CommonModel(); 
                                            $this->db = \Config\Database::connect();
                                            $order_by[0]                = array('field' => 'id', 'type' => 'desc');
                                            $polls = $model->find_data('sms_poll_tracking', 'array', ['published!=' => 3 , 'userId='=> $row->user_id ], '', '', '','',3);
                                            if($polls){ foreach($polls as $poll){
                                                    $pollNames = $model->find_data('sms_poll', 'array', ['published!=' => 3 , 'id='=> $poll->poll_id ], '', '', '');
                                                    $pollOptions = $model->find_data('sms_poll_option', 'array', ['published!=' => 3 , 'id='=> $poll->poll_option_id ], '', '', '');
                                                        if($pollNames){ foreach($pollNames as $pollname){
                                                            if($pollOptions){ foreach($pollOptions as $pollOption){ ?>
                                                                <span class="fas fa-caret-down"></span> <?= $pollname->poll_title . '  ' ; ?><span class="fas fa-arrow-alt-circle-right"></span><?= '  ' . $pollOption->poll_option; ?><br><br>
                                                        <?php } } ?>
                                                        <?php } } ?>
                                        <?php }  }    ?>
                                    </td>
                                    <td>
                                        <?php  
                                            $order_by[0]                = array('field' => 'answer_id', 'type' => 'desc'); 
                                            $users = $model->find_data('abp_user_question_answer', 'array', ['published!=' => 3 , 'user_id='=> $row->user_id ], '', '', '',$order_by,3);
                                            if($users){ foreach($users as $user){
                                                $ques = $model->find_data('abp_quiz_questions', 'array', ['question_active!=' => 3 , 'question_id='=> $user->answer_question_id ], '', '', '');
                                                $choices = $model->find_data('abp_quiz_question_choices', 'array', ['question_active!=' => 3 , 'choice_id='=> $user->answer_choice_id ], '', '', '');
                                                if($ques){ foreach($ques as $que){  
                                                    if($choices){ foreach($choices as $choice){ ?>
                                                        <span class="fas fa-caret-down"></span><?= $que->quiz_description_txt . '  ' ?><span class="fas fa-arrow-alt-circle-right"></span>    <?= $choice->choice_description . '  '?><br><br>
                                                <?php   } } ?>
                                            <?php   } } ?>
                                        <?php   } } ?>
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