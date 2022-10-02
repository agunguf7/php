<?php

class Pegawai
{
    public $nip;
    public $nama;
    public $jabatan;
    public $status;
    public $agama;
    const PT = "PT. Mencari Cinta Sejati";
    static $no = 1;


    public function __construct($nip, $nama, $jabatan, $status, $agama)
    {
        $this->nip = $nip;
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->status = $status;
        $this->agama = $agama;
    }
    public function setGapok()
    {
        switch ($this->jabatan) {
            case 'Manager':
                $gapok = 15000000;
                break;
            case 'Asisten Manager':
                $gapok = 10000000;
                break;
            case 'Kabag':
                $gapok = 7000000;
                break;
            case 'Staff':
                $gapok = 4000000;
                break;

            default:
                break;
        }
        return $gapok;
    }
    public function setTunjab()
    {
        $tunjab = $this->setGapok() * 20 / 100;
        return $tunjab;
    }
    public function setTunkel()
    {
        $tunkel = ($this->status == "Menikah") ? $this->setGapok() * 10 / 100 : 0;
        return $tunkel;
    }
    public function setGator()
    {
        $gator = $this->setGapok() + $this->setTunjab() + $this->setTunkel();
        return $gator;
    }
    public function setZakat()
    {
        $zakat = ($this->agama == "Islam" && $this->setGator() >= 6000000) ? $this->setGapok() * 2.5 / 100 : 0;
        return $zakat;
    }
    public function setGaber()
    {
        $gaber = $this->setGator() - $this->setZakat();
        return $gaber;
    }

    public function setCetak()
    {
        echo
        '
        <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-header">
                        Detail Pegawai
                    </div>
                    <div class="card-body">
                        <ul class="list-inline">
                            <li class="list-inline-item d-flex justify-content-between">
                                <span>No.</span>
                                <span>' . self::$no++ . '</span>
                            </li>
                            <hr>
                            <li class="list-inline-item d-flex justify-content-between">
                                <span>Nama</span>
                                <span>' . $this->nama . '</span>
                            </li>
                            <hr>
                            <li class="list-inline-item d-flex justify-content-between">
                                <span>Agama</span>
                                <span>' . $this->agama . '</span>
                            </li>
                            <hr>
                            <li class="list-inline-item d-flex justify-content-between">
                                <span>Jabatan</span>
                                <span>' . $this->jabatan . '</span>
                            </li>
                            <hr>
                            <li class="list-inline-item d-flex justify-content-between">
                                <span>Gaji Pokok</span>
                                <span>' . $this->setGapok() . '</span>
                            </li>
                            <hr>
                            <li class="list-inline-item d-flex justify-content-between">
                                <span>Tunjangan Jabatan</span>
                                <span>' . $this->setTunjab() . '</span>
                            </li>
                            <hr>
                            <li class="list-inline-item d-flex justify-content-between">
                                <span>Tunjangan Keluarga</span>
                                <span>' . $this->setTunkel() . '</span>
                            </li>
                            <hr>
                            <li class="list-inline-item d-flex justify-content-between">
                                <span>Zakat Profesi</span>
                                <span>' . $this->setZakat() . '</span>
                            </li>
                            <hr>
                            <li class="list-inline-item d-flex justify-content-between">
                                <span>Gaji Kotor</span>
                                <span>' . $this->setGator() . '</span>
                            </li>
                            <hr>
                            <li class="list-inline-item d-flex justify-content-between">
                                <span>Gaji Bersih</span>
                                <span>' . $this->setGaber() . '</span>
                            </li>
                            <hr>
                        </ul>
                    </div>
                </div>
            </div>
        

        ';
    }
}


$dataPegawai = [
    [
        '201311001','Agung Kusaeri','Manager','Belum Menikah','Islam'
    ],
    [
        '201311002','Deni Muhammad','Asisten Manager','Menikah','Islam'
    ],
    [
        '201311003','Yoesoef','Kabag','Menikah','Kristen'
    ],
    [
        '201311004','Jamrudi','Staff','Menikah','Budha'
    ],
    [
        '201311005','Dani Aftaini','Asisten Manager','Belum Nikah','Islam'
    ]
];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas 4 PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 class="text-center my-5 mb-5">
            <?= Pegawai::PT ?>
        </h2>
        <div class="row">
            <?php
            foreach ($dataPegawai as $dpeg) {
                $dapeg = new Pegawai($dpeg[0], $dpeg[1], $dpeg[2], $dpeg[3], $dpeg[4]);
                $dapeg->setCetak();
            }
            ?>
        </div>
        <h5>
            Jumlah Pegawai: <?= count($dataPegawai) ?>
        </h5>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>
