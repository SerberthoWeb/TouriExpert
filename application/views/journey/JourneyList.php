<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$this->load->helper('date');
?>

<div>
    <table class="table table-hover table-bordered table-condensed">
        <thead>
            <tr class="info">      
                <th><a href="#"><?= $this->lang->line('tour_attribute_id') ?></a></th>
                <th><a href="#"><?= $this->lang->line('tour_attribute_name') ?></a></th>
                <th><a href="#"><?= $this->lang->line('tour_attribute_destination_name') ?></a></th>
                <th><a href="#"><?= $this->lang->line('tour_attribute_guide_name') ?></a></th> 
                <th><a href="#"><?= $this->lang->line('tour_attribute_start') ?></a></th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($journeyList as $journey) : ?>
                <tr>
                    <td><?= $journey->getId(); ?></td>
                    <td><?= anchor('JourneyController/detail/'.$journey->getId(), $journey->getName()); ?></td>
                    <td><?= $journey->getName(); ?></td>
                    <td><?= $journey->getGuide()->getName(); ?></td>
                    <td><?= mdate('%d/%m/%Y', mysql_to_unix($journey->getStart()));?></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>
