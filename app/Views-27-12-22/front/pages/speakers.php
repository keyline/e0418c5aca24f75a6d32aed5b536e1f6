<section class="inside_header">
    <img src="<?= base_url('/uploads/page/' . $pageContent->image) ?>" alt="<?= $pageContent->page_name ?>">
</section>
<h1 style="display: none;"><?= $page_header ?></h1>
<div class="container py-4">
    <div class="title-wrap pt-5 pb-3">
            <div class="rainbow">
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            <h2><?= $page_header ?></h2>

            <div class="rainbow">
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-12">
                <div class="speaker_section">
                    <ul class="profile-list-page d-flex flex-wrap">
                        <!-- <div class="carousle-block">
                            <div class="img-circle-wrapper">
                                <div class="img-wrapper">
                                    <img src="https://indiainfocom.com/uploads/speakers/1667974808Shailender-Kumar.jpg" alt="Shailender Kumar">
                                </div>
                            </div>
                            <div class="carousle-block-content">
                                <h4>Shailender Kumar</h4>
                                <p>MD</p>
                                <p>Oracle India Pvt Ltd</p>
                            </div>
                        </div> -->


                        <?php if ($speakers) { $i = 1; foreach ($speakers as $row) { ?>
                        <li class="text-center line-content">
                            <div class="carousle-block">
                                <div class="img-circle-wrapper">
                                    <div class="img-wrapper">
                                        <img src="<?=base_url('/uploads/speakers/'.$row->image)?>" alt="<?=$row->name?>" class="img-fluid">
                                    </div>
                                </div>
                                <div class="carousle-block-content">
                                    <h4><?=$row->name?></h4>
                                    <p><?=$row->designation?></p>
                                    <p><?=$row->company_name?></p>
                                </div>
                            </div>

                            <!-- <div class="student-img-wrapper mb-3">
                                <img src="<?=base_url('/uploads/speakers/'.$row->image)?>" alt="<?=$row->name?>" class="img-fluid">
                            </div>
                            <h3><?=$row->name?></h3>
                            <hr class="mb-2">
                            <div class="exp mb-2">
                                <h4><?=$row->designation?></h4>
                                <h4><?=$row->company_name?></h4>
                            </div> -->
                        </li>
                        <?php } } ?>
                    </ul>
                </div>

                <!-- <div class="pagination">
                    <ul>
                        <li><a href="#">1</a></li>
                        <li class="active">2</li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">6</a></li>
                        <li><a href="#">7</a></li>
                    </ul>
                </div> -->
                <div class="pagination">
                    <ul id="pagin" class="pagination">

                    </ul>
                </div>
            </div>
        </div>

    <div class="clear"></div>
</div>