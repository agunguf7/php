<?php

    if(isset($_POST['simpan']))
    {
        $nama_pegawai = $_POST['nama_pegawai'];
        $agama = $_POST['agama'];
        $jabatan = $_POST['jabatan'];
        $status = $_POST['status'];
        $jumlah_anak = $_POST['jumlah_anak'];

        switch($jabatan)
        {
            case 'Manager':
                $gaji_pokok =  20000000;
                break;
            case 'Asisten':
                $gaji_pokok =  15000000;
                break;
            case 'Kabag':
                $gaji_pokok =  10000000;
                break;
            case 'Staff':
                $gaji_pokok =  4000000;
                break;
            default:
                $gaji_pokok =  0;
        }

        $tunjangan_jabatan = $gaji_pokok * 20/100;
        if($status === 'Menikah' && $jumlah_anak <= 2)
        {
            $tunjangan_keluarga = $gaji_pokok * 5/100;
        }else if($status === 'Menikah' && $jumlah_anak >= 3 && $jumlah_anak <=5)
        {
            $tunjangan_keluarga = $gaji_pokok * 10/100;
        }else if($status === 'Menikah' && $jumlah_anak > 5)
        {
            $tunjangan_keluarga = $gaji_pokok * 15/100;
        }else{
            $tunjangan_keluarga = 0;
        }

        $gaji_kotor = $gaji_pokok + $tunjangan_jabatan + $tunjangan_keluarga;

        $agama === 'Islam' && $gaji_kotor >= 6000000 ? $zakat_profesi = ($gaji_kotor * 2.5/100) : $zakat_profesi = 0;
        $take_home_pay = $gaji_kotor - $zakat_profesi;
    }
    

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Latihan Memproses Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>


    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h6>Form Data Pegawai</h6>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group my-2">
                                <label class="my-1" for="nama_pegawai">Nama Pegawai</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama Pegawai" name="nama_pegawai" id="nama_pegawai" required>
                            </div>
                            <div class="form-group my-2">
                                <label class="my-1" for="agama">Agama</label>
                                <select name="agama" id="agama" class="form-control" required>
                                    <option value="" selected disabled>Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                </select>
                            </div>
                            <div class="form-group my-2">
                                <label class="my-1" for="jabatan">Jabatan</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jabatan" id="jabatan2" value="Manager" required>
                                        <label class="form-check-label" for="jabatan2">Manager</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jabatan" id="jabatan3" value="Asisten" required>
                                        <label class="form-check-label" for="jabatan3">Asisten</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jabatan" id="jabatan4" value="Kabag" required>
                                        <label class="form-check-label" for="jabatan4">Kabag</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jabatan" id="jabatan5" value="Staff" required>
                                        <label class="form-check-label" for="jabatan5">Staff</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-2">
                                <label class="my-1" for="status">Status</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status2" value="Menikah" required>
                                        <label class="form-check-label" for="status2">Menikah</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" id="status3" value="Belum" required>
                                        <label class="form-check-label" for="status3">Belum</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group my-2">
                                <label class="my-1" for="jumlah_anak">Jumlah Anak</label>
                                <input type="number" class="form-control" placeholder="Masukan Jumlah Anak" name="jumlah_anak" id="jumlah_anak">
                            </div>
                            <div class="form-group my-2">
                               <button class="btn btn-primary" name="simpan">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Pegawai</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-inline">
                        <li class="list-inline-item d-flex justify-content-between">
                            <span>Nama Pegawai</span>
                            <span><?= $nama_pegawai ?></span>
                        </li>
                        <hr>
                        <li class="list-inline-item d-flex justify-content-between">
                            <span>Agama</span>
                            <span><?= $agama ?></span>
                        </li>
                        <hr>
                        <li class="list-inline-item d-flex justify-content-between">
                            <span>Jabatan</span>
                            <span><?= $jabatan ?></span>
                        </li>
                        <hr>
                        <li class="list-inline-item d-flex justify-content-between">
                            <span>Status</span>
                            <span><?= $status ?></span>
                        </li>
                        <hr>
                        <li class="list-inline-item d-flex justify-content-between">
                            <span>Jumlah Anak</span>
                            <span><?= $jumlah_anak ?></span>
                        </li>
                        <hr>
                        <li class="list-inline-item d-flex justify-content-between">
                            <span>Gaji Pokok</span>
                            <span><?= number_format($gaji_pokok) ?></span>
                        </li>
                        <hr>
                        <li class="list-inline-item d-flex justify-content-between">
                            <span>Tunjangan Jabatan</span>
                            <span><?= number_format($tunjangan_jabatan) ?></span>
                        </li>
                        <hr>
                        <li class="list-inline-item d-flex justify-content-between">
                            <span>Tunjangan Keluarga</span>
                            <span><?= number_format($tunjangan_keluarga) ?></span>
                        </li>
                        <hr>
                        <li class="list-inline-item d-flex justify-content-between">
                            <span>Gaji Kotor</span>
                            <span><?= number_format($gaji_kotor) ?></span>
                        </li>
                        <hr>
                        <li class="list-inline-item d-flex justify-content-between">
                            <span>Zakat Profesi</span>
                            <span><?= number_format($zakat_profesi) ?></span>
                        </li>
                        <hr>
                        <li class="list-inline-item d-flex justify-content-between">
                            <span>Take Home Pay</span>
                            <span><?= number_format($take_home_pay) ?></span>
                        </li>
                        <hr>
                       
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <?php if ($_POST) : ?>
        <script>
            const myModal = new bootstrap.Modal('#myModal', {});
            myModal.show();
        </script>
    <?php endif; ?>

</body>

</html>
