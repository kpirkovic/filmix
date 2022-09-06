<!-- NAV -->
<nav class="dark-sidebar mb-3 position-relative d-flex flex-column py-4 px-3 vh-100 w-15">
    <ul class="gap-3 d-flex flex-column justify-content-between vh-100 m-0 p-0">
        <li><a class='brand py-2 px-3 text-white text-decoration-none fs-2x5 logo' href="<?php echo DIRADMIN;?>"><?php echo SITETITLE;?></a></li>
        <div class='d-flex flex-column gap-3 mb-5'>
            <li><a class="text-decoration-none d-flex gap-3 align-items-center py-2 px-3 rounded-3 sidebar-btn text-white" href="<?php echo DIR;?>" target="_blank"><i class="bi bi-globe fs-6"></i><span>View Site</span></a></li>
            {# <li><a class="text-decoration-none d-flex gap-3 align-items-center py-2 px-3 rounded-3 sidebar-btn <?php currentPage('pages'); ?>" href="<?php echo DIRADMIN;?>?page=pages"><i class="bi bi-file-earmark-plus"></i><span>Pages</span></a></li> #}
            <li><a class="text-decoration-none d-flex gap-3 align-items-center py-2 px-3 rounded-3 sidebar-btn <?php currentPage('directors'); ?>" href="<?php echo DIRADMIN;?>?page=directors"><i class="bi bi-person-plus fs-5"></i><span>Directors</span></a></li>
            <li><a class="text-decoration-none d-flex gap-3 align-items-center py-2 px-3 rounded-3 sidebar-btn <?php currentPage('movies'); ?>" href="<?php echo DIRADMIN;?>?page=movies"><i class="bi bi-camera-reels fs-6"></i><span>Movies</span></a></li>
            <li><a class="text-decoration-none d-flex gap-3 align-items-center py-2 px-3 rounded-3 sidebar-btn <?php currentPage('genres'); ?>" href="<?php echo DIRADMIN;?>?page=genres"><i class="bi bi-film fs-6"></i><span>Genres</span></a></li>
        </div>
        <div class='d-flex flex-column gap-3'>
            <li><a class="text-white text-decoration-none d-flex gap-3 align-items-center py-2 px-3 rounded-3 sidebar-btn" href="<?php echo DIRADMIN;?>?logout"><i class="bi bi-box-arrow-left fs-5"></i><span>Sign Out</span></a></li>
        </div>
    </ul>
    <div class="collapse-nav">
        <i class="bi bi-arrow-left-circle-fill"></i>
    </div>
</nav>
<!-- END NAV -->