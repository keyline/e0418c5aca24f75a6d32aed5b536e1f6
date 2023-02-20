<?php
$this->session = \Config\Services::session();
$ASSETS_URL = getenv('ASSETS_URL');
$NO_IMAGE_URL   = getenv('NO_IMAGE_URL');
?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
if (!empty($social_metas)) {
    foreach ($social_metas as $meta) {
        ?>
    <meta name="<?=$meta['name']?>" content="<?=$meta['content']?>" />
    <?php
    }
}
?>
<!-- <meta name="google-signin-client_id" content="398026001275-b97l2gb1r1b35v089kkk1gn1gi46pi9m.apps.googleusercontent.com"> -->
<title>ABP-Podcast</title>
<link rel="icon" href="https://abp-podcast.keylines.in/uploads/1672119723WhatsApp Image 2022-12-27 at 11.06.49 AM.jpeg" type="image/x-icon">
<link rel="stylesheet" href="<?=$ASSETS_URL?>bootstrap/bootstrap-5.0.2-dist/bootstrap-5.0.2-dist/css/bootstrap-grid.min.css">
<link rel="stylesheet" href="<?=$ASSETS_URL?>fontawesome-free/css/all.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.1/flowbite.min.css"  rel="stylesheet" />
<!-- <link rel="stylesheet" href="<?=$ASSETS_URL?>splide-4.1.3/dist/css/splide.min.css"> -->
<link rel="stylesheet" href="<?=$ASSETS_URL?>owl3.css">
<link rel="stylesheet" href="<?=$ASSETS_URL?>css/style.css">
<link rel="stylesheet" href="<?=$ASSETS_URL?>css/responsive.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />



<style type="text/css">
    @keyframes ldio-0lvymc0w5sdn-1 {
      0% { top: 36px; height: 128px }
      50% { top: 60px; height: 80px }
      100% { top: 60px; height: 80px }
    }
    @keyframes ldio-0lvymc0w5sdn-2 {
      0% { top: 41.99999999999999px; height: 116.00000000000001px }
      50% { top: 60px; height: 80px }
      100% { top: 60px; height: 80px }
    }
    @keyframes ldio-0lvymc0w5sdn-3 {
      0% { top: 48px; height: 104px }
      50% { top: 60px; height: 80px }
      100% { top: 60px; height: 80px }
    }
    .ldio-0lvymc0w5sdn div { position: absolute; width: 30px }.ldio-0lvymc0w5sdn div:nth-child(1) {
      left: 35px;
      background: #e15b64;
      animation: ldio-0lvymc0w5sdn-1 1s cubic-bezier(0,0.5,0.5,1) infinite;
      animation-delay: -0.2s
    }
    .ldio-0lvymc0w5sdn div:nth-child(2) {
      left: 85px;
      background: #f8b26a;
      animation: ldio-0lvymc0w5sdn-2 1s cubic-bezier(0,0.5,0.5,1) infinite;
      animation-delay: -0.1s
    }
    .ldio-0lvymc0w5sdn div:nth-child(3) {
      left: 135px;
      background: #abbd81;
      animation: ldio-0lvymc0w5sdn-3 1s cubic-bezier(0,0.5,0.5,1) infinite;
      animation-delay: undefineds
    }

    .loadingio-spinner-pulse-4ofwcox9r54 {
      /* display: inline-block;*/
      /* overflow: hidden;*/
      background: rgba(0,0,0);
    margin: 0 auto;
    position: fixed;
    width: 100%;
    height: 100%;
    z-index: 999;
    opacity: 0.8;
    }
    
    .ldio-0lvymc0w5sdn {
      position: absolute;
      left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    width: 165px;
    height: 125px;
    }
    .ldio-0lvymc0w5sdn div { box-sizing: content-box; }
    /* generated by https://loading.io/ */
  /* header dropdown  */
    .dropbtn {
      /*background-color: #04AA6D;
      color: white;
      padding: 16px;
      font-size: 16px;
      border: none;*/
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 300px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
      right: 0;
    }
    .loginlept_welcome{
    text-align: center;
    text-transform: uppercase;
    padding: 10px;
    font-weight: 600;
    font-size: 20px;
    }
    .loginname_bg {
    text-align: center;
    background: #f9f9f9;
}
.dropdown-content button#disconnect {
    text-align: center;
    display: block;
    margin: 0 auto;
    background: #ff0000;
    color: #fff;
    width: 100%;
    padding: 10px;
    text-transform: uppercase;
    font-size: 20px;
}
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }
/* header dropdown  */
    .dropdown-content a:hover {background-color: #ddd;}

    .dropdown:hover .dropdown-content {display: block;}

    .dropdown:hover .dropbtn {}
  /* header dropdown  */
  /* load more */
    .content {        
        display: none;
      }
    .noContent {
      
    }
  /* load more */
</style>
<style type="text/css">
    .no-show{
        height: 476px !important;
    }
</style>