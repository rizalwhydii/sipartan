<nav id="navbar" class="navbar">
    <ul>
        <li><a class="nav-link scrollto" href="<?= base_url('frontend') ?>">Beranda</a></li>
        <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="<?= base_url('frontend/about'); ?>">Sejarah Perusahaan</a></li>
                <li><a href="<?= base_url('frontend/visimisi'); ?>">Visi & Misi Perusahaan</a></li>
                <li><a href="<?= base_url('frontend/strategi'); ?>">Strategi Perusahaan</a></li>
                <li><a href="<?= base_url('frontend/motto'); ?>">Moto Perusahaan</a></li>
                <li><a href="<?= base_url('frontend/struktur'); ?>">Struktur Perusahaan</a></li>
            </ul>
        </li>

        <li class="dropdown"><a href="#"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="<?= base_url('user/pengaduan'); ?>">Pengaduan Pelanggan</a></li>
                <li><a href="<?= base_url('frontend/tagihan'); ?>">Cek Tagihan Pelanggan</a></li>
                <li><a href="<?= base_url('frontend/jumlah_pelanggan'); ?>">Peta Jumlah Pelanggan</a></li>
                <li><a href="<?= base_url('user/daftar'); ?>">Sambungan Pipa Baru</a></li>
            </ul>
        </li>
        <li><a class="nav-link scrollto" href="<?= base_url('frontend/berita'); ?>">Informasi</a></li>
        <li><a class="nav-link scrollto" href="<?= base_url('frontend/kontak'); ?>">Kontak</a></li>
        <li>
            <?php if ($this->session->userdata('email')) : ?>
                <?php if ($this->session->userdata('role') == 'User') : ?>
                    <a class="nav-link scrollto" href="<?= base_url('frontend/logout'); ?>"> <button class="btn " style="font-weight: 550; background: #D83D89; color: white">Logout</button></a>
                <?php else : ?>
                    <a class="nav-link scrollto" href="<?= base_url('backend'); ?>"> <button class="btn " style="font-weight: 550; background: #D83D89; color: white">Backend</button></a>
                <?php endif; ?>
            <?php else : ?>
                <a class="nav-link scrollto" href="<?= base_url('frontend/login'); ?>"> <button class="btn " style="font-weight: 550; background: #D83D89; color: white">Login</button></a>
            <?php endif; ?>
        </li>
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav><!-- .navbar -->
</div>
</div>

</div>
</header><!-- End Header -->