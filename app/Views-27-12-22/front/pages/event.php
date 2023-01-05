<section id="event-banner">
    <div class="event-slider">
        <img src="<?=base_url('/material/front/assets/images/')?>/event-banner.jpg" width="1920" height="273">
        <div class="infocom-banner-logo-wrapper">
            <img src="<?=base_url('/material/front/assets/images/')?>/infocom-logo-2022.jpg" alt="">
            <img src="<?=base_url('/material/front/assets/images/')?>/abp-intiative.jpg" alt="">
            <p>December 1-3, 2022 Calcutta</p>
        </div>
    </div>
</section>
<section id="enent-wrapper">
    <div class="container">
        <h2>FLAGSHIP EVENT</h2>
        <div class="event-highlight">
            <div class="date">
                <div>
                    <h4>Dates</h4>
                    <?=$event->event_date?>
                </div>
            </div>
            <div class="venue">
                <div>
                    <h4>Venue</h4>
                    <?=$event->event_venue?>
                </div>
            </div>
            <div class="theme">
                <div>
                    <h4>Theme</h4>
                    <?=$event->event_theme?>
                </div>
            </div>
        </div>
        <div class="event-tab-wrapper">
            <div class="left-bar">
                <div class="stickey">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#overview" aria-controls="overview" role="tab"
                                data-toggle="tab"><img src="<?=base_url('/material/front/assets/icons/')?>/overview-icon.png" alt=" "> Overview</a></li>
                        <li role="presentation"><a href="#conference" aria-controls="conference" role="tab"
                                data-toggle="tab"><img src="<?=base_url('/material/front/assets/icons/')?>/conference-icon.png" alt=" "> Conference</a></li>
                        <li role="presentation"><a href="#agenda" aria-controls="agenda" role="tab"
                                data-toggle="tab"><img src="<?=base_url('/material/front/assets/icons/')?>/agenda-icon.png" alt=" "> Agenda</a></li>
                    </ul>
                    <div class="ticket">
                        <a href="<?=base_url('new-booking')?>"><img src="<?=base_url('/material/front/assets/images/')?>/head_ticket.svg" alt=""></a>
                    </div>
                </div>
            </div>

            <!-- Tab panes -->
            <div class="tab-content">
                
            <!-- <div class="ticket">
                        <a href="<?=base_url('new-booking')?>"><img src="<?=base_url('/material/front/assets/icons/')?>/ticket.png" alt=""></a>
                    </div> -->
                <div role="tabpanel" class="tab-pane active" id="overview">
                    <?=$event->overview_description?>
                </div>
                <div role="tabpanel" class="tab-pane" id="conference">
                    <?=$event->conference_desscription?>
                </div>
                <div role="tabpanel" class="tab-pane" id="agenda">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#dayOne" aria-controls="dayOne"
                                role="tab" data-toggle="tab">Day <span>1</span></a></li>
                        <li role="presentation"><a href="#dayTwo" aria-controls="dayTwo" role="tab"
                                data-toggle="tab">Day <span>2</span></a>
                        </li>
                        <li role="presentation"><a href="#dayThree" aria-controls="dayThree" role="tab"
                                data-toggle="tab">Day <span>3</span></a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="dayOne">
                            <h3>December 1, 2022</h3>
                            <?php
                            if($eventAgendas1){ foreach($eventAgendas1 as $eventAgenda){
                                $eventAgendaDetails = $common_model->find_data('event_agenda_details', 'array', ['agenda_id' => $eventAgenda->agenda_id, 'published' => 1]);
                            ?>
                            <div class="agenda-title-wrap">
                                <h4>
                                    <?=$eventAgenda->agenda_title?>
                                    <small>Venue: <?=$eventAgenda->agenda_venue?></small>
                                    <span class="caret"></span>
                                </h4>
                                <!-- <div class="agenda-row-ticket">
                                    <a href="<?=base_url('new-booking')?>">
                                        <img src="<?=base_url('/material/front/assets/icons/')?>/buy-ticket-icon.jpg" alt="<?=$eventAgenda->agenda_title?>"> BUY Ticket
                                    </a>
                                </div> -->
                            </div>                                
                                <div class="agenda-row">
                                    <ul>
                                        <?php if($eventAgendaDetails){ foreach($eventAgendaDetails as $row){?>
                                        <li>
                                            <div class="time"><?=$row->from_time?> hrs - <?=(($row->to_time!='')?$row->to_time.' hrs':'Onwards')?></div>
                                            <div class="excrpt"><?=$row->subject_line?></div>
                                            <div class="action">
                                                <ul>
                                                    <?php if($row->hall_number!=''){?><li><?=$row->hall_number?></li><?php }?>
                                                    <!-- <li class="wishList">
                                                        <a href="#!">
                                                            <img src="<?=base_url('/material/front/assets/icons/')?>/wishlist.png" alt=" ">
                                                        </a>
                                                    </li> -->
                                                </ul>
                                            </div>
                                        </li>
                                        <?php } }?>
                                    </ul>
                                </div>
                            <?php } }?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="dayTwo">
                            <h3>December 2, 2022</h3>
                            <?php
                            if($eventAgendas2){ foreach($eventAgendas2 as $eventAgenda){
                                $eventAgendaDetails = $common_model->find_data('event_agenda_details', 'array', ['agenda_id' => $eventAgenda->agenda_id, 'published' => 1]);
                            ?>
                            <div class="agenda-title-wrap">
                                <h4>
                                    <?=$eventAgenda->agenda_title?>
                                    <small>Venue: <?=$eventAgenda->agenda_venue?></small>
                                    <span class="caret"></span>
                                </h4>
                                <!-- <div class="agenda-row-ticket">
                                    <a href="<?=base_url('new-booking')?>">
                                        <img src="<?=base_url('/material/front/assets/icons/')?>/buy-ticket-icon.jpg" alt="<?=$eventAgenda->agenda_title?>"> BUY Ticket
                                    </a>
                                </div> -->
                            </div>                                
                                <div class="agenda-row">
                                    <ul>
                                        <?php if($eventAgendaDetails){ foreach($eventAgendaDetails as $row){?>
                                        <li>
                                            <div class="time"><?=$row->from_time?> hrs - <?=(($row->to_time!='')?$row->to_time.' hrs':'Onwards')?></div>
                                            <div class="excrpt"><?=$row->subject_line?></div>
                                            <div class="action">
                                                <ul>
                                                    <?php if($row->hall_number!=''){?><li><?=$row->hall_number?></li><?php }?>
                                                    <!-- <li class="wishList">
                                                        <a href="#!">
                                                            <img src="<?=base_url('/material/front/assets/icons/')?>/wishlist.png" alt=" ">
                                                        </a>
                                                    </li> -->
                                                </ul>
                                            </div>
                                        </li>
                                        <?php } }?>
                                    </ul>
                                </div>
                            <?php } }?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="dayThree">
                            <h3>December 3, 2022</h3>
                            <?php
                            if($eventAgendas3){ foreach($eventAgendas3 as $eventAgenda){
                                $eventAgendaDetails = $common_model->find_data('event_agenda_details', 'array', ['agenda_id' => $eventAgenda->agenda_id, 'published' => 1]);
                            ?>
                            <div class="agenda-title-wrap">
                                <h4>
                                    <?=$eventAgenda->agenda_title?>
                                    <small>Venue: <?=$eventAgenda->agenda_venue?></small>
                                    <span class="caret"></span>
                                </h4>
                                <!-- <div class="agenda-row-ticket">
                                    <a href="<?=base_url('new-booking')?>">
                                        <img src="<?=base_url('/material/front/assets/icons/')?>/buy-ticket-icon.jpg" alt="<?=$eventAgenda->agenda_title?>"> BUY Ticket
                                    </a>
                                </div> -->
                            </div>                                
                                <div class="agenda-row">
                                    <ul>
                                        <?php if($eventAgendaDetails){ foreach($eventAgendaDetails as $row){?>
                                        <li>
                                            <div class="time"><?=$row->from_time?> hrs - <?=(($row->to_time!='')?$row->to_time.' hrs':'Onwards')?></div>
                                            <div class="excrpt"><?=$row->subject_line?></div>
                                            <div class="action">
                                                <ul>
                                                    <?php if($row->hall_number!=''){?><li><?=$row->hall_number?></li><?php }?>
                                                    <!-- <li class="wishList">
                                                        <a href="#!">
                                                            <img src="<?=base_url('/material/front/assets/icons/')?>/wishlist.png" alt=" ">
                                                        </a>
                                                    </li> -->
                                                </ul>
                                            </div>
                                        </li>
                                        <?php } }?>
                                    </ul>
                                </div>
                            <?php } }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>