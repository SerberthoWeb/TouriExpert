<?php
$this->lang->load('customer');
?>
<div class="container-fluid">
    <div class="row" style="padding-bottom: 10px;">
        <div class="btn-toolbar" role="toolbar">
            <div class="col-lg-6">
                <div class="btn-group" role="group">
                    <?=
                    anchor('Customer/create'
                            , '<span class="glyphicon glyphicon-plus"></span>&nbsp;' . $this->lang->line('customer_action_new')
                            , array(
                        'class' => 'btn btn-default',
                        'type' => 'button',
                        'data-toggle' => 'tooltip',
                        'data-placement' => "bottom",
                        'title' => $this->lang->line('customer_action_new_tooltip')
                    ));
                    ?>
                </div>
            </div>
            <div class="col-lg-3"></div>
            <div class="col-lg-3">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="<?= $this->lang->line('customer_search_placeholder'); ?>">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                            &nbsp;<?= $this->lang->line('customer_search_submit'); ?>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th class="col-md-3"><?= $this->lang->line('customer_firstname'); ?></th>
                        <th class="col-md-3"><?= $this->lang->line('customer_lastname'); ?></th>
                        <th class="col-md-3"><?= $this->lang->line('customer_email'); ?></th>
                        <th class="col-md-1"><?= $this->lang->line('customer_payment'); ?></th>
                        <th class="col-md-2"><?= $this->lang->line('customer_thead_action'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($customerList as $customer) : ?>
                        <tr>
                            <td><?= $customer->getFirstname(); ?></td>
                            <td><?= $customer->getLastname(); ?></td>
                            <td><?= $customer->getEmail(); ?></td>
                            <td><?= $customer->getPayment(); ?></td>
                            <td>
                                <div class="btn-toolbar " role="toolbar">
                                    <div class="btn-group" role="group">
                                        <?=
                                        anchor('Customer/addBooking/' . $customer->getId()
                                                , '<span class="glyphicon glyphicon-plus"></span>'
                                                , array(
                                            'class' => 'btn btn-default',
                                            'type' => 'button',
                                            'data-toggle' => 'tooltip',
                                            'data-placement' => "bottom",
                                            'title' => $this->lang->line('customer_action_add_booking')
                                        ));
                                        ?>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <?=
                                        anchor('Customer/detail/' . $customer->getId()
                                                , '<span class="glyphicon glyphicon-list-alt"></span>'
                                                , array(
                                            'class' => 'btn btn-default',
                                            'data-toggle' => 'tooltip',
                                            'data-placement' => "bottom",
                                            'title' => $this->lang->line('customer_action_detail')
                                        ));
                                        ?>
                                        <?=
                                        anchor('Customer/edit/' . $customer->getId()
                                                , '<span class="glyphicon glyphicon-edit"></span>'
                                                , array(
                                            'class' => 'btn btn-default',
                                            'data-toggle' => 'tooltip',
                                            'data-placement' => "bottom",
                                            'title' => $this->lang->line('customer_action_edit')
                                        ));
                                        ?>
                                        <?=
                                        anchor('Customer/delete/' . $customer->getId()
                                                , '<span class="glyphicon glyphicon-trash"></span>'
                                                , array(
                                            'class' => 'btn btn-default',
                                            'data-toggle' => 'tooltip',
                                            'data-placement' => "bottom",
                                            'title' => $this->lang->line('customer_action_delete')
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