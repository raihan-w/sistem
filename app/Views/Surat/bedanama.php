<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Surat Beda Nama - <?= $data['nomor']; ?></title>

    <!-- Custom styles for this template-->
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <div class="pappersize">
        <div class="header-srt">
            <table class="surat srt" >
                <tr>
                    <td>
                        <img src="img/logo.png" class="logo-srt">
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

        <table class="kd-srt surat" >
            <tr>
                <td>
                    <p>nomor kode desa :</p>
                </td>
            </tr>
        </table>

        <table class="opp-srt surat" >
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

        <table class="surat" >
            <tr>
                <td>
                    <span>
                        Yang bertandatangan dibawah ini Kepala Desa Geneng Kecamatan Prambanan Kabupaten Klaten Provinsi Jawa Tengah, menerangkan bahwa :
                    </span>
                </td>
            </tr>
        </table>

        <table class="isi-srt" >
            <tr>
                <td> 1. </td>
                <td> Nama Lengkap </td>
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
                <td> Tampat/Tanggal Lahir </td>
                <td> : </td>
                <td class="isian"> <?= $data['tpt_lahir']; ?>,  <?= date('d F Y', strtotime($data['tgl_lahir'])); ?> </td>
            </tr>
            <tr>
                <td> 4. </td>
                <td> Agama </td>
                <td> : </td>
                <td class="isian"> <?= $data['agama']; ?></td>
            </tr>
            <tr>
                <td> 5. </td>
                <td> No.KTP/NIK </td>
                <td> : </td>
                <td class="isian"> <?= $data['nik']; ?> </td>
            </tr>
            <tr>
                <td> 6. </td>
                <td> Pekerjaan </td>
                <td> : </td>
                <td class="isian"> <?= $data['pekerjaan']; ?> </td>
            </tr>
            <tr>
                <td> 7. </td>
                <td> Alamat </td>
                <td> : </td>
                <td class="isian">  </td>
            </tr>
        </table>

        <table class="surat" >
            <tr>
                <td>
                    Sepanjang pengetahuan kami dan berdasarkan pengakuan warga tersebut, bahwa ;
                </td>
            </tr>
            <tr>
                <td>
                    <?= $data['isi_surat']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Demikian surat keterangan ini kami buat atas permintaan yang bersangkutan dan dapat dipergunakan sebagaimana mestinya.</p>
                </td>
            </tr>
        </table>

        <div class="signature">
            <!-- <p>Geneng, . . . . . . . . . . . . . . . .</p> -->
            <p>Geneng, <?= date('d F Y', strtotime($data['created_at'])); ?></p>
            <table class="surat srt" >
                <tr>
                    <td>
                        <!-- <p> Kepala Desa </p> -->
                        <p> <?= $data['jabatan']; ?> </p>
                    </td>
                </tr>
            </table>
            <table class="sig-name surat" >
                <tr>
                    <td>
                        <!-- <p> Nama </p> -->
                        <p> <?= $data['nama_penandatangan']; ?> </p>
                    </td>
                </tr>
            </table>
        </div>

        <div class="applicant">
            <table class="surat srt" >
                <tr>
                    <td>
                        <p> Pemohon </p>
                    </td>
                </tr>
            </table>
            <table class="sig-name surat" >
                <tr>
                    <td>
                        <!-- <p> Nama </p> -->
                        <p> <?= $data['nama']; ?> </p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>


</html>