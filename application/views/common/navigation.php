<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?=
            anchor('Welcome'
                    , 'TouriExpert'
                    , array(
                'class' => 'navbar-brand'
            ));
            ?>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <?php if ($user) : ?>
                <ul class="nav navbar-nav">
                    <li 
                        <?= ($active == 'customer' ? 'class="active"' : '') ?>>
                        <?=
                        anchor('Customer'
                                , $this->lang->line('nav_customer')
                        );
                        ?>
                    </li>
                    <li <?= ($active == 'journey' ? 'class="active"' : '') ?>>
                        <?=
                        anchor('Journey'
                                , $this->lang->line('nav_journey')
                        );
                        ?>
                    </li>
                    <li <?= ($active == 'guide' ? 'class="active"' : '') ?>>
                        <?=
                        anchor('Journey'
                                , $this->lang->line('nav_guide')
                        );
                        ?>
                    </li>
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <?=
                        anchor('Login/logout'
                                , '<span class="glyphicon glyphicon-log-out"></span>&nbsp;' . $this->lang->line('nav_logout')
                        );
                        ?>
                    </li>
                </ul>
            <?php else : ?>
                <ul class="nav navbar-nav pull-right">
                    <li class="active">
                        <?=
                        anchor('Login'
                                , '<span class="glyphicon glyphicon-log-in"></span>&nbsp;' . $this->lang->line('nav_login')
                        );
                        ?>
                    </li>
                </ul>
            <?php endif ?>
        </div>
    </div>
</nav>
