$(function(){

    $(".tombolTambahData").on("click", function(){
        $("#formModalLabel").html("Tambah Data Mahasiswa");
        $(".modal-footer button[type=submit]").html("Tambah Data");
    });

    $(".tampilModalUpdate").on("click", function(){
        $("#formModalLabel").html("Update Data Mahasiswa");
        $(".modal-footer button[type=submit]").html("Update Data");
        $(".modal-body form").attr("action", "http://localhost/php-mvc/public/mahasiswa/update");

        const id = $(this).data("id");

        $.ajax({
            url: "http://localhost/php-mvc/public/mahasiswa/getupdate",
            data: {id : id},
            method: "post",
            dataType: "json",
            success: function(data){
                $("#nama").val(data.nama);
                $("#nrp").val(data.nrp);
                $("#email").val(data.email);
                $("#jurusan").val(data.jurusan);
                $("#id").val(data.id);
            }
        });
    });
});