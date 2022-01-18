<div class="header-text-dark header-nav layout-vertical">
    <div class="header-nav-wrap">
        <div class="header-nav-left">
        </div>
        <div class="header-nav-right">
            <div class="header-nav-item">
                <div class="dropdown header-nav-item-select nav-profile">
                    <div class="toggle-wrapper" id="nav-profile-dropdown" data-bs-toggle="dropdown">
                        <div class="avatar avatar-circle avatar-image" style="width: 35px; height: 35px; line-height: 35px;">
                            <img src="<?= site_url('/'); ?>assets/images/avatars/thumb-1.jpg" alt="">
                        </div>
                        <span class="fw-bold mx-1"><?= $this->session->userdata('nama_lengkap') ?></span>
                        <i class="feather icon-chevron-down"></i>
                    </div>
                    <div class="dropdown-menu dropdown-menu-end">
                        <div class="nav-profile-header">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-circle avatar-image">
                                    <img src="assets/images/avatars/thumb-1.jpg" alt="">
                                </div>
                                <div class="d-flex flex-column ms-1">
                                    <span class="fw-bold text-dark"><?= $this->session->userdata('nama_lengkap') ?></span>
                                </div>
                            </div>
                        </div>
                        <a href="<?= site_url('profile'); ?>" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <i class="font-size-lg me-2 feather icon-user"></i>
                                <span>Profile</span>
                            </div>
                        </a>
                        <a href="<?= site_url('logout'); ?>" class="dropdown-item">
                            <div class="d-flex align-items-center"><i class="font-size-lg me-2 feather icon-power"></i>
                                <span>Sign Out</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>