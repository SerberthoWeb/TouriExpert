<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div>
    <table class="table table-bordered">
        <tr>
            <td><?= $this->lang->line('tour_attribute_id') ?></td>
            <td><?= $journey->getId() ?></td>
        </tr>
        <tr>
            <td><?= $this->lang->line('tour_attribute_name') ?></td>
            <td><?= $journey->getName() ?></td>
        </tr>
        <tr>
            <td><?= $this->lang->line('tour_attribute_destination_name') ?></td>
            <td><?= $journey->getDestination()->getName() ?></td>
        </tr>
    </table>
    <button type="button" class="btn btn-default"><?= $this->lang->line('button_edit') ?></button>
</div>