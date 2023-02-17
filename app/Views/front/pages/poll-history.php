<?php use App\Models\CommonModel;   ?>
<section class="details-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 left-col">
                <h1 style="text-align: center;font-size: 36px;color: #ffa238; margin-bottom: 25px;">Poll Histroy</h1>
            </div>
        </div>
        <div class="card-body">
            <div class="dt-responsive table-responsive">
                <table id="simpletable" class="polldata_table text-white mx-auto border-collapse border border-slate-400">
                    <thead>
                        <tr>
                            <th class="border border-slate-300 ">#Sl. No.</th>
                            <th class="border border-slate-300 ">Poll Questions </th>
                            <th class="border border-slate-300 ">Given Answers </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($rows) { $i=1; foreach($rows as $row) { ?>
                        <tr>
                            <td class="border border-slate-300 "><?php echo $i++ . '.';  ?></td>
                            <td class="border border-slate-300 ">
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
                            <td class="border border-slate-300 ...">
                                <?= $pollOption->poll_option; ?>
                            </td>
                        </tr>                                    
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row" style="justify-content: center;" >
                <a style="border: 1px solid white;border-radius: 15px;padding-top: 5px;padding-bottom: 5px;text-align: center;overflow: hidden;position: relative;margin-right: 20px;margin-top: 20px;font-size: 20px;color: #FAF032;width: 100%;max-width: 120px;"  href="<?= base_url('/') ?>"> <i class="fas fa-backward"></i> Back</a>
            </div>
        </div>
    </div>
</section>