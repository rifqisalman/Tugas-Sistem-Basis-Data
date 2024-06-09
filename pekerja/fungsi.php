<?php
include 'koneksi.php';

function tambah_data($data)
{
    $id_pekerja = $data['id_pekerja'];
    $nama_pekerja = $data['nama_pekerja'];
    $posisi = $data['posisi'];
    $no_telp = $data['no_telp'];

    $query = "INSERT INTO pekerja VALUES('$id_pekerja', '$nama_pekerja', '$posisi', '$no_telp')";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function ubah_data($data)
{
    $id_pekerja = $data['id_pekerja'];
    $nama_pekerja = $data['nama_pekerja'];
    $posisi = $data['posisi'];
    $no_telp = $data['no_telp'];

    $queryShow = "SELECT * FROM pekerja where id_pekerja = '$id_pekerja';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    $query = "UPDATE pekerja SET nama_pekerja='$nama_pekerja', posisi='$posisi',
no_telp='$no_telp' WHERE id_pekerja='$id_pekerja';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function hapus_data($data)
{
    $id_pekerja = $data['hapus'];
    $query = "DELETE FROM pekerja WHERE id_pekerja = '$id_pekerja'";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

?>