<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Cetak Surat Kematian-<?= $data['nomor']; ?> </title>

    <!-- Custom styles for this template-->
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href=" <?= base_url('css/style.css'); ?> " rel="stylesheet" type="text/css">
    <link href=" <?= base_url('css/sb-admin-2.min.css'); ?> " rel="stylesheet">

</head>

<body>
    <div class="pappersize">
        <div class="header-srt">
            <table class="surat">
                <tr>
                    <td>
                        <img class="logo-srt" src="img/logo.png" alt="">
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
                    <p>kode desa :</p>
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
                <td> Nama </td>
                <td> : </td>
                <td class="isian"> <?= $data['nama']; ?> </td>
            </tr>
            <tr>
                <td> 2. </td>
                <td> Jenis Kelamin </td>
                <td> : </td>
                <td class="isian"> <?= $data['jenkel']; ?> </td>
            </tr>
            <tr>
                <td> 3. </td>
                <td> Tempat/Tanggal Lahir </td>
                <td> : </td>
                <td class="isian"> <?= $data['tpt_lahir']; ?>,  <?= date('d F Y', strtotime($data['tgl_lahir'])); ?> </td>
            </tr>
            <tr>
                <td> 4. </td>
                <td> Agama </td>
                <td> : </td>
                <td class="isian"> <?= $data['agama']; ?> </td>
            </tr>
            <tr>
                <td> 5. </td>
                <td> Warganegara </td>
                <td> : </td>
                <td class="isian"> <?= $data['status']; ?> </td>
            </tr>
            <tr>
                <td> 6. </td>
                <td> Surat Bukti Diri </td>
            </tr>
            <tr>
                <td> </td>
                <td> NIK </td>
                <td> : </td>
                <td class="isian"> <?= $data['nik']; ?> </td>
            </tr>
            <tr>
                <td> </td>
                <td> No.KK </td>
                <td> : </td>
                <td class="isian"> <?= $data['kk']; ?> </td>
            </tr>
            <tr>
                <td> 7. </td>
                <td> Pekerjaan </td>
                <td> : </td>
                <td class="isian"> <?= $data['pekerjaan']; ?> </td>
            </tr>
            <tr>
                <td> 8. </td>
                <td> Berlaku </td>
                <td> : </td>
                <td class="isian"> <?= date('d F Y', strtotime($data['created_at'])); ?> s/d <?= date('d F Y', strtotime($data['due_date'])); ?> </td>
            </tr>
            <tr>
                <td> 9. </td>
                <td> Alamat Sesuai KTP </td>
                <td> : </td>
                <td class="isian">  </td>
            </tr>
            <tr>
                <td> </td>
                <td> Alamat Domisili </td>
                <td> : </td>
                <td class="isian"> <?= $data['domisili']; ?> </td>
            </tr>
            <tr>
                <td> 10. </td>
                <td> Keperluan </td>
                <td> : </td>
                <td class="isian"> <?= $data['isi_surat']; ?> </td>
            </tr>
            <tr>
                <td> 11. </td>
                <td> Keterangan </td>
                <td> : </td>
                <td class="isian"> <?= $data['keterangan']; ?> </td>
            </tr>
        </table>

        <table class="surat">
            <tr>
                <td>
                    <p>Demikian Surat Keterangan ini kami buat atas permintaan yang bersangkutan agar yang berkepentingan mengetahui dan maklum.</p>
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
                        <p> Pemohon </p>
                    </td>
                </tr>
            </table>
            <table class="sig-name surat">
                <tr>
                    <td>
                        <!-- <p> Nama </p> -->
                        <p> <?= $data['pemohon']; ?> </p>
                    </td>
                </tr>
            </table>
        </div>
    </div>

</body>

</html>