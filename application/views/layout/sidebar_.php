<?php $setting = system_setting(); ?>
<div class="side-nav vertical-menu nav-menu-light scrollable">
    <div class="nav-logo">
        <div class="w-100 logo">
            <img class="img-fluid" src="<?= base_url(); ?>assets/images/logo/logo.png" style="max-height: 70px;" alt="logo">
        </div>
    </div>
    <ul class="nav-menu">
    <li class="nav-group-title">DASHBOARD</li>
        <li class="nav-menu-item router-link">
            <a href="<?php echo site_url('dashboard'); ?>">
                <i class="feather icon-home"></i>
                <span class="nav-menu-item-title">Dashboard</span>
            </a>
        </li>
        <?php if ($this->custom_lib->hasActive('settings')) { ?>
        <?php if ($this->rbac->hasPrivilege('general', 'can_view') || $this->rbac->hasPrivilege('module', 'can_view') || $this->rbac->hasPrivilege('operations', 'can_view') || $this->rbac->hasPrivilege('roles', 'can_view') || $this->rbac->hasPrivilege('users', 'can_view') || $this->rbac->hasPrivilege('database', 'can_view')) { ?>
        <li class="nav-group-title">SETTINGS</li>
        <?php if ($this->rbac->hasPrivilege('general', 'can_view')) { ?>
        <li class="nav-menu-item <?= ($this->uri->segment(2) === 'general') ? 'router-link-active' : '' ?>"> <a href="<?php echo site_url('general'); ?>"><i class="feather icon-settings" data-i18n="general"></i> <span class="nav-menu-item-title">General</span></a></li>
        <?php } ?>
        <?php if ($this->rbac->hasPrivilege('backup', 'can_view')) { ?>
        <li class="nav-menu-item <?= ($this->uri->segment(2) === 'backup') ? 'router-link-active' : '' ?>"> <a href="<?php echo site_url('backup'); ?>"><i class="feather icon-database" data-i18n="backup"></i> <span class="nav-menu-item-title">Backup Database</span></a></li>
        <?php } ?>
        <?php if ($this->rbac->hasPrivilege('module', 'can_view')) { ?>
        <li class="nav-menu-item <?= ($this->uri->segment(2) === 'module') ? 'router-link-active' : '' ?>"> <a href="<?php echo site_url('module'); ?>"><i class="feather icon-book" data-i18n="module"></i> <span class="nav-menu-item-title">Module</span></a></li>
        <?php } ?>
        <?php if ($this->rbac->hasPrivilege('operations', 'can_view')) { ?>
        <li class="nav-menu-item <?= ($this->uri->segment(2) === 'operations') ? 'router-link-active' : '' ?>"> <a href="<?php echo site_url('operations'); ?>"><i class="feather icon-plus-square" data-i18n="operation"></i> <span class="nav-menu-item-title">Operation</span></a></li>
        <?php } ?>
        <?php if ($this->rbac->hasPrivilege('roles', 'can_view')) { ?>
        <li class="nav-menu-item <?= ($this->uri->segment(2) === 'roles') ? 'router-link-active' : '' ?>"> <a href="<?php echo site_url('roles'); ?>"><i class="feather icon-cpu" data-i18n="roles"></i> <span class="nav-menu-item-title">Role Permition</span></a></li>
        <?php } ?>
        <?php if ($this->rbac->hasPrivilege('users', 'can_view')) { ?>
        <li class="nav-menu-item <?= ($this->uri->segment(2) === 'user') ? 'router-link-active' : '' ?>"> <a href="<?php echo site_url('users'); ?>"><i class="feather icon-user" data-i18n="user"></i> <span class="nav-menu-item-title">User</span></a></li>
        <?php } ?>
        <?php } ?>
        <?php } ?>
        <?php if ($this->custom_lib->hasActive('kategori')) { ?>
        <?php if ($this->rbac->hasPrivilege('konten', 'can_view')) { ?>
        <li class="nav-group-title">Kategori</li>
        <?php if ($this->rbac->hasPrivilege('konten', 'can_view')) { ?>
        <li class="nav-menu-item <?= ($this->uri->segment(2) === 'konten') ? 'router-link-active' : '' ?>"> <a href="<?php echo site_url('konten'); ?>"><i class="feather icon-list" data-i18n="konten"></i> <span class="nav-menu-item-title">Konten</span></a></li>
        <?php } ?>
        <?php if ($this->rbac->hasPrivilege('portal', 'can_view')) { ?>
        <li class="nav-menu-item <?= ($this->uri->segment(2) === 'portal') ? 'router-link-active' : '' ?>"> <a href="<?php echo site_url('portal'); ?>"><i class="feather icon-list" data-i18n="portal"></i> <span class="nav-menu-item-title">Portal</span></a></li>
        <?php } ?>
        <?php if ($this->rbac->hasPrivilege('galeri', 'can_view')) { ?>
        <li class="nav-menu-item <?= ($this->uri->segment(2) === 'galeri') ? 'router-link-active' : '' ?>"> <a href="<?php echo site_url('galeri'); ?>"><i class="feather icon-list" data-i18n="galeri"></i> <span class="nav-menu-item-title">Galeri</span></a></li>
        <?php } ?>
        <?php } ?>
        <?php } ?>
        <?php if ($this->custom_lib->hasActive('informasi')) { ?>
        <?php if ($this->rbac->hasPrivilege('konten', 'can_view') || $this->rbac->hasPrivilege('tentang', 'can_view')  || $this->rbac->hasPrivilege('visi', 'can_view') || $this->rbac->hasPrivilege('tupoksi', 'can_view') || $this->rbac->hasPrivilege('egov', 'can_view') || $this->rbac->hasPrivilege('portal', 'can_view')) { ?>
        <li class="nav-group-title">INFORMASI</li>
        <?php if ($this->rbac->hasPrivilege('konten', 'can_view')) { ?>
        <li class="nav-menu-item <?= ($this->uri->segment(2) === 'konten') ? 'router-link-active' : '' ?>"> <a href="<?php echo site_url('konten'); ?>"><i class="feather icon-book" data-i18n="konten"></i> <span class="nav-menu-item-title">Konten</span></a></li>
        <?php } ?>
        <?php if ($this->rbac->hasPrivilege('tentang', 'can_view')) { ?>
        <li class="nav-menu-item <?= ($this->uri->segment(2) === 'tentang') ? 'router-link-active' : '' ?>"> <a href="<?php echo site_url('tentang'); ?>"><i class="feather icon-info" data-i18n="tentang"></i> <span class="nav-menu-item-title">Tentang</span></a></li>
        <?php } ?>
        <?php if ($this->rbac->hasPrivilege('foto', 'can_view')) { ?>
        <li class="nav-menu-item <?= ($this->uri->segment(2) === 'foto') ? 'router-link-active' : '' ?>"> <a href="<?php echo site_url('foto'); ?>"><i class="icon-image feather" data-i18n="foto"></i> <span class="nav-menu-item-title">Foto</span></a></li>
        <?php } ?>
        <?php if ($this->rbac->hasPrivilege('video', 'can_view')) { ?>
        <li class="nav-menu-item <?= ($this->uri->segment(2) === 'video') ? 'router-link-active' : '' ?>"> <a href="<?php echo site_url('video'); ?>"><i class="icon-video feather" data-i18n="video"></i> <span class="nav-menu-item-title">Video</span></a></li>
        <?php } ?>
        <?php if ($this->rbac->hasPrivilege('visi', 'can_view')) { ?>
        <li class="nav-menu-item <?= ($this->uri->segment(2) === 'visi') ? 'router-link-active' : '' ?>"> <a href="<?php echo site_url('visimisi'); ?>"><i class="feather icon-activity" data-i18n="visi"></i> <span class="nav-menu-item-title">Visi Misi</span></a></li>
        <?php } ?>
        <?php if ($this->rbac->hasPrivilege('tupoksi', 'can_view')) { ?>
        <li class="nav-menu-item <?= ($this->uri->segment(2) === 'tupoksi') ? 'router-link-active' : '' ?>"> <a href="<?php echo site_url('tupoksi'); ?>"><i class="feather icon-check-square" data-i18n="tupoksi"></i> <span class="nav-menu-item-title">Tupoksi</span></a></li>
        <?php } ?>
        <?php if ($this->rbac->hasPrivilege('egov', 'can_view')) { ?>
        <li class="nav-menu-item <?= ($this->uri->segment(2) === 'egov') ? 'router-link-active' : '' ?>"> <a href="<?php echo site_url('egoverment'); ?>"><i class="feather icon-hard-drive" data-i18n="egov"></i> <span class="nav-menu-item-title">E-Goverment</span></a></li>
        <?php } ?>
        <?php if ($this->rbac->hasPrivilege('ppid', 'can_view')) { ?>
        <li class="nav-menu-item <?= ($this->uri->segment(2) === 'ppid') ? 'router-link-active' : '' ?>"> <a href="<?php echo site_url('ppid'); ?>"><i class="feather icon-pocket" data-i18n="ppid"></i> <span class="nav-menu-item-title">PPID</span></a></li>
        <?php } ?>
        <?php if ($this->rbac->hasPrivilege('struktur', 'can_view')) { ?>
        <li class="nav-menu-item <?= ($this->uri->segment(2) === 'struktur') ? 'router-link-active' : '' ?>"> <a href="<?php echo site_url('struktur'); ?>"><i class="icon-briefcase feather" data-i18n="struktur"></i> <span class="nav-menu-item-title">Sturktur Organisasi</span></a></li>
        <?php } ?>
        <?php } ?>
        <?php } ?>
        
        <?php if ($this->custom_lib->hasActive('portal')) { ?>
        <?php if ($this->rbac->hasPrivilege('portal', 'can_view')) { ?>
        <li class="nav-group-title">Kategori</li>
        <?php if ($this->rbac->hasPrivilege('opd', 'can_view')) { ?>
        <li class="nav-menu-item <?= ($this->uri->segment(2) === 'opd') ? 'router-link-active' : '' ?>"> <a href="<?php echo site_url('opd'); ?>"><i class="feather icon-list" data-i18n="opd"></i> <span class="nav-menu-item-title">OPD</span></a></li>
        <?php } ?>
        <?php if ($this->rbac->hasPrivilege('kec', 'can_view')) { ?>
        <li class="nav-menu-item <?= ($this->uri->segment(2) === 'kec') ? 'router-link-active' : '' ?>"> <a href="<?php echo site_url('kec'); ?>"><i class="feather icon-list" data-i18n="kec"></i> <span class="nav-menu-item-title">Kecamatan</span></a></li>
        <?php } ?>
        <?php } ?>
        <?php } ?>
    </ul>
</div>