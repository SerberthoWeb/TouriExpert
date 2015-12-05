<!DOCTYPE html>
<html lang="en">
    <head>

        <link rel="shortcut icon" href="<?php echo base_url('bootstrap/ico/favicon.ico'); ?>">

        <title><?php echo $this->lang->line('system_system_name'); ?></title>

        <!-- Bootstrap CSS -->
        <link href="<?php echo base_url('bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <!-- Bootstrap-Theme -->
        <link href="<?php echo base_url('bootstrap/css/bootstrap-theme.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('bootstrap/css/bootstrap-theme.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('bootstrap/css/pagination.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('bootstrap/fonts/glyphicons-halflings-regular.eot'); ?>" rel="stylesheet">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <!-- Custom styles für dieses Template -->
        <link href="<?php echo base_url('bootstrap/css/theme.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('bootstrap/css/myStyle.css'); ?>" rel="stylesheet">

        <!-- Javascript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

        <script src="<?php echo base_url('bootstrap/js/bootstrap.js'); ?>"></script>
        <script src="<?php echo base_url('bootstrap/js/jQuery.js'); ?>"></script>


    </head>

    <body class="showcase" role="document">
        <div class="container theme-showcase" role="main">
            <!-- Beginn des Wrapper -->
            <div id="wrap" class="container">
                <?php $this->load->view('common/Top_Nav'); ?>
                <?php $this->load->view($site); ?>
            </div>
            <!-- Ende des Wrapper -->
        </div>

        <div id="footer">

            <p class="pull-right">Serbertho Reisen. Alle Rechte vorbehalten. &copy; Copyright <?= date('Y') ?></p>

        </div> <!-- /#Footer -->
    </div>


</body>
</html>

