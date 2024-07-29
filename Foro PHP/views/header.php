<header>
<script src="<?php echo constant('URL') ?>public\js\motor.js"></script>
    <nav>
        <div class="pantallasBig">
                <div class="nav-left">
                    <a href="<?php echo  constant('URL') ?>">Inicio</a>
                    <a href="<?php echo  constant('URL') ?>thread">Publicaciones</a>
                </div>
                <div class="nav-right">
                    <?php
                        if (isset($user)) {

                            echo '<a href="' . constant('URL') . 'profile" class="h_link"><label class="h_user"> <span class="i-user"></span>' . $user->getUsername() . '</label></a>';
                            echo '<a href="' . constant('URL') . 'logout" class="h_link"><span class="i-logout"></span> Cerrar sesión</a>';
                        } else {
                            echo '<a href="' . constant('URL') . 'signup" class="h_link">Registrase</a>';
                            echo '<a href="' . constant('URL') . 'login" class="h_link"><span class="i-login"></span> Ingresar</a>';
                        }
                    ?>
                </div>
        </div>
        <div class="pantallasSmall">            
            <button id="menu-icon">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </button>
            <div id="mobile-menu">
                    <ul>
                        <li><a href="<?php echo constant('URL') ?>">Inicio</a></li>
                        <li><a href="<?php echo constant('URL') ?>thread">Publicaciones</a></li>
                        <?php
                        if (isset($user)) {
                        echo '<li><a href="' . constant('URL') . 'profile"><span class="i-user"></span>' . $user->getUsername() . '</a></li>';
                        echo '<li><a href="' . constant('URL') . 'logout"><span class="i-logout"></span> Cerrar sesión</a></li>';
                        } else {
                            echo '<li><a href="' . constant('URL') . 'signup">Registrarse</a></li>';
                        echo '<li><a href="' . constant('URL') . 'login"><span class="i-login"></span> Ingresar</a></li>';
                        }
                        ?>
                    </ul>
            </div>
        </div>
    </nav>  
</header>