<div class="navbar-wrapper">
    <div class="navbar-content scroll-div " >
        <ul class="nav pcoded-inner-navbar ">                    

            <li class="nav-item"><a href="<?php echo base_url('Dashboard'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-arrow-right"></i></span><span class="pcoded-mtext">Dashboard</span></a></li>

            <li class="nav-item"><a href="<?php echo base_url('admin/manage_user/'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-arrow-right"></i></span><span class="pcoded-mtext">Manage User</span></a></li>

            <li class="nav-item"><a href="<?php echo base_url('admin/manage_advertisment/'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-arrow-right"></i></span><span class="pcoded-mtext">Advertisment</span></a></li>

            <li class="nav-item"><a href="<?php echo base_url('admin/manage_poll/'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-arrow-right"></i></span><span class="pcoded-mtext">Polls</span></a></li>

            <li class="nav-item pcoded-hasmenu">
                <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-arrow-right"></i></span><span class="pcoded-mtext">Quize</span></a>
                <ul class="pcoded-submenu">
                    <li><a href="<?= base_url('admin/manage_quize_title/') ?>">Quize Title</a></li>
                    <li><a href="<?= base_url('admin/manage_quize_questions') ?>">Quize Questions</a></li>
                </ul>
            </li>

            <li class="nav-item"><a href="<?php echo base_url('admin/manage_static_content/'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-arrow-right"></i></span><span class="pcoded-mtext">Static Pages</span></a></li>

            <li class="nav-item"><a href="<?php echo base_url('admin/manage_page/'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-arrow-right"></i></span><span class="pcoded-mtext">Page Banners</span></a></li>
            
            <li class="nav-item"><a href="<?php echo base_url('admin/manage_contact/enquiry_form'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-arrow-right"></i></span><span class="pcoded-mtext">Contact Enquiry</span></a></li>

            <li class="nav-item pcoded-hasmenu">
                <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-arrow-right"></i></span><span class="pcoded-mtext">Manage Media</span></a>
                <ul class="pcoded-submenu">
                    <!-- <li><a href="<?= base_url('admin/manage_season/') ?>">Season</a></li> -->
                    <li><a href="<?= base_url('admin/manage_show') ?>">Show</a></li>
                    <li><a href="<?= base_url('admin/manage_medias') ?>">Episode</a></li>
                </ul>
            </li>

            <li class="nav-item pcoded-hasmenu">&nbsp;</li>
        </ul>                
    </div>
</div>