<header>

    <nav class="navbar navbar-expand-lg navbar-light" id="nav">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="<?php echo e(Vite::asset('resources/images/BaRa.png')); ?>" alt="Logo" class="img-fluid" id="logo">
            </a>

            <form class="d-flex mx-auto">
                <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

            <div class="profile">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="userDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <?php if(Auth::check()): ?>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="#" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        <?php else: ?>
                            <li><a class="dropdown-item" href="#">Login</a></li>
                            <li><a class="dropdown-item" href="#">Register</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

</header>
<?php /**PATH D:\FW\FP_Bara\resources\views/layouts/nav.blade.php ENDPATH**/ ?>