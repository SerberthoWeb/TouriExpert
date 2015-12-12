<?php
$this->lang->load('journey');
?>
<section>
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 10px;">
            <div class="btn-toolbar" role="toolbar">
                <div class="col-lg-9">
                    <div class="btn-group" role="group">
                        <?=
                        anchor('Journey/create'
                                , '<span class="glyphicon glyphicon-plus"></span>&nbsp;' . $this->lang->line('journey_action_new')
                                , array(
                            'class' => 'btn btn-default',
                            'type' => 'button',
                            'data-toggle' => 'tooltip',
                            'data-placement' => "bottom",
                            'title' => $this->lang->line('journey_action_new_tooltip')
                        ));
                        ?>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="<?= $this->lang->line('journey_search_placeholder'); ?>">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                                &nbsp;<?= $this->lang->line('journey_search_submit'); ?>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
</section>
<div class="row">
    <div class="col-md-12">
        <table class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th class="col-md-1"><?= $this->lang->line('journey_id'); ?></th>
                    <th class="col-md-3"><?= $this->lang->line('journey_name'); ?></th>
                    <th class="col-md-2"><?= $this->lang->line('journey_destination'); ?></th>
                    <th class="col-md-3"><?= $this->lang->line('journey_guide_name'); ?></th>
                    <th class="col-md-1"><?= $this->lang->line('journey_bookings'); ?></th>
                    <th class="col-md-2"><?= $this->lang->line('journey_thead_action'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($journeyList as $journey) : ?>
                    <tr>
                        <td><?= $journey->getId(); ?></td>
                        <td><?= anchor('Journey/detail/' . $journey->getId(), $journey->getName()); ?></td>
                        <td><?= $journey->getDestinationTxt(); ?></td>
                        <td><?= $journey->getGuide()->getFirstname() . '&nbsp;' . $journey->getGuide()->getLastname(); ?></td>
                        <td><?= $journey->getBookingCount() . $this->lang->line('journey_of') . $journey->getMaxBookings() ?></td>
                        <td>
                            <div class="btn-toolbar" role="toolbar">
                                <?=
                                anchor('Journey/addBooking/' . $journey->getId()
                                        , '<span class="glyphicon glyphicon-plus"></span>'
                                        , array(
                                    'class' => 'btn btn-default',
                                    'data-toggle' => 'tooltip',
                                    'data-placement' => "bottom",
                                    'title' => $this->lang->line('journey_action_add_booking')
                                ));
                                ?>
                                <div class="btn-group" role="group">
                                    <?=
                                    anchor('Journey/detail/' . $journey->getId()
                                            , '<span class="glyphicon glyphicon-list-alt"></span>'
                                            , array(
                                        'class' => 'btn btn-default',
                                        'data-toggle' => 'tooltip',
                                        'data-placement' => "bottom",
                                        'title' => $this->lang->line('journey_action_detail')
                                    ));
                                    ?>
                                    <?=
                                    anchor('Journey/edit/' . $journey->getId()
                                            , '<span class="glyphicon glyphicon-edit"></span>'
                                            , array(
                                        'class' => 'btn btn-default',
                                        'data-toggle' => 'tooltip',
                                        'data-placement' => "bottom",
                                        'title' => $this->lang->line('journey_action_edit')
                                    ));
                                    ?>
                                    <?=
                                    anchor('Journey/delete/' . $journey->getId()
                                            , '<span class="glyphicon glyphicon-trash"></span>'
                                            , array(
                                        'class' => 'btn btn-default',
                                        'data-toggle' => 'tooltip',
                                        'data-placement' => "bottom",
                                        'title' => $this->lang->line('journey_action_delete')
                                    ));
                                    ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip({container: 'body'});
    });
</script>