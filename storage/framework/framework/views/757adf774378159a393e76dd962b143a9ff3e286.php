        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(route('clientes.index')); ?>">
                        <?php echo e(config('app.name', 'Laravel')); ?>

                    </a>
                    
                    <a class="navbar-brand" id="spaCliente">
                        Clientes
                    </a>
                    
                    <a class="navbar-brand" id="spaGrupo">
                        Grupos
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <?php if(Auth::user()): ?>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                <form action="<?php echo e(route('logout')); ?>" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    <button type="submit" class="btn-logout">Logout</button> 
                                </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <?php endif; ?>
                    <ul class="nav navbar-nav navbar-right" style="background: #fff;">
                        <li><a href="https://github.com/dariocasx/Laravel-ajax" target="_blank">Descargar en GitHub</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        
        <?php /**PATH C:\laravel\clientes\resources\views/navbar.blade.php ENDPATH**/ ?>