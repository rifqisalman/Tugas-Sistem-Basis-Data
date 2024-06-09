<?php
include 'koneksi.php';
session_start();

$query = "SELECT * FROM pekerja";
$sql = mysqli_query($conn, $query);

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
                            <a class="nav-link active" href="../index.php">
                                <i class="fas fa-home"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Kecamatan">
                                <i class="fas fa-map-marker-alt"></i> Kecamatan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
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
                    <h1 class="mt-4">
                        <center>Data Pekerja</center>
                    </h1>

                    <a href="kelola.php" type="button" class="btn btn-primary mb-3">
                        <i class="fa fa-plus"></i>
                        Tambah Data
                    </a>

                    <?php
                    if (isset($_SESSION['eksekusi'])):
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>
                                <?php echo $_SESSION['eksekusi']; ?>
                            </strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        session_destroy();
                    endif;
                    ?>

                    <div class="table-responsive">
                        <table class="table align-middle table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <center>ID_Pekerja</center>
                                    </th>
                                    <th>
                                        <center>Nama_Pekerja</center>
                                    </th>
                                    <th>
                                        <center>Posisi</center>
                                    </th>
                                    <th>
                                        <center>Nomor_Telepon</center>
                                    </th>
                                    <th>
                                        <center>Aksi</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($result = mysqli_fetch_assoc($sql)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <center>
                                                <?php echo $result['id_pekerja']; ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php echo $result['nama_pekerja']; ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php echo $result['posisi']; ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <?php echo $result['no_telp']; ?>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                                <a href="kelola.php?ubah=<?php echo $result['id_pekerja']; ?>" type="button"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                    Ubah
                                                </a>
                                                <a href="proses.php?hapus=<?php echo $result['id_pekerja']; ?>"
                                                    type="button" class="btn btn-danger btn-sm"
                                                    onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut???')">
                                                    <i class="fa fa-trash"></i>
                                                    Hapus
                                                </a>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
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