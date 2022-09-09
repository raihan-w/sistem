<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Cetak Surat Keterangan</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/style.css" rel="stylesheet" type="text/css" media="all">

    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .pappersize {
            background: #FFFFFF;
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            color: #000;
        }

        .surat {
            width: 100%;
        }

        .header-srt {
            margin: 0px 0px 20px 0px;
            padding: 0px 0px 10px 0px;
            border-bottom: double #000;
            text-align: center;
        }

        .logo-srt {
            width: 100px;
        }

        .id-srt {
            margin: 0;
            text-transform: uppercase;
            text-align: center;
            font-weight: 700;
            width: 80%;
        }

        .add-srt {
            margin: 16px 0px 0px 0px;
            text-transform: capitalize;
            text-align: center;
            font-style: italic;
            width: 80%;
        }

        .kd-srt {
            font-size: 10pt;
            text-transform: capitalize;
        }

        .opp-srt {
            text-align: center;
        }

        .name-srt {
            margin: 0;
            font-weight: 700;
            text-transform: uppercase;
            text-decoration: underline;
        }

        .no-srt {
            font-weight: 700;
            text-transform: capitalize;
        }

        .isi-srt {
            font-size: 11.5pt;
            margin: 0 auto;
            margin-bottom: 1rem;
            width: 95%;
        }

        .isian {
            width: 75%;
        }

        .tgl-srt {
            margin: 0px 24px 0px 0px;
            padding: 0px 48px 0px 0px;
            text-align: right;
        }

        .signature {
            float: right;
            text-align: center;
            text-transform: capitalize;
            width: 5cm;
            margin: 24px 0px 0px 0px;
        }

        .applicant {
            float: left;
            text-align: center;
            text-transform: capitalize;
            width: 5cm;
            margin: 74px 0px 0px 0px;
        }

        .sig-name {
            margin: 64px 0px 0px 0px;
            font-weight: 700;
            text-transform: uppercase;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container-fluid">

        <div class="pappersize">
            <div class="header-srt">
                <table class="surat" border="1">
                    <tr>
                        <td>
                            <img class="logo-srt" src="<?= base_url('img/logo.png'); ?>">
                        </td>
                        <td>
                            <h4 class="id-srt">pemerintah kabupaten klaten</h4>
                            <h4 class="id-srt">kecamatan prambanan</h4>
                            <h3 class="id-srt">desa geneng</h3>
                            <p class="add-srt">Alamat. Jln.Jogja-Solo Km 21 Ds.Geneng Kode Pos 57454</p>
                        </td>
                    </tr>
                </table>
            </div>

            <table class="kd-srt surat" border="1">
                <tr>
                    <td>
                        <p>nomor kode desa :</p>
                    </td>
                </tr>
            </table>

            <table class="opp-srt surat" border="1">
                <tr>
                    <td>
                        <h4 class="name-srt">surat keterangan</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="no-srt">nomor :</p>
                    </td>
                </tr>
            </table>

            <table class="surat" border="1">
                <tr>
                    <td>
                        <span>
                            Yang bertandatangan dibawah ini Kepala Desa Geneng Kecamatan Prambanan Kabupaten Klaten Provinsi Jawa Tengah, menerangkan bahwa :
                        </span>
                    </td>
                </tr>
            </table>

            <table class="isi-srt" border="1">
                <tr>
                    <td class="text-right"> 1. </td>
                    <td> Nama Lengkap </td>
                    <td> : </td>
                    <td class="isian"> N/A </td>
                </tr>
                <tr>
                    <td class="text-right"> 2. </td>
                    <td> Jenis Kelamin </td>
                    <td> : </td>
                    <td class="isian"> N/A </td>
                </tr>
                <tr>
                    <td class="text-right"> 3. </td>
                    <td> Tampat/Tanggal Lahir </td>
                    <td> : </td>
                    <td class="isian"> N/A </td>
                </tr>
                <tr>
                    <td class="text-right"> 4. </td>
                    <td> Agama </td>
                    <td> : </td>
                    <td class="isian"> N/A </td>
                </tr>
                <tr>
                    <td class="text-right"> 5. </td>
                    <td> No.KTP/NIK </td>
                    <td> : </td>
                    <td class="isian"> N/A </td>
                </tr>
                <tr>
                    <td class="text-right"> 6. </td>
                    <td> Pekerjaan </td>
                    <td> : </td>
                    <td class="isian"> N/A </td>
                </tr>
                <tr>
                    <td class="text-right"> 7. </td>
                    <td> Alamat </td>
                    <td> : </td>
                    <td class="isian"> N/A </td>
                </tr>
            </table>

            <table class="surat" border="1">
                <tr>
                    <td>
                        Sepanjang pengetahuan kami dan berdasarkan pengakuan warga tersebut, bahwa ;
                    </td>
                </tr>
                <tr>
                    <td>
                        keterangan
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>Demikian surat keterangan ini kami buat atas permintaan yang bersangkutan dan dapat dipergunakan sebagaimana mestinya.</p>
                    </td>
                </tr>
            </table>

            <div class="signature">
                <p>Geneng, . . . . . . . . . . . . . . . .</p>
                <table class="surat" border="1">
                    <tr>
                        <td>
                            <p> Kepala Desa </p>
                        </td>
                    </tr>
                </table>
                <table class="sig-name surat" border="1">
                    <tr>
                        <td>
                            <p> Nama </p>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="applicant">
                <table class="surat" border="1">
                    <tr>
                        <td>
                            <p> Pemohon </p>
                        </td>
                    </tr>
                </table>
                <table class="sig-name surat" border="1">
                    <tr>
                        <td>
                            <p> Nama </p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</body>


</html>