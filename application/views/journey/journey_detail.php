<?php
$this->lang->load('journey');
$this->lang->load('customer');
?>
<div class="container-fluid">
    <div class="row">
        <div class="btn-toolbar" role="toolbar">
            <div class="col-lg-12">
                <div class="btn-group" role="group">
                    <?=
                    anchor('Journey/edit/' . $journey->getId()
                            , '<span class="glyphicon glyphicon-edit"></span>&nbsp;' . $this->lang->line('journey_action_edit')
                            , array(
                        'class' => 'btn btn-default',
                    ));
                    ?>
                    <?=
                    anchor('Journey/delete/' . $journey->getId()
                            , '<span class="glyphicon glyphicon-remove"></span>&nbsp;' . $this->lang->line('journey_action_delete')
                            , array(
                        'class' => 'btn btn-default',
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-12"><h3>Informationen</h3></div>
            </div>
            <form class="form-horizontal">
                <fieldset>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="txtId"><?= $this->lang->line('journey_id'); ?></label>  
                        <div class="col-md-10">
                            <input id="txtId" name="txtId" disabled="true" placeholder="placeholder" class="form-control input" type="text" value="<?= $journey->getId(); ?>"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="txtName"><?= $this->lang->line('journey_name'); ?></label>  
                        <div class="col-md-10">
                            <input id="txtName" name="txtName" disabled="true" placeholder="placeholder" class="form-control input-md" type="text" value="<?= $journey->getName(); ?>"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="txtDestination"><?= $this->lang->line('journey_destination'); ?></label>  
                        <div class="col-md-10">
                            <input id="txtDestination" name="txtDestination" disabled="true" placeholder="placeholder" class="form-control input-md" type="text" value="<?= $journey->getDestinationTxt(); ?>" > 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="drpDestination"><?= $this->lang->line('journey_guide_name'); ?></label>  
                        <div class="col-md-10">
                            <select id="selectbasic" name="selectbasic" class="form-control" disabled="true">
                                <option value="1" selected="true"><?= $journey->getGuide()->getFirstname() . ' ' . $journey->getGuide()->getLastname() ?></option>
                            </select> 
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-12"><h3>Buchungen</h3></div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php if ($journey->getBookingCount() > 0) : ?>
                        <table class="table table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th class="col-lg-6"><?= $this->lang->line('customer_firstname'); ?></th>
                                    <th class="col-lg-6"><?= $this->lang->line('customer_lastname'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bookingList as $booking) : ?>
                                    <tr>
                                        <td><?= $booking->getCustomer()->getFirstname(); ?></td>
                                        <td><?= $booking->getCustomer()->getLastname(); ?></td>
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