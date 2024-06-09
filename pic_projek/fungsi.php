<?php
include 'koneksi.php';

function tambah_data($data)
{
    $id_PIC = $data['id_PIC'];
    $nama_perusahaan = $data['nama_perusahaan'];
    $nama_PIC = $data['nama_PIC'];
    $alamat_perusahaan = $data['alamat_perusahaan'];
    $peran = $data['peran'];

    $query = "INSERT INTO pic_projek VALUES('$id_PIC', '$nama_perusahaan', '$nama_PIC', '$alamat_perusahaan', '$peran')";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function ubah_data($data)
{
    $id_PIC = $data['id_PIC'];
    $nama_perusahaan = $data['nama_perusahaan'];
    $nama_PIC = $data['nama_PIC'];
    $alamat_perusahaan = $data['alamat_perusahaan'];
    $peran = $data['peran'];

    $queryShow = "SELECT * FROM pic_projek where id_PIC = '$id_PIC';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    $query = "UPDATE pic_projek SET nama_perusahaan='$nama_perusahaan', nama_PIC='$nama_PIC',
alamat_perusahaan='$alamat_perusahaan', peran='$peran' WHERE id_PIC='$id_PIC';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function hapus_data($data)
{
    $id_PIC = $data['hapus'];
    $query = "DELETE FROM pic_projek WHERE id_PIC = '$id_PIC';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

?>