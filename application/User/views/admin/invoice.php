<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <!-- <?php var_dump($invoice); ?> -->
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="<?= base_url('assets/img/logobaru.jpeg'); ?>" style="width:100%; max-width:100px; padding:0;">
                            </td>

                            <td>
                                ID Pesanan #: <?= $inv_pesanan['id_pesanan']; ?><br>
                                Tanggal : <?= $inv_pesanan['create_date_bayar']; ?><br>
                                <!-- Due: February 1, 2015 -->
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Garden Buana<br>
                                Jl. Meruya Selatan No.1 <br>
                                Kembangan, Jakarta Barat 11650
                            </td>

                            <td>
                                <?= $inv_pesanan['nama_pemesan']; ?><br>
                                <?= $inv_pesanan['telpon']; ?><br>
                                <?= $inv_pesanan['email']; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Metode Pembayaran
                </td>

                <td>

                </td>
            </tr>

            <tr class="details">
                <td>
                    Transfer Bank
                </td>

                <td>

                </td>
            </tr>

            <tr class="heading">
                <td>
                    Pembayaran
                </td>

                <td>
                    Price
                </td>
            </tr>

            <tr class="item">
                <td>
                    Jasa Vendor Taman Hias - <b><?= $inv_pesanan['nama_vendor']; ?></b>
                </td>

                <td>
                    Rp. <?= number_format($inv_pesanan['harga'], 0, ".", ".") ?>,-
                </td>
            </tr>

            <tr class="item">
                <td>
                    Biaya Adm.
                </td>

                <td>
                    -
                </td>
            </tr>

            <tr class="item last">
                <td>
                    Diskon
                </td>

                <td>
                    -
                </td>
            </tr>

            <tr class="total">
                <td></td>

                <td>
                    Total: Rp. <?= number_format($inv_pesanan['harga'], 0, ".", ".") ?>,-
                </td>
            </tr>
        </table>
    </div>
</body>

</html>