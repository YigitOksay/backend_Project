$(document).ready(function () {
    // check admin password
    $("#password").keyup(function () {
        var password = $("#password").val();
        //        alert(password);
        $.ajax({
            headers: {
                "X-CSRF-Token": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/NPanel/checkPassword",
            data: { password: password },
            success: function (resp) {
                if (resp == "false") {
                    $("#verifyCurrentPwd").html("Şifrenizi doğru giriniz.");
                } else if (resp == "true") {
                    $("#verifyCurrentPwd").html("Şifreniz doğru.");
                }
            },
            error: function () {
                alert("Error");
            },
        });
    });

    // Pages Status

    $(document).on("click", ".updatePageStatus", function () {
        var status = $(this).children("i").attr("status");
        var page_id = $(this).attr("page_id");

        $.ajax({
            headers: {
                "X-CSRF-Token": $('meta[name="csrf-token"]').attr("content"),
            },
            type: "post",
            url: "/NPanel/pages/update-pages-status",
            data: { status: status, page_id: page_id },
            success: function (resp) {
                if (resp["status"] == 0) {
                    $("#page-" + page_id).html(
                        "<i class='fas fa-toggle-off' style='color:grey' status='Inactive'></i>"
                    );
                } else if (resp["status"] == 1) {
                    $("#page-" + page_id).html(
                        "<i class='fas fa-toggle-on' status='Active'></i>"
                    );
                }
            },
            error: function () {
                alert("Bir hata oluştu");
            },
        });
    });

    // Delete Function
    $(document).ready(function () {
        $(".delete-action").click(function () {
            var confirmation = confirm("Silmek istediğinizden emin misiniz?");
            if (confirmation) {
                var url = $(this).data("delete-url");
                window.location.href = url;
            }
        });
    });

    // Menü Seçimi
    var selectedValue = $("#selectBox").val();
    $("#menuData li").hide();
    $("#menuData li").each(function () {
        if ($(this).data("position") == selectedValue) {
            $(this).show();
        }
    });
    $("#selectBox").change(function () {
        var selectedValue = $(this).val();
        $("#menuData li").hide();
        $("#menuData li").each(function () {
            if ($(this).data("position") == selectedValue) {
                $(this).show();
            }
        });
    });

    $("#menuData").sortable({
        axis: "y",
        update: function (event, ui) {
            // Öğelerin sırasını güncelleyin
            $("#menuData li").each(function (index) {
                $(this)
                    .find('input[name="menuOrder[]"]')
                    .val(index + 1);
            });
        },
    });

    $("#menuForm").submit(function (e) {
        e.preventDefault();
        // Formu AJAX ile gönder
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (response) {
                if (response.success) {
                    $("#successModal").modal("show");
                    setTimeout(function () {
                        $("#successModal").modal("hide");
                    }, 3000);
                    $("#menuData").html(response.menuData);
                }
            },
            error: function (xhr, status, error) {
                // Hata durumunda bir işlem yapabilirsiniz
            },
        });
    });

    // oda Özellikleri
    $("#roomsForm").submit(function (event) {
        event.preventDefault(); // Formun normal submit işlemini durdurun

        var formData = new FormData(this); // Form verilerini alın ve FormData nesnesine dönüştürün
        formData.append("features", $(".duallistbox").val()); // Seçilen özellikleri ekle

        var roomSelectedId = $("#roomSelectedId").val();
        var url =
            "/NPanel/rooms/crud" + (roomSelectedId ? "/" + roomSelectedId : "");

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            contentType: false, // FormData kullanıldığı için bu parametre false olarak ayarlanmalıdır
            processData: false, // FormData kullanıldığı için bu parametre false olarak ayarlanmalıdır
            success: function (response) {
                // Başarılı bir şekilde kaydedildikten sonra gerekli işlemleri yapın
                Swal.fire({
                    icon: "success",
                    title: "Oda Başarıyla Kaydedildi",
                    showConfirmButton: false,
                    timer: 1500,
                }).then(function () {
                    window.location.href = "/NPanel/rooms";
                });
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                // Hata durumunda gerekli işlemleri yapın
            },
        });
    });

    // Summernote'u etkinleştir
    $(".summernote").summernote({
        height: 200, // Yükseklik ayarı
        toolbar: [
            // İsteğe bağlı: Daha fazla özelleştirme yapmak için gereksiz öğeleri kaldırabilirsiniz
            ["style", ["style"]],
            ["font", ["bold", "italic", "underline", "clear"]],
            ["fontname", ["fontname"]],
            ["color", ["color"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["height", ["height"]],
            ["table", ["table"]],
            ["insert", ["link", "picture", "video"]],
            ["view", ["fullscreen", "codeview", "help"]],
        ],
        callbacks: {
            // Değişiklikler yapıldığında, içeriği güncelleyelim
            onChange: function (contents, $editable) {
                var id = $(this).attr("id");
                $("#" + id).val(contents);
            },
        },
    });

    // Menu Ekleme
    /*
        $(".btn-success").click(function () {
            var selectedPages = [];
            $("input[type=checkbox]:checked").each(function () {
                selectedPages.push($(this).attr("id"));
            });

            // Laravel tarafından sağlanan CSRF belirteci
            var csrfToken = $('meta[name="csrf-token"]').attr("content");

            $.ajax({
                url: "menus/add",
                type: "POST",
                dataType: "json",
                data: {
                    pages: selectedPages,
                    selectedMenu: selectedValue,
                    // CSRF belirteci ekleniyor
                    _token: csrfToken,
                },
                success: function (response) {
                    console.log(response);
                },
                error: function (xhr, status, error) {
                    // Hata durumunda işlemler
                },
            });
        });
    */
});
