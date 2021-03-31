<?php

use App\Models\SettingModel;
use App\Models\FilterKataModel;
/* --- Daftar Helper ---
1. Helper Anti Scrip XSS
2. Helper Notifikasi
3. Helper Tanggal
4. Helper Salam (Pagi, Siang, Sore, Malam)*/

// ---> Helper Salam
//ambil jam dan menit

/**
 * ex: url(2) == 'user' |
 * $no = segment ke (sekian) |
 * harus berupa nomor
 */
function url($no)
{
    $uri = current_url(true);
    $url = $uri->getSegments()[$no];
    return $url;
}

/**
 * ex: setting()->nama_field |
 * Utk tabel setting |
 * Mengembalikan berupa object
 */
function setting()
{
    $setting = new SettingModel;
    $data = $setting->where('id_setting', 1)->get()->getRow();

    return $data;
}

/**
 * ex: salam() |
 * Utk salam berdasarkan waktu |
 */
function salam($jam)
{
    //atur salam menggunakan IF
    if ($jam > '05:00' && $jam < '09:30') {
        $salam = 'Pagi';
    } elseif ($jam >= '09:30' && $jam < '15:00') {
        $salam = 'Siang';
    } elseif ($jam < '18:00') {
        $salam = 'Sore';
    } else {
        $salam = 'Malam';
    }

    return 'Selamat ' . $salam;
}

/**
 * ex: nl2br_xss("kalimat_panjang") |
 * $str = kalimat panjangnya |
 * Berfungsi agar mencegah xss, tetapi masih bisa menampilkan tag html
 */
function nl2br_xss($str)
{
    echo nl2br(htmlspecialchars($str, ENT_QUOTES));
}

/**
 * ex: xss("kalimat_panjang") |
 * $str = kalimat panjangnya |
 * Berfungsi agar mencegah xss saja
 */
function xss($str)
{
    echo htmlentities($str, ENT_QUOTES, 'UTF-8');
}

/**
 * Berfungsi membatasi kata |
 * $str = kalimat panjangnya |
 * ex: limit_word('aku tidak makan nasi', 3) |
 * Hasil: aku tidak makan...
 */
function limit_word($string, $word_limit = null)
{
    $words = explode(' ', $string);
    if (count($words) > $word_limit) :
        $kata = implode(' ', array_slice($words, 0, $word_limit));
        return clean_text($kata) . "...";
    else :
        $kata = implode(' ', array_slice($words, 0, $word_limit));
        return clean_text($kata);
    endif;
}
function clean_text($text)
{
    return trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', ' ', urldecode(html_entity_decode(strip_tags($text))))));
}

// ---> Helper Tanggal
#1. Default date, dengan format (’5 September 2017’)        | date_indo()
#2. Short date, dengan format (‘5/09/2017’)                 | shortdate_indo()
#3. Medium date, dengan format (‘5-Sep-2017’)               | mediumdate_indo()
#4. Long date, dengan format (‘Selasa, 5 September 2017’)   | longdate_indo()
#5. Waktu Format Indp, dgn format ("Selasa, 09 Des 2020 09:46") | format_indo($tanggal)

// Waktu dan Tanggal
if (!function_exists('format_indo')) {
    /**
     * ex: format_indo(date('d m Y')) |
     * $date bisa berupa date() atau date_time() |
     * Hasil: Selasa, 09 Des 2020 09:46
     */
    function format_indo($date)
    {
        date_default_timezone_set('Asia/Jakarta');
        // array hari dan bulan
        $Hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
        $Bulan = array("Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des");

        // pemisahan tahun, bulan, hari, dan waktu
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $waktu = substr($date, 11, 5);
        $hari = date("w", strtotime($date));
        $result = $Hari[$hari] . ", " . $tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun . " " . $waktu;

        return $result;
    }
}

if (!function_exists('tgl_indo')) {
    /**
     * ex: date_indo(date('d m Y')) |
     * $date bisa berupa date() atau date_time() |
     * Hasil: 5 September 2017
     */
    function date_indo($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal . ' ' . $bulan . ' ' . $tahun;
    }
}
if (!function_exists('bulan')) {
    function bulan($bln)
    {
        switch ($bln) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }
}

