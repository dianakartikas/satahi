<br />
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Master Data</h3>
        <ul class="nav side-menu">
            <li><a href="<?= base_url(); ?>/beranda"><i class="fa fa-home"></i> Beranda</a>
            </li>
            <li><a><i class="fa fa-edit"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?= base_url(); ?>/nasabah">Data Nasabah</a></li>
                    <li><a href="<?= base_url(); ?>/sampah">Data Sampah</a></li>
                    <li><a href="<?= base_url(); ?>/permintaan">Data Permintaan</a></li>
                </ul>
            </li>

        </ul>
    </div>
    <div class="menu_section">
        <h3>Main Menu</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-desktop"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="<?= base_url(); ?>/pembelian">Transaksi Pembelian</a></li>
                    <li><a href="<?= base_url(); ?>/penarikan">Transaksi Penarikan</a></li>

                </ul>
            </li>
          
        </ul>
    </div>

    <div class="menu_section">
        <h3>Keluar</h3>
        <ul class="nav side-menu">
            <li><a href="<?= base_url(); ?>/logout"><i class="fa fa-sign-out"></i> Keluar<span class="label label-success pull-right">Keluar</span></a>
            </li>
        </ul>
    </div>
</div>
<!-- /sidebar menu -->