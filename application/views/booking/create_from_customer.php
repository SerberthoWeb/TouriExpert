
<!-- Haupttitelanzeige -->
<h2><?php echo $page_heading; ?></h2>
<br/>


<button class="btn btn-primary" onClick="window.location.href = '<?php echo base_url(); ?>index.php/users/new_user';
                return false;"><?php echo $this->lang->line('common_form_elements_new_user'); ?></button>         
<button class="btn btn-primary" style="margin-left: 82%;" onClick="window.location.href = '<?php echo base_url(); ?>index.php/makepdf/users';
                return false;"><?php echo $this->lang->line('common_form_elements_make_pdf'); ?></button><br/>




<!-- Tabelle wird generiert durch Bootstrap -->
<br/>
<table class="table table-hover table-bordered table-condensed">
    <thead>
        <tr class="info">      
            <th><a href="<?= site_url('/users/index/' . $per_page . '/usr_lname/' . $order['usr_lname'] . '/0') ?>">Name</a></th>
            <th><a href="<?= site_url('/users/index/' . $per_page . '/usr_fname/' . $order['usr_fname'] . '/0') ?>">Vorname</a></th>
            <th><a href="<?= site_url('/users/index/' . $per_page . '/usr_email/' . $order['usr_email'] . '/0') ?>">Email</a></th>
            <th>Aktion</th>                     
        </tr>
    </thead>	
    <tbody>
        <?php if ($query->num_rows() > 0) : ?>
            <?php foreach ($query->result() as $row) : ?>
                <tr>
                    <td><?php echo $row->usr_lname; ?></td>
                    <td><?php echo $row->usr_fname; ?></td>
                    <td><?php echo $row->usr_email; ?></td>
                    <td>&nbsp;&nbsp;&nbsp;<?php
                        echo anchor('users/edit_user/' .
                                $row->usr_id, '<span class="glyphicon glyphicon-pencil" data-toggle="tooltip" title="Bearbeiten"></span>', $this->lang->line('common_form_elements_action_edit'));
                        ?> 
                        &nbsp;&nbsp;&nbsp;
                        <?php
                        echo anchor('users/delete_user/' .
                                $row->usr_id, '<span class="glyphicon glyphicon-remove"data-toggle="tooltip" title="Löschen"></span>', $this->lang->line('common_form_elements_action_delete'));
                        ?> 
                    </td>
                </tr>	        
    <?php endforeach; ?>
<?php else : ?>
            <tr>
                <td colspan="12" class="info">Keine User hier!</td>
            </tr>			
<?php endif; ?>



    </tbody>
</table>


