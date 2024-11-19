<?php
include 'koneksi.php'; // Pastikan koneksi sudah benar

// Query untuk mengambil data anggota
$query = "SELECT * FROM anggota ORDER BY id DESC";
$sql = $db1->prepare($query);
$sql->execute();
$res1 = $sql->get_result();
?>

<!-- Tabel untuk menampilkan data anggota -->
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        if ($res1->num_rows > 0) {
            while ($row = $res1->fetch_assoc()) {
                $id = $row['id'];
                $nama = $row['nama'];
                $jenis_kelamin = ($row['jenis_kelamin'] == 'L') ? 'Laki-Laki' : 'Perempuan';
                $alamat = $row['alamat'];
                $no_telp = $row['no_telp'];
        ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $jenis_kelamin; ?></td>
                    <td><?php echo $alamat; ?></td>
                    <td><?php echo $no_telp; ?></td>
                    <td>
                        <button id="<?php echo $id; ?>" class="btn btn-success btn-sm edit_data">
                            <i class="fa fa-edit"></i> Edit
                        </button>
                        <button id="<?php echo $id; ?>" class="btn btn-danger btn-sm hapus_data">
                            <i class="fa fa-trash"></i> Hapus
                        </button>
                    </td>
                </tr>
        <?php
            }
        } else {
        ?>
            <tr>
                <td colspan="6">Tidak ada data ditemukan</td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<!-- Form edit data anggota (tersembunyi untuk pengeditan data melalui AJAX) -->
<form id="form-data" style="display:none;">
    <input type="hidden" id="id" name="id">
    <label>Nama:</label>
    <input type="text" id="nama" name="nama"><br>
    <label>Jenis Kelamin:</label>
    <input type="radio" id="jenkel1" name="jenis_kelamin" value="L"> Laki-Laki
    <input type="radio" id="jenkel2" name="jenis_kelamin" value="P"> Perempuan<br>
    <label>Alamat:</label>
    <input type="text" id="alamat" name="alamat"><br>
    <label>No Telp:</label>
    <input type="text" id="no_telp" name="no_telp"><br>
    <button type="submit" id="simpan">Simpan</button>
</form>

<script type="text/javascript">
$(document).ready(function() {
    // Menginisialisasi DataTable
    $('#example').DataTable();

    // Fungsi untuk mereset pesan error pada form
    function reset() {
        document.getElementById("err_nama").innerHTML = "";
        document.getElementById("err_jenis_kelamin").innerHTML = "";
        document.getElementById("err_alamat").innerHTML = "";
        document.getElementById("err_no_telp").innerHTML = "";
    }

    // Event listener untuk tombol Edit
    $(document).on('click', ".edit_data", function() {
        $('html, body').animate({ scrollTop: 0 }, 'slow'); 

        var id = $(this).attr('id'); 
        $.ajax({
            type: 'POST',
            url: 'get_data.php', 
            data: { id: id },
            dataType: 'json',
            success: function(response) {
                reset(); 

                //$('html, body').animate({ scrollTop: 30 }, 'slow');

                // Isi form dengan data yang didapat dari AJAX
                document.getElementById("id").value = response.id;
                document.getElementById("nama").value = response.nama;
                document.getElementById("alamat").value = response.alamat;
                document.getElementById("no_telp").value = response.no_telp;

                // Cek jenis kelamin dan pilih radio button yang sesuai
                if (response.jenis_kelamin === "L") {
                    document.getElementById("jenkel1").checked = true; 
                } else {
                    document.getElementById("jenkel2").checked = true; 
                }

                // Menampilkan form edit
                $('#form-data').show(); // Menampilkan form edit
            },
            error: function(response) {
                alert("Error: " + response.responseText); // Debug error jika gagal
            }
        });
    });

    // Event listener untuk form submit (simpan)
    $("#form-data").on("submit", function(e) {
        e.preventDefault(); // Menghindari reload halaman

        var id = $("#id").val();
        var nama = $("#nama").val();
        var jenis_kelamin = $("input[name='jenis_kelamin']:checked").val();
        var alamat = $("#alamat").val();
        var no_telp = $("#no_telp").val();

        $.ajax({
            type: "POST",
            url: "update_data.php", // URL untuk update data
            data: {
                id: id,
                nama: nama,
                jenis_kelamin: jenis_kelamin,
                alamat: alamat,
                no_telp: no_telp
            },
            success: function(response) {
                alert("Data berhasil diperbarui");
                location.reload(); // Reload halaman setelah berhasil update
            },
            error: function() {
                alert("Terjadi kesalahan.");
            }
        });
    });

    // Fungsi untuk menghapus data
    $(document).on('click', '.hapus_data', function() {
    var id = $(this).attr('id'); // Mengambil ID data yang akan dihapus

    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) { // Konfirmasi sebelum menghapus
        $.ajax({
            type: 'POST',
            url: 'hapus_data.php', // URL untuk menghapus data
            data: { id: id },
            success: function(response) {
                alert(response); // Tampilkan pesan dari server
                location.reload(); // Reload halaman setelah penghapusan data
            },
            error: function(xhr, status, error) {
                alert("Terjadi kesalahan saat menghapus data");
                console.log(xhr.responseText); // Debug error jika gagal
            }
        });
    }
});

});
</script>

