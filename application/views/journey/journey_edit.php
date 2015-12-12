<?php
$this->lang->load('journey');
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
            echo form_open("Journey/edit/" . $journey->getId(), $attributes);
            ?>
            <fieldset>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="txt_id"><?= $this->lang->line('journey_id'); ?></label>  
                    <div class="col-md-10">
                        <input id="txt_id" name="txt_id" disabled="true" class="form-control input" type="text" value="<?= $journey->getId(); ?>"> 
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="txt_name"><?= $this->lang->line('journey_name'); ?></label>  
                    <div class="col-md-10">
                        <input id="txt_name" name="txt_name" placeholder="<?= $this->lang->line('journey_name_placeholder'); ?>" class="form-control input-md" type="text" value="<?= $journey->getName(); ?>"> 
                        <span class="text-danger"><?= form_error('txt_name'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="txt_destination"><?= $this->lang->line('journey_destination'); ?></label>  
                    <div class="col-md-10">
                        <input id="txt_destination" name="txt_destination" placeholder="placeholder" class="form-control input-md" type="text" value="<?= $journey->getDestinationTxt(); ?>" > 
                        <span class="text-danger"><?= form_error('txt_destination'); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="drp_guide"><?= $this->lang->line('journey_guide_name'); ?></label>  
                    <div class="col-md-10">
                        <?=
                        form_dropdown('drp_guide', $guideSelection, $journey->getGuideId(), array(
                            'class' => 'form-control',
                            'name' => 'drp_guide'
                        ));
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="txt_description"><?= $this->lang->line('journey_description'); ?></label>  
                    <div class="col-md-10">
                        <textarea id="txt_description" name="txt_description" class="form-control"><?= $journey->getDescription(); ?></textarea>
                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <?=
                    anchor('Journey/edit/' . $journey->getId()
                            , '<span class="glyphicon glyphicon-save" style="font"></span>&nbsp;' . $this->lang->line('journey_action_save')
                            , array(
                        'class' => 'btn btn-default',
                        'id' => 'btn_save'
                    ));
                    ?>
                    <?=
                    anchor($abordaction
                            , '<span class="glyphicon glyphicon-remove"></span>&nbsp;' . $this->lang->line('journey_action_cancel')
                            , array(
                        'class' => 'btn btn-default',
                        'id' => 'btn_cancel'
                    ));
                    ?>
                </div>
            </fieldset>
<?= form_close(); ?>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-12"><h3>Buchungen</h3></div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <?=
                    anchor('Journey/addBooking' . $journey->getId()
                            , '<span class="glyphicon glyphicon-plus"></span>&nbsp;' . $this->lang->line('journey_booking')
                            , array(
                        'class' => 'btn btn-default',
                        'type' => 'button',
                        'data-toggle' => 'tooltip',
                        'data-placement' => "bottom",
                        'title' => $this->lang->line('journey_action_add_booking')
                    ));
                    ?>
                </div>
                <div class="col-lg-6 text-right"><b><?= $journey->getBookingCount() . $this->lang->line('journey_of') . $journey->getMaxBookings() ?></b></div>
            </div>
            <div class="row">
                <div class="col-lg-12">
<?php if ($journey->getBookingCount() > 0) : ?>
                        <table class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th class="col-lg-5"><?= $this->lang->line('customer_firstname'); ?></th>
                                    <th class="col-lg-5"><?= $this->lang->line('customer_lastname'); ?></th>
                                    <th class="col-lg-2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                        <?php foreach ($bookingList as $booking) : ?>
                                    <tr>
                                        <td><?= $booking->getCustomer()->getFirstname(); ?></td>
                                        <td><?= $booking->getCustomer()->getLastname(); ?></td>
                                        <td>
                                            <?=
                                            anchor('Booking/delete/' . $booking->getId()
                                                    , '<span class="glyphicon glyphicon-trash"></span>'
                                                    , array(
                                                'class' => 'btn btn-default',
                                                'type' => 'button',
                                                'data-toggle' => 'tooltip',
                                                'data-placement' => "bottom",
                                                'title' => $this->lang->line('journey_action_delete')
                                            ));
                                            ?>
                                        </td>
                                    </tr>
                        <?php endforeach; ?>
                            </tbody>
                        </table>
<?php else : ?>
                        <div class="alert-info">Es wurden keine Buchungen gefunden!</div>
<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
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