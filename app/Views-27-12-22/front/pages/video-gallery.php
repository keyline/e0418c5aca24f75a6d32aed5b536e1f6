<section class="inside_header">
    <img src="<?= base_url('/uploads/page/' . $pageContent->image) ?>" alt="<?= $pageContent->page_name ?>">
</section>
<div class="container py-4">
    <h1><?= $page_header ?></h1>
    <div class="comn_text">
        <div class="row">
            <?php if ($videos) {
                $i = 1;
                foreach ($videos as $row) { ?>
                    <!-- <div class="line-content"> -->
                        <div class="col-md-4 line-content">
                            <div class="video-thumb-click" data-video="<?= $row->video_code ?>">
                                <div class="video-main">
                                    <div class="waves-block">
                                        <div class="waves wave-1"></div>
                                        <div class="waves wave-2"></div>
                                        <div class="waves wave-3"></div>
                                    </div>
                                    <span class="video-play"><i class="fa fa-play"></i></span>
                                </div>
                                <img src="https://img.youtube.com/vi/<?= $row->video_code ?>/hqdefault.jpg" alt="" width="566" height="362">
                            </div>
                            <h4><?= $row->video_title ?></h4>
                        </div>
                        <!-- <div class="line-content">
                            <iframe width="100%" height="185" src="https://www.youtube.com/embed/<?= $row->video_code ?>" title="<?= $row->video_title ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <h4><?= $row->video_title ?></h4>
                        </div> -->
                    <!-- </div> -->
            <?php }
            } ?>
        </div>
        <div class="sucessname_pagination" style="text-align: center;">
            <ul id="pagin" class="pagination">

            </ul>
        </div>
    </div>
    <div class="clear"></div>
</div>