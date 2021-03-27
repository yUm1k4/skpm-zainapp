/*
    Author: Zainudin Abdullah
    Website: SKPM - Zain App
    File: Sweet Alert Custom JS
 */

// ambil pesan
const swalLogin = $('.swal-loginSuccess').data('swallogin');
const swalCrud = $('.swal-crud').data('swalcrud');
const swalError = $('.swal-error').data('swalerror');
const swalLaporSukses = $('.swal-kirimSukses').data('swallapor');
const swalLaporGagal = $('.swal-kirimGagal').data('swallapor');

//  Hapus Data
$(document).on('click', '.btn-delete', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Apakah Kamu Yakin?',
        text: "Data akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!',
        cancelButtonText: 'Batal',
        reverseButtons: true,

    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            Swal.fire(
                'Batal Dihapus',
                'Data/File Anda masih aman ^_^',
                'error'
            )
        }
    })
})

if (swalLaporSukses) {
    Swal.fire({
        icon: 'success',
        title: 'Terima Kasih',
        text: swalLaporSukses,
        // timer: 9000,
        // timerProgressBar: true,
        showConfirmButton: true,
    });
}

if (swalLaporGagal) {
    Swal.fire({
        icon: 'error',
        title: 'Whoops..!!',
        text: swalLaporGagal,
        timer: 9000,
        timerProgressBar: true,
        showConfirmButton: true,
    });
}

if (swalCrud) {
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: swalCrud,
        timer: 7000,
        timerProgressBar: true,
        showConfirmButton: true,
    });
}

if (swalError) {
    Swal.fire({
        icon: 'error',
        title: 'Oops..!!',
        text: swalError,
        timer: 7000,
        timerProgressBar: true,
        showConfirmButton: true,
    });
}

if (swalLogin) {
    Swal.fire({
        imageUrl: "<?= base_url('') ?>/images/mirage-welcome.png",
        // imageUrl: "<?= base_url('') ?>/images/mello.svg",
        imageHeight: 250,
        timer: 7000,
        title: swalLogin,
        confirmButtonText: 'Hi..!!',
    });
}

$(document).on('click', '.btn-logout', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');
    Swal.fire({
        title: 'Kamu Yakin Ingin Logout?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Logout',
        cancelButtonText: 'Batal!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            Swal.fire(
                'Batal Logout',
                'Silahkan lanjutkan aktifitas mu ^_^',
                'error'
            )
        }
    })
})

