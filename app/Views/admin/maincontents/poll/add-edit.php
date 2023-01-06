<?php //pr($row);
if($row) {
    $poll_title                = $row->poll_title;
    // $poll_option               = $row->poll_option;
} else {
    $poll_title                = set_value('poll_title', '');
    // $poll_option               = set_value('poll_option', '');
}
?>
<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/'); ?>/<?php echo $moduleDetail['controller']; ?>">Manage <?php echo $moduleDetail['module']; ?></a></li>
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
                    <h5><?php echo $page_header; ?></h5>
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
                </div>
                <div class="card-body">
                    <form id="validation-form123" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="small_text">Poll Title</label>
                                    <input type="text" class="form-control" name="poll_title" id="poll_title" placeholder="Enter Poll Title" value="<?php echo $poll_title; ?>" required="required">
                                </div>
                            </div>

                            <?php if(!empty($functions)){ for($k=0;$k<count($functions);$k++){  ?>
                                <div class="col-md-12">
                                    <div class="field_wrapper1">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="function_name[]" value="<?php  echo $functions[$k]->poll_option ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } }?>

                            <div class="col-md-12">
                                <div class="field_wrapper">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" class="form-control" name="function_name[]" placeholder="Option Title">
                                        </div>
                                        <div class="col-md-2">
                                            <a href="javascript:void(0);" class="add_button" title="Add field">
                                                <i class="fa fa-plus-circle fa-2x text-success"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn  btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        // alert();
        var maxField = 10;
        var addButton = $('.add_button');
        var wrapper = $('.field_wrapper');
        var fieldHTML = '<div class="row mt-3">\
                            <div class="col-md-4">\
                                <input type="text" class="form-control" name="function_name[]" placeholder="Option Title">\
                            </div>\
                            <div class="col-md-2">\
                                <a href="javascript:void(0);" class="remove_button" title="Add field">\
                                    <i class="fa fa-minus-circle fa-2x text-danger"></i>\
                                </a>\
                            </div>\
                        </div>';
        var x = 1;
        
        $(addButton).click(function(){
            if(x < maxField){ 
                x++;
                $(wrapper).append(fieldHTML);
            }
        });
        
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
            x--;
        });
    });
</script>