<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>SYRA HIJAB PRINTING</title>
    
    <style>
    @media print {
      #printPageButton {
        display: none;
    }
    }
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
        padding-top: 20px;
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
    
    .invoice-box table tr.item td{
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
<script>
function cetak()
{
    document.getElementById('button').style.visibility='hidden';
    window.print();
    location.replace('<?php echo base_url() ?>');

}
</script>
<body>
    <br>
    <br>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="4">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="https://www.sparksuite.com/images/logo.png" style="width:100%; max-width:300px;">
                            </td>
                            <td>
                                Kode Pemesanan #: <?php echo $data_penjualan[1]->id_pemesanan ?><br>
                                Kode Penerimaan #: <?php echo $data_penerimaan[0]->id_penerimaan ?><br>
                                Dibuat: <?php echo $data_penjualan[1]->tgl_pemesanan ?><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="4">
                    <table>
                        <tr>
                            <td>
                                Syra Hijab.<br>
                                Jl Sukasari 2 No 275 Blok F Sadang Serang<br>
                                Bandung, Indonesia 14325
                            </td>

                            <td>
                                Syra Hijab.<br>
                                syrahijab@gmail.com
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td width="15%">
                    Nama Barang
                </td>
                <td width="20%">
                    Harga Satuan
                </td>
                 <td width="20%" style="text-align: right;">
                    Jumlah Terima
                </td>
                 <td width="20%" style="text-align: right;">
                    Sub Total
                </td>
            </tr>

            <?php foreach ($data_penjualan as $key => $value) { ?>
            <tr class="item">
                <td>
                    <?php echo $value->nama_barang; ?>
                </td>

                <td>
                    Rp. <?php echo number_format($value->harga_jual); ?>
                </td>
                <td style="text-align: right;">
                    <?php echo $value->jumlah_pesan; ?> Pcs
                </td>
                <td style="text-align: right;">
                    Rp. <?php echo number_format($value->sub_total); ?>
                </td>
            </tr>
            <?php } ?>
            <tr class="total">
                <td></td>

                <td colspan="3">
                 Total: Rp. <?php echo @number_format($data_penjualan[1]->total_bayar); ?>
             </td>
         </tr>
         <tr>
            <td><button id="button" onClick="cetak();">Print</button></td>
        </tr>
     </table>
 </div>
</body>
</html>