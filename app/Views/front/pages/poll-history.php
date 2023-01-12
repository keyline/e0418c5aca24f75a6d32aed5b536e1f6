<?php use App\Models\CommonModel;   ?>
<section class="details-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 left-col">
                <h1 style="text-align: center;font-size: 50px;color: #ffa238;">Poll Histroy</h1>
            </div>
        </div>
        <div class="card-body">
                    <div class="dt-responsive table-responsive">
                        <table id="simpletable" class="table table-striped table-bordered nowrap" align="center" style="color:azure" >
                            <thead>
                                <tr>
                                    <th>Poll Questions </th>
                                    <th>Given Answers </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($rows) { $i=1; foreach($rows as $row) { ?>
                                <tr>
                                    <td>
                                        <?php   $model = new CommonModel(); 
                                            $this->db = \Config\Database::connect();
                                            $order_by[0]                = array('field' => 'id', 'type' => 'desc');
                                            $polls = $model->find_data('sms_poll_tracking', 'array', ['published!=' => 3 , 'userId='=> $row->user_id ], '', '', '','',3);
                                            if($polls){ foreach($polls as $poll){
                                                    $pollNames = $model->find_data('sms_poll', 'array', ['published!=' => 3 , 'id='=> $poll->poll_id ], '', '', '');
                                                    $pollOptions = $model->find_data('sms_poll_option', 'array', ['published!=' => 3 , 'id='=> $poll->poll_option_id ], '', '', '');
                                                        if($pollNames){ foreach($pollNames as $pollname){
                                                            if($pollOptions){ foreach($pollOptions as $pollOption){ ?>
                                                                <?= $pollname->poll_title ; ?>
                                                        <?php } } ?>
                                                        <?php } } ?>
                                        <?php }  }    ?>
                                    </td>
                                    <td>
                                        <?= $pollOption->poll_option; ?>
                                    </td>
                                </tr>                                    
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</section>