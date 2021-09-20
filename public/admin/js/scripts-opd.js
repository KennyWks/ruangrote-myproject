/*!
 * Start Bootstrap - SB Admin v7.0.3 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2021 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
//
// Scripts
//

window.addEventListener("DOMContentLoaded", (event) => {
    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector("#sidebarToggle");
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener("click", (event) => {
            event.preventDefault();
            document.body.classList.toggle("sb-sidenav-toggled");
            localStorage.setItem(
                "sb|sidebar-toggle",
                document.body.classList.contains("sb-sidenav-toggled")
            );
        });
    }
});

(function () {
    var takePicture = document.querySelector("#formFile"),
        showPicture = document.querySelector("#foto_kegiatan");
    fotoLabel = document.querySelector(".form-label-gambar");

    if (takePicture && showPicture) {
        // Set events
        takePicture.onchange = function (event) {
            // Get a reference to the taken picture or chosen file
            var files = event.target.files,
                file;
            if (files && files.length > 0) {
                file = files[0];
                fotoLabel.textContent = file.name;
                var fileReader = new FileReader();
                fileReader.onload = function (event) {
                    showPicture.src = event.target.result;
                };
                fileReader.readAsDataURL(file);
            }
        };
    }
})();

const getProfilDesa = (id, hash) => {
    $.ajax({
        url: "/desa/detail",
        data: {
            id: id,
        },
        headers: {
            "X-CSRF-TOKEN": hash,
        },
        method: "post",
        dataType: "json",
        success: function (data) {
            $("#profilTitle").text(data.nama_desa);
            $("#id_desa").val(data.id_desa);
            $("#nama_desa").val(data.nama_desa);
            $("#kecamatan").val(data.kecamatan);
            $("#kota_kab").val(data.kota_kab);
            $("#kontak").val(data.kontak);
            $("#alamat").val(data.alamat);
            $(".foto_struktur1").attr("src", `${data.foto_struktur}`);
            $(".foto_struktur2").val(data.foto_struktur);
        },
        error: function (response) {
            const responseJson = jQuery.parseJSON(response.responseText);
            console.log(responseJson.Message); //Logs the exception message
        },
    });
};

const addPublikasi = () => {
    $("#publikasiTitle").html("Tambah Publikasi");
    $("#id").val("");
    $("#judul").val("");
    $("#isi").val("");
    $("#instansi").val("");
    $(".modal-body form").attr("action", "/desa/publikasi/add");
    $(".modal-footer button[type=submit]").html("Tambah");
};

const getPublikasiDesa = (id, hash) => {
    $("#publikasiTitle").html("Ubah Publikasi");
    $(".modal-body form").attr("action", "/desa/publikasi/edit");
    $(".modal-footer button[type=submit]").html("Ubah");
    $.ajax({
        url: "/desa/publikasi/detail",
        data: {
            id: id,
        },
        headers: {
            "X-CSRF-TOKEN": hash,
        },
        method: "post",
        dataType: "json",
        success: function (data) {
            $("#id").val(data.id_publikasi);
            $("#judul").val(data.judul);
            $("#isi").val(data.isi);
            $("#instansi").val(data.instansi);
        },
        error: function (response) {
            console.log(response);
            const responseJson = jQuery.parseJSON(response.responseText);
            console.log(responseJson.Message); //Logs the exception message
        },
    });
};

const addKegiatan = () => {
    $("#kegiatanTitle").html("Tambah Kegiatan");
    $("#id").val("");
    $("#judul").val("");
    $("#keterangan").val("");
    $(".modal-body form").attr("action", "/desa/kegiatan/add");
    $(".modal-footer button[type=submit]").html("Tambah");
    $("#gambar_valid").css("display", "none");
};

const getKegiatanDesa = (id, hash) => {
    $("#gambar_valid").css("display", "block");
    $("#kegiatanTitle").html("Ubah Kegiatan");
    $(".modal-body form").attr("action", "/desa/kegiatan/edit");
    $(".modal-footer button[type=submit]").html("Ubah");
    $.ajax({
        url: "/desa/kegiatan/detail",
        data: {
            id: id,
        },
        headers: {
            "X-CSRF-TOKEN": hash,
        },
        method: "post",
        dataType: "json",
        success: function (data) {
            $("#id").val(data.id_kegiatan);
            $("#judul").val(data.judul);
            $("#foto_kegiatan").attr("src", `${data.foto}`);
            $("#keterangan").val(data.keterangan);
        },
        error: function (response) {
            const responseJson = jQuery.parseJSON(response.responseText);
            console.log(responseJson.Message); //Logs the exception message
        },
    });
};

const getPengaduan = (id, hash) => {
    $.ajax({
        url: "/desa/pengaduan/detail",
        data: {
            id: id,
        },
        headers: {
            "X-CSRF-TOKEN": hash,
        },
        method: "post",
        dataType: "json",
        success: function (data) {
            $("#subjek").val(data.subjek);
            $("#isi").val(data.isi);
        },
        error: function (response) {
            const responseJson = jQuery.parseJSON(response.responseText);
            console.log(responseJson.Message); //Logs the exception message
        },
    });
};

const addDokumen = () => {
    $("#dokumenTitle").html(
        "Tambah Dokumen (*File berekstensi: .pdf, .doc, .docx)"
    );
    $("#tahun").val("");
    $("#rpjm").val("");
    $("#rkp").val("");
    $("#apbd").val("");
    $("#pj_sm1").val("");
    $("#pj_sm2").val("");
    $("#kegiatan_prioritas").val("");
    $("#peraturan").val("");
    $(".modal-body form").attr("action", "/desa/dokumen/add");
    $(".modal-footer button[type=submit]").html("Tambah");
};

const getDokumen = (id, hash) => {
    $("#modalTitle").html("Ubah Dokumen");
    $(".modal-body form").attr("action", "/desa/dokumen/edit");
    $(".modal-footer button[type=submit]").html("Ubah");

    $.ajax({
        url: "/desa/dokumen/detail",
        data: {
            id: id,
        },
        headers: {
            "X-CSRF-TOKEN": hash,
        },
        method: "post",
        dataType: "json",
        success: function (data) {
            $("#id_dokumen").val(data.id_dokumen);
            $("#tahun").val(data.tahun);
        },
        error: function (response) {
            const responseJson = jQuery.parseJSON(response.responseText);
            console.log(responseJson.Message); //Logs the exception message
        },
    });
};

const addProkum = () => {
    $("#modalTitle").html("Tambah Produk Hukum");
    $("#formFile").val("");
    $(".modal-body form").attr("action", "/desa/prokum/add");
    $(".modal-footer button[type=submit]").html("Tambah");
    $("#file_valid").css("display", "none");
};

const getProkum = (id, hash) => {
    $("#modalTitle").html("Ubah Produk Hukum");
    $(".modal-body form").attr("action", "/desa/prokum/edit");
    $(".modal-footer button[type=submit]").html("Ubah");

    $.ajax({
        url: "/desa/prokum/detail",
        data: {
            id: id,
        },
        headers: {
            "X-CSRF-TOKEN": hash,
        },
        method: "post",
        dataType: "json",
        success: function (data) {
            $("#id_prokum").val(data.id_prokum);
            $(".form-label-file").html(data.produk_hukum);
        },
        error: function (response) {
            const responseJson = jQuery.parseJSON(response.responseText);
            console.log(responseJson.Message); //Logs the exception message
        },
    });
};