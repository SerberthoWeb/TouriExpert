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
                            <input id="txtId" value="<?= $journey->getId(); ?>" name="textinput" disabled="true" placeholder="placeholder" class="form-control input-md" type="text"> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="txtName"><?= $this->lang->line('journey_name'); ?></label>  
                        <div class="col-md-10">
                            <input id="txtName" value="<?= $journey->getName(); ?>" name="textinput" disabled="true" placeholder="placeholder" class="form-control input-md" type="text"> 
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
    <div class="row">
        <div class="col-lg-5">
            <div class="row">
                <div class="col-lg-12"><h3>Informationen</h3></div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <span class="h4"><?= $journey->getName(); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <span><b><?= $this->lang->line('journey_id'); ?></b></span>
                </div>
                <div class="col-lg-10">
                    <span><?= $journey->getId(); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <span><b><?= $this->lang->line('journey_destination'); ?></b></span>
                </div>
                <div class="col-lg-10">
                    <span><?= $journey->getDestinationTxt(); ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <span><b><?= $this->lang->line('journey_guide_name'); ?></b></span>
                </div>
                <div class="col-lg-10">
                    <span><?= $journey->getGuide()->getFirstname() . ' ' . $journey->getGuide()->getLastname(); ?></span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-lg-2">
                    <span class=""><b><?= $this->lang->line('journey_description'); ?></b></span>
                </div>
                <div class="col-lg-10">
                    <span><?= $journey->getDescription(); ?></span>
                </div>
            </div>
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