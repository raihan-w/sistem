<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Cetak Surat Bidik Misi</title>

    <!-- Custom styles for this template-->
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <div class="pappersize">
        <div class="header-srt">
            <table class="surat">
                <tr>
                    <td>
                        <img class="logo-srt" src="img/<?= $desa['logo']; ?>" alt="">
                    </td>
                    <td>
                        <h5 class="id-srt">pemerintah kabupaten klaten</h5>
                        <h5 class="id-srt">kecamatan prambanan</h5>
                        <h4 class="id-srt">desa geneng</h4>
                        <p class="add-srt">Alamat. Jln.Jogja-Solo Km 21 Ds.Geneng Kode Pos 57454</p>
                    </td>
                </tr>
            </table>
        </div>

        <table class="kd-srt surat">
            <tr>
                <td>
                    <span>nomor kode desa : 33.10.01.2009</span>
                </td>
            </tr>
        </table>

        <table class="opp-srt surat">
            <tr>
                <td>
                    <h5 class="name-srt">surat keterangan</h5>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="no-srt">nomor : <?= $data['nomor']; ?> </p>
                </td>
            </tr>
        </table>

        <table class="surat">
            <tr>
                <td>
                    <span>
                        Yang bertandatangan dibawah ini Kepala Desa Geneng Kecamatan Prambanan Kabupaten Klaten Provinsi Jawa Tengah, menerangkan bahwa :
                    </span>
                </td>
            </tr>
        </table>

        <table class="isi-srt">
            <tr>
                <td> 1. </td>
                <td class='w-25'> Nama </td>
                <td> : </td>
                <td class="isian"> <?= $data['nama_ortu']; ?> </td>
            </tr>
            <tr>
                <td> 2. </td>
                <td class='w-25'> Tempat & tanggal lahir </td>
                <td> : </td>
                <td class="isian"> <?= $data['tpt_ortu']; ?>, <?= date('d F Y', strtotime($data['tgl_ortu'])); ?> </td>
            </tr>
            <tr>
                <td> 3. </td>
                <td class='w-25'> Pekerjaan </td>
                <td> : </td>
                <td class="isian"> <?= $data['pkj_ortu']; ?> </td>
            </tr>
            <tr>
                <td> 4. </td>
                <td class='w-25'> Status </td>
                <td> : </td>
                <td class="isian"> <?= $data['pernikahan_ortu']; ?> </td>
            </tr>
            <tr>
                <td> 5. </td>
                <td class='w-25'> Alamat </td>
                <td> : </td>
                <td class="isian"> <?= $data['domisili_ortu']; ?> </td>
            </tr>
            <tr>
                <td> 6. </td>
                <td class='w-25'> NIK </td>
                <td> : </td>
                <td class="isian"> <?= $data['nik_ortu']; ?> </td>
            </tr>
            <tr>
                <td> 7. </td>
                <td class='w-25'> Penghasilan Orang Tua </td>
                <td> : </td>
                <td class="isian"> Rp. <?= number_format($data['penghasilan'],0,',','.'); ?> </td>
            </tr>
        </table>

        <table class="surat">
            <tr>
                <td>
                    <span>
                        Adalah orang tua dari:
                    </span>
                </td>
            </tr>
        </table>

        <table class="isi-srt">
            <tr>
                <td> 1. </td>
                <td class='w-25'> Nama </td>
                <td> : </td>
                <td class="isian"> <?= $data['nama_anak']; ?> </td>
            </tr>
            <tr>
                <td> 2. </td>
                <td class='w-25'> Tempat & tanggal lahir </td>
                <td> : </td>
                <td class="isian"> <?= $data['tpt_anak']; ?>, <?= date('d F Y', strtotime($data['tgl_anak'])); ?> </td>
            </tr>
            <tr>
                <td> 3. </td>
                <td class='w-25'> Pekerjaan </td>
                <td> : </td>
                <td class="isian"> <?= $data['pkj_anak']; ?> </td>
            </tr>
            <tr>
                <td> 4. </td>
                <td class='w-25'> Alamat </td>
                <td> : </td>
                <td class="isian"> <?= $data['domisili_anak']; ?> </td>
            </tr>
            <tr>
                <td> 5. </td>
                <td class='w-25'> NIK </td>
                <td> : </td>
                <td class="isian"> <?= $data['nik_anak']; ?> </td>
            </tr>
        </table>

        <table class="surat">
            <tr>
                <td>
                    <span>
                        Sehubungan dengan warga tersebut termasuk warga yang tidak mampu, mohon diberikan bantuan dari program <b>BEASISWA/JPS/BSM/BOS/BIDIK MISI/PIP/KIP.</b>
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Demikian harap menjadikan maklum bagi yang berkepentingan.</span>
                </td>
            </tr>
        </table>

        <div class="signature">
            <!-- <p>Geneng, . . . . . . . . . . . . . . . .</p> -->
            <p>Geneng, <?= date('d F Y', strtotime($data['created_at'])); ?></p>
            <table class="surat srt">
                <tr>
                    <td>
                        <!-- <p> Kepala Desa </p> -->
                        <p> <?= $data['jabatan']; ?> </p>
                    </td>
                </tr>
            </table>
            <table class="sig-name surat">
                <tr>
                    <td>
                        <!-- <p> Nama </p> -->
                        <p> <?= $data['nama_penandatangan']; ?> </p>
                    </td>
                </tr>
            </table>
        </div>

        <div class="applicant">
            <table class="surat srt">
                <tr>
                    <td>
                        <p> Pemegang </p>
                    </td>
                </tr>
            </table>
            <table class="sig-name surat">
                <tr>
                    <td>
                        <!-- <p> Nama </p> -->
                        <p> <?= $data['nama_ortu']; ?> </p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>