//Format Shortdate
if (!function_exists('shortdate_indo')) {
    /**
     * ex: shortdate_indo(date('d m Y')) |
     * $date bisa berupa date() |
     * Hasil: 5/09/2021
     */
    function shortdate_indo($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = short_bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal . '/' . $bulan . '/' . $tahun;
    }
}
if (!function_exists('short_bulan')) {
    function short_bulan($bln)
    {
        switch ($bln) {
            case 1:
                return "01";
                break;
            case 2:
                return "02";
                break;
            case 3:
                return "03";
                break;
            case 4:
                return "04";
                break;
            case 5:
                return "05";
                break;
            case 6:
                return "06";
                break;
            case 7:
                return "07";
                break;
            case 8:
                return "08";
                break;
            case 9:
                return "09";
                break;
            case 10:
                return "10";
                break;
            case 11:
                return "11";
                break;
            case 12:
                return "12";
                break;
        }
    }
}

//Format Medium date
if (!function_exists('mediumdate_indo')) {
    /**
     * ex: mediumdate_indo(date('d m Y')) |
     * $date bisa berupa date() atau date_time() |
     * Hasil: 10-Okt-2021
     */
    function mediumdate_indo($tgl)
    {
        $ubah = gmdate($tgl, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tanggal = $pecah[2];
        $bulan = medium_bulan($pecah[1]);
        $tahun = $pecah[0];
        return $tanggal . '-' . $bulan . '-' . $tahun;
    }
}
if (!function_exists('medium_bulan')) {
    function medium_bulan($bln)
    {
        switch ($bln) {
            case 1:
                return "Jan";
                break;
            case 2:
                return "Feb";
                break;
            case 3:
                return "Mar";
                break;
            case 4:
                return "Apr";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Jun";
                break;
            case 7:
                return "Jul";
                break;
            case 8:
                return "Ags";
                break;
            case 9:
                return "Sep";
                break;
            case 10:
                return "Okt";
                break;
            case 11:
                return "Nov";
                break;
            case 12:
                return "Des";
                break;
        }
    }
}

//Long date indo Format
if (!function_exists('longdate_indo')) {
    /**
     * ex: longdate_indo(date('d m Y')) |
     * $date bisa berupa date() atau date_time() |
     * Tanpa menampilkan jam nya |
     * Hasil: Selasa, 5 September 2017
     */
    function longdate_indo($tanggal)
    {
        $ubah = gmdate($tanggal, time() + 60 * 60 * 8);
        $pecah = explode("-", $ubah);
        $tgl = $pecah[2];
        $bln = $pecah[1];
        $thn = $pecah[0];
        $bulan = bulan($pecah[1]);

        $nama = date("l", mktime(0, 0, 0, $bln, $tgl, $thn));
        $nama_hari = "";
        if ($nama == "Sunday") {
            $nama_hari = "Minggu";
        } else if ($nama == "Monday") {
            $nama_hari = "Senin";
        } else if ($nama == "Tuesday") {
            $nama_hari = "Selasa";
        } else if ($nama == "Wednesday") {
            $nama_hari = "Rabu";
        } else if ($nama == "Thursday") {
            $nama_hari = "Kamis";
        } else if ($nama == "Friday") {
            $nama_hari = "Jumat";
        } else if ($nama == "Saturday") {
            $nama_hari = "Sabtu";
        }
        return $nama_hari . ', ' . $tgl . ' ' . $bulan . ' ' . $thn;
    }
}

/**
 * ex: sensor($kalimat) |
 * 
 * Berfungsi untuk menyaring kata kotor yang terdapat di table filter_kata_kotor
 */
function sensor($kalimat)
{
    $filter = new FilterKataModel;
    $data = $filter->findAll();

    $katakotor = array_column($data, 'kata_kotor');
    $filterkata = array_column($data, 'filter_kata');

    $kecil = strtolower($kalimat);

    $hasil = str_replace($katakotor, $filterkata, $kalimat);

    return $hasil;
}
