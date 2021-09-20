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

const addDesa = () => {
    $("#modalTitle").html("Tambah Desa");
    $(".modal-body form").attr("action", "/admin/insertDesa");
    $("#id_desa").val("");

    const nama_desa = $("#nama_desa").val();
    $("#nama_desa").val(nama_desa);

    const kecamatan = $("#kecamatan").val();
    $("#kecamatan").val(kecamatan);

    const kota_kab = $("#kota_kab").val();
    $("#kota_kab").val(kota_kab);

    const kontak = $("#kontak").val();
    $("#kontak").val(kontak);

    const alamat = $(".alamat").val();
    $(".alamat").val(alamat);
    $(".alamat").html(alamat);

    $("#foto_struktur").attr("src", "/upload/foto_struktur/default.png");
    $(".modal-footer button[type=submit]")
        .removeClass("btn-success")
        .addClass("btn-primary");
    $(".modal-footer button[type=submit]").html("Tambah");
};

const setEmptyFormDesa = () => {
    $("#id_desa").val("");
    $("#nama_desa").val("");
    $("#kecamatan").val("");
    $("#kota_kab").val("");
    $("#kontak").val("");
    $(".alamat").html("");
    $(".alamat").val("");
};

const editProfilDesa = (id, hash) => {
    $(".modal-body form").attr("action", "/admin/updateDesa");
    $(".modal-footer button[type=submit]").html("Ubah");
    $(".modal-footer button[type=submit]")
        .removeClass("btn-primary")
        .addClass("btn-success");
    $.ajax({
        url: "/admin/desa/detail",
        data: {
            id: id,
        },
        headers: {
            "X-CSRF-TOKEN": hash,
        },
        method: "post",
        dataType: "json",
        success: function (data) {
            $("#modalTitle").html(`Ubah Profil | ${data.nama_desa}`);
            $("#id_desa").val(data.id_desa);
            $("#nama_desa").val(data.nama_desa);
            $("#kecamatan").val(data.kecamatan);
            $("#kota_kab").val(data.kota_kab);
            $("#kontak").val(data.kontak);
            $(".alamat").val(data.alamat);
            $("#foto_struktur").attr("src", `${data.foto_struktur}`);
        },
        error: function (response) {
            const responseJson = jQuery.parseJSON(response.responseText);
            console.log(responseJson.Message); //Logs the exception message
        },
    });
};

const addAkun = () => {
    $("#modalTitle").html("Tambah Akun");
    $(".modal-body form").attr("action", "/admin/insertAkun");
    $("#id_admin").val("");

    const username = $("#username").val();
    $("#username").val(username);

    const password = $("#password").val();
    $("#password").val(password);

    const email = $("#email").val();
    $("#email").val(email);

    const namaLengkap = $("#namaLengkap").val();
    $("#namaLengkap").val(namaLengkap);

    const nomorTelepon = $("#nomorTelepon").val();
    $("#nomorTelepon").val(nomorTelepon);

    const roleId = $("#roleId").val();
    $("#roleId").val(roleId);

    const id_desa = $("#id_desa").val();
    $("#id_desa").val(id_desa);

    $(".modal-footer button[type=submit]")
        .removeClass("btn-success")
        .addClass("btn-primary");
    $(".modal-footer button[type=submit]").html("Tambah");
};

const setEmptyFormAdmin = () => {
    $("#id_admin").val("");
    $("#username").val("");
    $("#email").val("");
    $("#password").val("");
    $("#nomorTelepon").val("");
    $("#namaLengkap").val("");
    $("#roleId").val("");
    $("#id_desa").val("");
    $("#aktif").val(0);
};

const editAkunAdmin = (id, hash) => {
    $(".modal-body form").attr("action", "/admin/updateAkun");
    $(".modal-footer button[type=submit]").html("Ubah");
    $(".modal-footer button[type=submit]")
        .removeClass("btn-primary")
        .addClass("btn-success");
    $.ajax({
        url: "/admin/detail",
        data: {
            id: id,
        },
        headers: {
            "X-CSRF-TOKEN": hash,
        },
        method: "post",
        dataType: "json",
        success: function (data) {
            $("#id_admin").val(data.id_admin);
            $("#username").val(data.username);
            $("#email").val(data.email);
            $("#nomorTelepon").val(data.nomorTelepon);
            $("#namaLengkap").val(data.namaLengkap);
            $("#roleId").val(data.roleId);
            $("#id_desa").val(data.id_desa);
            $("#aktif").val(data.aktif);
        },
        error: function (response) {
            const responseJson = jQuery.parseJSON(response.responseText);
            console.log(responseJson.Message); //Logs the exception message
        },
    });
};
