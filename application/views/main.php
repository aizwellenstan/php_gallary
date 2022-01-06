<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<script type="text/javascript" src="<?php echo base_url()."assets/frameworks/html5lightbox/html5lightbox.js"?>"></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/frameworks/textext/css/textext.core.css"/>
<link rel="stylesheet" href="<?php echo base_url()?>assets/frameworks/textext/css/textext.plugin.autocomplete.css"/>
<link rel="stylesheet" href="<?php echo base_url()?>assets/frameworks/textext/css/textext.plugin.clear.css"/>
<link rel="stylesheet" href="<?php echo base_url()?>assets/frameworks/textext/css/textext.plugin.focus.css"/>
<link rel="stylesheet" href="<?php echo base_url()?>assets/frameworks/textext/css/textext.plugin.prompt.css"/>
<link rel="stylesheet" href="<?php echo base_url()?>assets/frameworks/textext/css/textext.plugin.tags.css"/>

<script src="<?php echo base_url()?>assets/frameworks/textext/js/textext.core.js"></script>
<script src="<?php echo base_url()?>assets/frameworks/textext/js/textext.plugin.ajax.js"></script>
<script src="<?php echo base_url()?>assets/frameworks/textext/js/textext.plugin.autocomplete.js"></script>
<script src="<?php echo base_url()?>assets/frameworks/textext/js/textext.plugin.clear.js"></script>
<script src="<?php echo base_url()?>assets/frameworks/textext/js/textext.plugin.filter.js"></script>
<script src="<?php echo base_url()?>assets/frameworks/textext/js/textext.plugin.focus.js"></script>
<script src="<?php echo base_url()?>assets/frameworks/textext/js/textext.plugin.prompt.js"></script>
<script src="<?php echo base_url()?>assets/frameworks/textext/js/textext.plugin.suggestions.js"></script>
<script src="<?php echo base_url()?>assets/frameworks/textext/js/textext.plugin.tags.js"></script>
<style>
  .containner{
    width: 350px;
    height: 220px;
    background-color: #222;
    margin: 5px;
  }
  .containner img{
    /*height: 85%;*/
  }
  .col-xs-12 img{
    max-width: 100%;
    max-height: 100%;
  }
  .filename{
    font-size: 1.4em;
    font-weight: bold;
  }
  .seq-list{
    float: right;
    background: transparent;
    margin-top: 0;
    margin-bottom: 0;
    font-size: 1.1em;
    font-weight: bold;
    padding: 7px 5px;
    position: absolute;
    top: 15px;
    right: 10px;
    border-radius: 2px;
    background-color: #fff;
  }
  .seq-list li{
    display: inline-block;
  }
  .seq-list>li+li:before {
    padding: 0 5px;
    color: #222;
    content: "|\00a0";
  }
  .seq-list .active a{
    color: #77fdbf !important;
  }
  .content-header>h1{
    color: #fff;
  }

  .page-title {
  font-size: 20px;
  line-height: 50px;
  text-align: center;
  color: #fff;
}
</style>
<header class="main-header">
    <a href="<?php echo site_url('admin/dashboard'); ?>" class="logo">
        <span class="logo-mini"><?php echo $title_mini; ?></span>
        <span class="logo-lg"><b></b><?php echo $title_lg; ?></span>
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <span class="page-title"><?php echo $pagetitle; ?></span>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                 <li>
                  <select class='seq-list' onchange="location = this.value;">
                    <?php 
                      foreach ($sequences as $seq) {
                        $seq = basename($seq);
                        $selected = ($seq == $pick_sequence)? "selected" : "";
                        echo "<option value='../".$project[0]['id']."/".$seq."' $selected>$seq</li>";
                      }
                    ?>
                  </select>
                 </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $this->session->userdata('user_name'); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="<?php echo base_url($avatar_dir . '/m_001.png'); ?>" class="img-circle" alt="User Image">
                            <p><?php echo $this->session->userdata('role')?></p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="<?php echo site_url('auth/logout/admin'); ?>" class="btn btn-default btn-flat"><?php echo lang('header_sign_out'); ?></a>
                            </div>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>
<div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <?php foreach($files as $file){
              $photo = str_replace("/var/www/html/", "../../../../", $file);
          ?>
          <div class="col-md-4 col-sm-6 col-xs-12 containner">
              <a href="<?php echo $photo?>" class="html5lightbox" data-width="1440" data-height="900" data-group="mygroup" title="<?php echo basename($file)?>">
              <img src="<?php echo $photo?>">
              <div class='filename'><?php echo basename($photo)?></div>
              </a>
          </div>
          <?php }?>
        </div>
        </div>
    </section>
</div>

