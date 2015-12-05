<!--/*
 *Navigationsleiste mit den Attributen:
*Userverwaltung
*Kosten
*Kunden
*Reisen
*Tour
*Rechnung
*Logout 
 */-->

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php echo anchor('HomeController', $this->lang->line('page_name'), 'class="navbar-brand"'); ?>
        </div>
        <div class="navbar-collapse collapse">

            <ul class="nav navbar-nav">
                    <li><?php echo anchor('JourneyController', $this->lang->line('top_nav_tourmanagement')); ?></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
<?php if ($this->session->userdata('logged_in') == TRUE) : ?>
                    <li><?php echo anchor('User_Controller/signout', $this->lang->line('top_nav_signout')); ?></li>
                    <li><?php echo anchor('User_Controller/edit_profile', $this->lang->line('top_nav_edit_profil')); ?></li>
<?php else : ?>
                    <li><?php echo anchor('User_Controller/signin', $this->lang->line('top_nav_signin')); ?></li>
<?php endif; ?>
            </ul>       
        </div>
    </div>
</div>
