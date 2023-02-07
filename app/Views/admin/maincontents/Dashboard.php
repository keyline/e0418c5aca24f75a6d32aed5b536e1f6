<div class="pcoded-content">
    <center><h1>Welcome to ABP Podcast Master Admin</h1></center><br>
    <div class="row">
        <div class="col-md-4 col-xl-6">
            <a href="<?php echo base_url('admin/manage_poll/'); ?>">
                <div class="card bg-c-green order-card">
                    <div class="card-body">
                        <h6 class="text-white">Polls</h6>
                        <h2 class="text-right text-white"><i class="fas fa-clipboard-list float-left"></i><span>
                            <?=$poll_count?>
                        </span></h2>                        
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-xl-6">
            <a href="<?= base_url('admin/manage_quize_questions') ?>">
                <div class="card bg-c-yellow order-card">
                    <div class="card-body">
                        <h6 class="text-white">Quizzes</h6>
                        <h2 class="text-right text-white"><i class="fas fa-clipboard-list float-left"></i><span>
                            <?=$quiz_count?>
                        </span></h2>                        
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-xl-6">
            <a href="<?php echo base_url('admin/manage_user/'); ?>">
                <div class="card bg-c-blue order-card">
                    <div class="card-body">
                        <h6 class="text-white">Users</h6>
                        <h2 class="text-right text-white"><i class="fas fa-clipboard-list float-left"></i><span>
                            <?=$users_count?>
                        </span></h2>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-xl-6">
            <a href="<?= base_url('admin/manage_medias') ?>">
                <div class="card bg-c-red order-card">
                    <div class="card-body">
                        <h6 class="text-white">Medias</h6>
                        <h2 class="text-right text-white"><i class="fas fa-clipboard-list float-left"></i><span>
                            <?=$media_count?>
                        </span></h2>                        
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>