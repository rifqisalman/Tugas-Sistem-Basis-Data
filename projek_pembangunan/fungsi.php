<?php
include 'koneksi.php';

function tambah_data($data)
{
    $id_projek = $data['id_projek'];
    $nama_projek = $data['nama_projek'];
    $jenis_projek = $data['jenis_projek'];
    $lokasi_projek = $data['lokasi_projek'];
    $status_projek = $data['status_projek'];
    $jumlah_anggaran = $data['jumlah_anggaran'];
    $tanggal_mulai = $data['tanggal_mulai'];
    $tanggal_selesai = $data['tanggal_selesai'];

    $query = "INSERT INTO projek_pembangunan VALUES('$id_projek', '$nama_projek', '$jenis_projek', '$lokasi_projek', '$status_projek', '$jumlah_anggaran', '$tanggal_mulai', '$tanggal_selesai')";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function ubah_data($data)
{
    $id_projek = $data['id_projek'];
    $nama_projek = $data['nama_projek'];
    $jenis_projek = $data['jenis_projek'];
    $lokasi_projek = $data['lokasi_projek'];
    $status_projek = $data['status_projek'];
    $jumlah_anggaran = $data['jumlah_anggaran'];
    $tanggal_mulai = $data['tanggal_mulai'];
    $tanggal_selesai = $data['tanggal_selesai'];

    $queryShow = "SELECT * FROM projek_pembangunan where id_projek = '$id_projek';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    $query = "UPDATE projek_pembangunan SET nama_projek='$nama_projek', jenis_projek='$jenis_projek',
lokasi_projek='$lokasi_projek', status_projek='$status_projek', jumlah_anggaran='$jumlah_anggaran',
tanggal_mulai='$tanggal_mulai', tanggal_selesai='$tanggal_selesai' WHERE id_projek='$id_projek';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function hapus_data($data)
{
    $id_projek = $data['hapus'];
    $query = "DELETE FROM projek_pembangunan WHERE id_projek = '$id_projek';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

?>