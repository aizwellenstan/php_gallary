<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$active_zh = "";
$active_en = "";
($this->uri->segment(4)==1)?$active_zh = "active":$active_en = "active";

?>
<style>
.well label{
    padding-left: 10px;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <?php echo $pagetitle; ?>
        <?php echo $breadcrumb; ?>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                 <div class="box">
                    <div class="box-header with-border">
                    </div>
                    <div class="well">
                        <?php
                        
                            echo form_open('dashboard/add',  array('class' => 'form-inline reset-margin', 'id' => 'myform'));
                            echo form_label('專案名稱:', 'project_name');
                            echo form_input('project_name');

                            echo form_label('專案路徑:', 'project_path');
                            echo form_input('project_path');

                            echo form_label('');
                            $data_submit = array('name' => 'mysubmit', 'class' => 'btn btn-primary', 'value' => '新增');
                            echo form_submit($data_submit);
                            echo form_close();

                        ?>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>專案名稱</th>
                                    <th>專案路徑</th>
                                    <th>建立日期</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($projects as $item):?>
                                <tr>
                                    <td><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($item['path'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($item['create_date'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><a href="<?php echo base_url()?>dashboard/del/<?php echo $item['id']?>" class="btn btn-danger" onclick="return confirm('確定刪除?')">刪除</a></td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
             </div>
        </div>
    </section>

</div>

