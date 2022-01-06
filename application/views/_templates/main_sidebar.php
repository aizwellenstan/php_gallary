<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$name = array_column($projects, 'name');
array_multisort($name, SORT_ASC, $projects);
?>

            <aside class="main-sidebar">
                <section class="sidebar">
                    <!-- Sidebar menu -->
                    <ul class="sidebar-menu">

                        <li class="header text-uppercase"><?php echo lang('menu_main_navigation'); ?></li>
                        <li class="<?=active_link_controller('dashboard')?>">
                            <a href="<?php echo site_url('dashboard'); ?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>


                        <li class="header text-uppercase">專案</li>
                        <?php foreach($projects as $proj){?>
                        <li class="<?php echo ($this->uri->segment(3)==$proj['id'])?"active":"" ?>">
                            <a href="<?php echo site_url('photos/index/'.$proj['id'].'/0'); ?>">
                                <i class="fa fa-picture-o"></i> <span><?php echo $proj['name']?></span>
                            </a>
                        </li>
                        <?php }?>
                       
                    </ul>
                </section>
            </aside>
