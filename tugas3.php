<?php

$mhs1 = array('nama' => 'Agung Kusaeri','nim' => '20221001','nilai' => 50);
$mhs2 = array('nama' => 'Deni Muhammad','nim' => '20221002','nilai' => 88);
$mhs3 = array('nama' => 'Tedi S','nim' => '20221003','nilai' => 80);
$mhs4 = array('nama' => 'Tedi A','nim' => '20221004','nilai' => 68);
$mhs5 = array('nama' => 'Dedi Santoso','nim' => '20221005','nilai' => 90);
$mhs6 = array('nama' => 'Irfan Muhammad','nim' => '20221006','nilai' => 95);
$mhs7 = array('nama' => 'Angga Nugraha','nim' => '20221007','nilai' => 55);
$mhs8 = array('nama' => 'Irna Nurmayanti','nim' => '20221008','nilai' => 40);
$mhs9 = array('nama' => 'Diva Amalia','nim' => '20221009','nilai' => 75);
$mhs10 = array('nama' => 'Dani Abraham','nim' => '20221010','nilai' => 85);
$mahasiswa = [$mhs1,$mhs2,$mhs3,$mhs4,$mhs5,$mhs6,$mhs7,$mhs8,$mhs9,$mhs10];
$judul = array('No','NIM','Nama','Nilai','Keterangan','Grade','Predikat');
$data_nilai = array_column($mahasiswa,'nilai');
$total_nilai = array_sum($data_nilai);
function grade($nilai)
{
    if($nilai >= 80)
    {
        $grade = 'A';
    }else if($nilai >= 70 && $nilai < 80)
    {
        $grade = 'B';
    }else if($nilai >= 60 && $nilai < 70)
    {
        $grade = 'C';
    }else if($nilai >= 50 && $nilai < 60)
    {
        $grade = 'D';
    }else{
        $grade = 'E';
    }

    return $grade;
}

function keterangan($nilai)
{
    $keterangan = $nilai >= 60 ? 'Lulus' : 'Tidak Lulus';
    return $keterangan;
}

function predikat($grade)
{
    switch($grade)
    {
        case 'A':
            $predikat = 'Memuaskan';
            break;
        case 'B':
            $predikat = 'Baik';
            break;
        case 'C':
            $predikat = 'Cukup';
            break;
        case 'D':
            $predikat = 'Kurang';
            break;
        case 'E':
            $predikat = 'Buruk';
            break;
        default:
            $predikat = 'Grade Tidak Sesuai';
    }

    return $predikat;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 3 PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Mahasiswa</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <?php foreach($judul as $jdl) : ?>
                                            <th><?= $jdl ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach($mahasiswa as $mhs) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $mhs['nim'] ?></td>
                                        <td><?= $mhs['nama'] ?></td>
                                        <td><?= $mhs['nilai'] ?></td>
                                        <td><?= keterangan($mhs['nilai']) ?></td>
                                        <td><?= grade($mhs['nilai']) ?></td>
                                        <td><?= predikat(grade($mhs['nilai'])) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr class="bg-info text-white">
                                        <td colspan="5">Nilai Tertinggi</td>
                                        <td colspan="2" class="text-center"><?= max($data_nilai) ?></td>
                                    </tr>
                                    <tr class="bg-info text-white">
                                        <td colspan="5">Nilai Terendah</td>
                                        <td colspan="2" class="text-center"><?= min($data_nilai) ?></td>
                                    </tr>
                                    <tr class="bg-info text-white">
                                        <td colspan="5">Nilai Rata-rata</td>
                                        <td colspan="2" class="text-center"><?= $total_nilai/count($mahasiswa) ?></td>
                                    </tr>
                                    <tr class="bg-info text-white">
                                        <td colspan="5">Jumlah Siswa</td>
                                        <td colspan="2" class="text-center"><?= count($mahasiswa) ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>
