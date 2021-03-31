<?php

use CodeIgniter\I18n\Time;
// dd(user());
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        h1.title {
            border-top: 1px solid #5D6975;
            border-bottom: 1px solid #5D6975;
            padding: 5px;
            color: #5D6975;
            line-height: normal;
            font-weight: normal;
            text-align: center;
            margin: 0 0 10px 0;
            /* background: url(<?= base_url('/vendors/pdf_format/dimension.png') ?>); */
        }

        h3 {
            font-weight: normal;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            /* width: 21cm;
            height: 29.7cm; */
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        .float-left {
            float: left;
        }

        .float-left span {
            color: #5D6975;
            text-align: right;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: center;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: normal;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 10px;
            /* text-align: right; */
        }

        .text-center {
            text-align: center;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
            display: inline-block;
        }

        .text-capitalize {
            text-transform: capitalize;
        }

        .mb-1 {
            margin-bottom: 10px;
        }

        .mb-2 {
            margin-bottom: 20px;
        }

        .mb-3 {
            margin-bottom: 30px;
        }

        .float-right {
            text-align: right;
            display: block;
        }

        .informasi {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <header class="clearfix">
        <h1 class="text-center title"><?= setting()->nama_aplikasi_frontend ?> | <?= $title; ?></h1>
        <p class="text-center mb-1">Data Laporan berdasarkan RW No. <?= $pengaduan[0]['no_rw'] ?></p>
        <div class="informasi">
            <div class="float-left">
                <div><span>By</span> <?= user()->fullname ?></div>
                <div><span>No HP</span> <?= user()->no_hp ?></div>
                <div><span>Email</span><a href="mailto:<?= user()->email ?>"><?= user()->email ?></a></div>
                <div><span>Hari/Tgl</span> <?= format_indo(Time::now()) ?></div>
            </div>
            <div class="float-right">
                <div><?= setting()->nama_aplikasi_frontend ?></div>
                <div><?= setting()->nohp_setting ?></div>
                <div><a href="mailto:<?= setting()->email_setting ?>"><?= setting()->email_setting ?></a></div>
                <div><?= setting()->alamat_setting ?></div>
            </div>
        </div>
    </header>
    <main>
        <?php if ($pengaduan) { ?>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tgl Buat</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Kode</th>
                        <th>Kategori</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($pengaduan as $p) { ?>
                        <tr>
                            <td width="5%"><?= $no++ ?>.</td>
                            <?php
                            $phpdate = strtotime($p['pengaduan_dibuat']);
                            $tanggal = date('Y-m-d', $phpdate);
                            ?>
                            <td width="15%"><?= shortdate_indo($tanggal) ?></td>
                            <td width="23%" class="text-left"><?= $p['fullname'] ?></td>
                            <td><?= $p['nik'] ?></td>
                            <td><?= $p['kode_pengaduan'] ?></td>
                            <td class="text-left"><?= $p['nama_kategori'] ?></td>
                            <td class="text-capitalize"><?= $p['ket'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <h3 class="text-center">Maaf data laporan dari <?= date_indo($mulai) . ' s/d ' . date_indo($akhir) ?> tidak ada</h3>
        <?php } ?>
    </main>
</body>

</html>