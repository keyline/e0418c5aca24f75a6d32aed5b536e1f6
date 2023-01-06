<?php use App\Models\CommonModel;   ?>
<section class="details-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 left-col">
                <h1 style="text-align: center;font-size: 50px;color: #ffa238;">Thank You for perticipating our Quiz section <span style="color:green; "> <i class="fa fa-check" aria-hidden="true"></i></span> </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 left-col">
                <h1 style="text-align: center;font-size: 50px;color: #ffa238;"><span style="color:green;">Quiz Result</span></h1>
                <div class="card-body" style="text-align: center;font-size: 25px;color: #ffa238;">
                    <div class="dt-responsive table-responsive">
                    <table class="table table-center">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Question</th>
                            <th scope="col">Choice</th>
                            <th scope="col">Result</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php if($allAnswers) { $i=1; foreach($allAnswers as $allAnswer) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php   $model = new CommonModel();
                                                $allquestions = $model->find_data('abp_quiz_questions', 'array', ['question_active!='=>3 , 'question_id='=> $allAnswer->answer_question_id ], '', '', '');
                                                if($allquestions) { $j=1; foreach($allquestions as $allquestion) { ?>
                                                    <?= $allquestion->quiz_description_txt ?><br>
                                        <?php }   } ?>
                                    </td>
                                    <td><?php   $model = new CommonModel();
                                                $allchoices = $model->find_data('abp_quiz_question_choices', 'array', ['question_active!='=>3 , 'choice_id='=> $allAnswer->answer_choice_id ], '', '', '');
                                                if($allchoices) { $j=1; foreach($allchoices as $allchoice) { ?>
                                                    <?= $allchoice->choice_description ?><br>
                                        <?php }   } ?>
                                    </td>
                                    <td><?php if($allAnswer->anwser_choice_is_right){   ?>
                                        <?php echo '<div style="font-size:1.00em;color:green">CORRECT</div>' ?>
                                        <?php }else{    ?>
                                        <?php echo '<div style="font-size:1.00em;color:red">INCORRECT</div>' ?>
                                        <?php   } ?>
                                    </td>
                                </tr>                                    
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 left-col">
                <?php   $model = new CommonModel();
                        $session = \Config\Services::session();
                        $userID = $data['user_id']            = $this->session->get('user_id');
                        $countData = $model->find_data('abp_user_question_answer', 'count', ['published!='=>3 , 'user_id=' => $userID  , 'anwser_choice_is_right='=> 1 ], '', '', '');
                        ?>
                            
                
                <h1 style="text-align: center;font-size: 50px;color: #ffa238;">Score : <span style="color:green; "> <?= $countData ?></span> </h1>
            </div>
        </div>
    </div>
</section>