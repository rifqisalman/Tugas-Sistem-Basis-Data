<?php
include 'koneksi.php';

function tambah_data($data)
{
    $id_kecamatan = $data['id_kecamatan'];
    $nama_kecamatan = $data['nama_kecamatan'];
    $luas_kecamatan = $data['luas_kecamatan'];
    $nama_camat = $data['nama_camat'];
    $nomor_telp = $data['nomor_telp'];

    $query = "INSERT INTO kecamatan VALUES('$id_kecamatan','$nama_kecamatan','$luas_kecamatan','$nama_camat','$nomor_telp')";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    if (!$sql) {
        return false; // Gagal eksekusi query
    }

    return true;
}

function ubah_data($data)
{
    $id_kecamatan = $data['id_kecamatan'];
    $nama_kecamatan = $data['nama_kecamatan'];
    $luas_kecamatan = $data['luas_kecamatan'];
    $nama_camat = $data['nama_camat'];
    $nomor_telp = $data['nomor_telp'];

    $queryShow = "SELECT * FROM kecamatan WHERE id_kecamatan = '$id_kecamatan';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    if (!$result) {
        return false; // Data tidak ditemukan
    }

    $query = "UPDATE kecamatan SET nama_kecamatan='$nama_kecamatan', luas_kecamatan='$luas_kecamatan',
              nama_camat='$nama_camat', nomor_telp='$nomor_telp' WHERE id_kecamatan='$id_kecamatan'";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    if (!$sql) {
        return false; // Gagal eksekusi query
    }

    return true;
}

function hapus_data($data)
{
    $id_kecamatan = $data['hapus'];
    $query = "DELETE FROM kecamatan WHERE id_kecamatan = '$id_kecamatan'";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    if (!$sql) {
        return false; // Gagal eksekusi query
    }

    return true;
}
?>