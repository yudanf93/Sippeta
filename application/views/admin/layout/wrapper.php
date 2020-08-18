<?php
if ($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "") {
    $this->session->set_flashdata('notifikasi', 'Silahkan login terlebih dahulu');
    redirect(site_url('login'), 'refresh');
} elseif ($this->session->userdata('akses_level') == "admin") {
    require_once('head.php');
    require_once('sidebar.php');
    require_once('header.php');
    require_once('main.php');
    require_once('footer.php');
} elseif ($this->session->userdata('akses_level') == "user") {
    $this->session->set_flashdata('notifikasi', 'Silahkan login sebagai admin terlebih dahulu');
    redirect(site_url('Login'));
} else {
    $this->session->set_flashdata('notifikasi', 'Silahkan login sebagai admin terlebih dahulu');
    redirect(site_url('login'));
}
