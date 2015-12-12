<?php
$this->lang->load('journey');
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-warning text-center"><span class="glyphicon glyphicon-warning-sign"></span>&nbsp;Sind Sie sicher, dass diese Reise, deren Buchungunen und Kostenabrechnungen <b>vollständig</b> und <b>unwiderruflich</b> gelöscht werden sollen?</div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h1><?= $journey->getName(); ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <span><?= $this->lang->line('journey_id'); ?></span>
        </div>
        <div class="col-lg-10">
            <span><?= $journey->getId(); ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <span><?= $this->lang->line('journey_destination'); ?></span>
        </div>
        <div class="col-lg-10">
            <span><?= $journey->getDestinationTxt(); ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <span><?= $this->lang->line('journey_guide_name'); ?></span>
        </div>
        <div class="col-lg-10">
            <span><?= $journey->getGuide()->getFirstname() . ' ' . $journey->getGuide()->getLastname(); ?></span>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <span><?= $this->lang->line('journey_description'); ?></span>
        </div>
        <div class="col-lg-10">
            <span><?= $journey->getDescription(); ?></span>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-10">
                <?=
                anchor('Journey/delete/' . $journey->getId() . "/true"
                        , '<span class="glyphicon glyphicon-ok"></span>&nbsp;' . $this->lang->line('journey_action_ok')
                        , array(
                    'class' => 'btn btn-default'
                ));
                ?>


                <?=
                anchor($abordaction
                        , '<span class="glyphicon glyphicon-remove"></span>&nbsp;' . $this->lang->line('journey_action_cancel')
                        , array(
                    'class' => 'btn btn-default'
                ));
                ?>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>