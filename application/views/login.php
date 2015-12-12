<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="container well">
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "loginform", "name" => "loginform");
            echo form_open("Login", $attributes);
            ?>
            <fieldset>
                <div id="legend">
                    <legend><?= $this->lang->line('form_login_title'); ?></legend>
                </div>
                <div class="form-group row">
                    <!-- Username -->
                    <label class="col-md-2 control-label"  for="txt_username"><?= $this->lang->line('form_login_username'); ?></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="txt_username" name="txt_username" placeholder="">
                        <span class="text-danger"><?= form_error('txt_username'); ?></span>
                    </div>
                </div>
                <div class="form-group row">
                    <!-- Username -->
                    <label class="col-md-2 control-label"  for="txt_password"><?= $this->lang->line('form_login_password'); ?></label>
                    <div class="col-md-10">
                        <input class="form-control" type="password" id="txt_password" name="txt_password" placeholder="">
                        <span class="text-danger"><?= form_error('txt_password'); ?></span>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12 text-center">
                        <input id="btn_login" name="btn_login" type="submit" class="btn btn-default" value="<?= $this->lang->line('form_login_submit'); ?>" />
                        <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="<?= $this->lang->line('form_login_reset'); ?>" />
                    </div>
                </div>
            </fieldset>
            <?= form_close(); ?>
            <?php if ($this->session->flashdata('invalid_login')) : ?>
                <div class="alert alert-danger text-center"><?= $this->session->flashdata('invalid_login') ?></div>
            <?php endif ?>
</div>