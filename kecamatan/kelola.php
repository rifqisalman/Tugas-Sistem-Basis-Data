<?php
include 'koneksi.php';
session_start();

$id_kecamatan = '';
$nama_kecamatan = '';
$luas_kecamatan = '';
$nama_camat = '';
$nomor_telp = '';

if (isset($_GET['ubah'])) {
    $id_kecamatan = $_GET['ubah'];

    $query = "SELECT * FROM kecamatan WHERE id_kecamatan = '$id_kecamatan';";
    $sql = mysqli_query($conn, $query);

    $result = mysqli_fetch_assoc($sql);

    if ($result) {
        $id_kecamatan = $result["id_kecamatan"];
        $nama_kecamatan = $result["nama_kecamatan"];
        $luas_kecamatan = $result["luas_kecamatan"];
        $nama_camat = $result["nama_camat"];
        $nomor_telp = $result["nomor_telp"];
    } else {
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Projek Akhir Sistem Basis Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
        /* Add your custom styles here */
        body {
            background-color: #f4f4f4;
        }

        /* Updated sidebar styles */
        #sidebar {
            background-color: #343a40;
            color: white;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            transition: all 0.3s;
            z-index: 1;
            padding-top: 4.5rem;
        }

        #sidebar a {
            color: white;
        }

        #sidebar .nav-link {
            padding: 10px 20px;
        }

        #sidebar .nav-link:hover {
            background-color: #444;
        }

        /* Adjust main content padding to accommodate the fixed sidebar */
        main {
            padding-top: 4.5rem;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#" style="margin-left: 50px">Projek Akhir</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block collapse">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="../menu.php">
                                <i class="fas fa-home"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="fas fa-map-marker-alt"></i> Kecamatan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../pekerja">
                                <i class="fas fa-users"></i> Pekerja
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../pic_projek">
                                <i class="fas fa-user-tie"></i> PIC Projek
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../projek_pembangunan">
                                <i class="fas fa-hard-hat"></i> Projek Pembangunan
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                <!-- Judul -->
                <div class="container">
                    <h1 class="mt-4 mb-4">
                        <center>Tambah Data Kecamatan</center>
                    </h1>
                </div>

                <div class="container">
                    <form method="POST" action="proses.php">
                        <input type="hidden" value="<?php echo $id_kecamatan; ?>" name="id_kecamatan">
                        <div class="mb-3 row">
                            <label for="id_kecamatan" class="col-sm-2 col-form-label">ID_Kecamatan</label>
                            <div class="col-sm-10">
                                <input type="text" name="id_kecamatan" class="form-control" id="id_kecamatan"
                                    value="<?php echo $id_kecamatan ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_kecamatan" class="col-sm-2 col-form-label">Nama_Kecamatan</label>
                            <div class="col-sm-10 text-center">
                                <input type="text" name="nama_kecamatan" class="form-control mx-auto d-block"
                                    id="nama_kecamatan" value="<?php echo $nama_kecamatan ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="luas_kecamatan" class="col-sm-2 col-form-label">Luas_Kecamatan</label>
                            <div class="col-sm-10 text-center">
                                <input type="text" name="luas_kecamatan" class="form-control mx-auto d-block"
                                    id="luas_kecamatan" value="<?php echo $luas_kecamatan ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nama_camat" class="col-sm-2 col-form-label">Nama_Camat</label>
                            <div class="col-sm-10 d-flex justify-content-center">
                                <input type="text" name="nama_camat" class="form-control" id="nama_camat"
                                    value="<?php echo $nama_camat ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nomor_telp" class="col-sm-2 col-form-label">Nomor_Telpon</label>
                            <div class="col-sm-10">
                                <input type="text" name="nomor_telp" class="form-control" id="nomor_telp"
                                    value="<?php echo $nomor_telp ?>">
                            </div>
                        </div>

                        <div class="mb-3 row mt-4">
                            <div class="col">
                                <?php
                                if (isset($_GET['ubah'])) {
                                    ?>
                                    <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                                        <i class="fas fa-save"></i>
                                        Simpan Perubahan
                                    </button>
                                    <?php
                                } else {
                                    ?>
                                    <button type="submit" name="aksi" value="add" class="btn btn-primary">
                                        <i class="fas fa-plus"></i>
                                        Tambahkan
                                    </button>
                                    <?php
                                }
                                ?>
                                <a href="index.php" type="button" class="btn btn-danger">
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                    Batal
                                    </button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                </tbody>
                </table>
        </div>
    </div>
    </main>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript to handle sidebar toggle
        const sidebar = document.getElementById("sidebar");
        document
            .querySelector(".navbar-toggler")
            .addEventListener("click", () => {
                sidebar.classList.toggle("collapse");
            });
    </script>
</body>

</html>