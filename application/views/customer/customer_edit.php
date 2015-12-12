<?php
$this->lang->load('customer');
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-12"><h3>Informationen</h3></div>
            </div>
            <?php
            $attributes = array("class" => "form-horizontal", "id" => "editform", "name" => "editform");
            echo form_open("Customer/edit/" . $customer->getId(), $attributes);
            ?>
            <fieldset>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="txt_id"><?= $this->lang->line('customer_id'); ?></label>  
                    <div class="col-md-10">
                        <input id="txt_id" name="txt_id" disabled="true" class="form-control input" type="text" value="<?= $customer->getId(); ?>"> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="txt_firstname"><?= $this->lang->line('customer_firstname'); ?></label>  
                    <div class="col-md-10">
                        <input id="txt_firstname" name="txt_firstname" placeholder="<?= $this->lang->line('journey_name_placeholder'); ?>" class="form-control input-md" type="text" value="<?= $customer->getFirstname(); ?>"> 
                        <span class="text-danger"><?= form_error('txt_firstname'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="txt_destination"><?= $this->lang->line('customer_lastname'); ?></label>  
                    <div class="col-md-10">
                        <input id="txt_destination" name="txt_destination" placeholder="placeholder" class="form-control input-md" type="text" value="<?= $customer->getLastname(); ?>" > 
                        <span class="text-danger"><?= form_error('txt_destination'); ?></span>
                    </div>
                </div>
                
                     <div class="form-group">
                    <label class="col-md-2 control-label" for="txt_destination"><?= $this->lang->line('customer_email'); ?></label>  
                    <div class="col-md-10">
                        <input id="txt_destination" name="txt_destination" placeholder="placeholder" class="form-control input-md" type="text" value="<?= $customer->getEmail(); ?>" > 
                        <span class="text-danger"><?= form_error('txt_destination'); ?></span>
                    </div>
                </div>
                
                
                     <div class="form-group">
                    <label class="col-md-2 control-label" for="txt_destination"><?= $this->lang->line('customer_payment'); ?></label>  
                    <div class="col-md-10">
                        <input id="txt_destination" name="txt_destination" placeholder="placeholder" class="form-control input-md" type="text" value="<?= $customer->getPayment(); ?>" > 
                        <span class="text-danger"><?= form_error('txt_destination'); ?></span>
                    </div>
                </div>
                
                
                
<?=
                    anchor('Customer/edit/' . $customer->getId()
                            , '<span class="glyphicon glyphicon-save" style="font"></span>&nbsp;' . $this->lang->line('customer_action_save')
                            , array(
                        'class' => 'btn btn-default',
                        'id' => 'btn_save'
                    ));
                    ?>
                    <?=
                    anchor('Customer'
                            , '<span class="glyphicon glyphicon-remove"></span>&nbsp;' . $this->lang->line('customer_action_cancel')
                            , array(
                        'class' => 'btn btn-default',
                        'id' => 'btn_cancel'
                    ));
               
                    ?>
                </div>
            </fieldset>
<?= form_close(); ?>
        </div>
<script>
    $(document).ready(function() {
        $('#btn_save').click(function(event) {
            $('<input />').attr('type', 'hidden')
                    .attr('name', 'btn_save')
                    .attr('value', 'Save')
                    .appendTo('#editform');
            $('#editform').submit();
            event.preventDefault();
        });
    });
</script>