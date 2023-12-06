{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Laravel Snappy PDF Example</title>
</head>
<style>
    @page {
        margin: 0;
    }

    body {
        font-family: Arial, sans-serif;
    }

    .container {
        width: 83%;
        margin: 20pt 50pt 20pt 50pt;
        display: flex
    }

    header {
        text-align: center;
    }

    h1 {
        margin: 0;
    }

    .center {
        position: relative;
        top: 15%;
        width: 100%;
        text-align: center;
        font-size: 18px;
    }

    .center-table {
        position:  absolute;
        top: 20%;
        width: 500px;
        margin: auto;
        text-align: center;
        font-size: 18px;
    }

    .topright {
        position: absolute;
        top: 15px;
        right: 16px;
        font-size: 18px;
    }

    .topleft {
        position: absolute;
        top: 50px;
        left: 16px;
        font-size: 18px;
    }

    table {
    border-collapse: collapse;
    width: 100%;
    }

    th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
    }

    tr:hover {background-color: coral;}


    .content {
        margin: 10px;
        display: flex;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 0px;
    }

    th,
    td {
        border: 1px solid #808080;
        padding: 2px;
        text-align: left;
    }

    th {
        font-size: 14px;
    }

    td {
        font-size: 12px;
    }
</style>
<body>
    <img style=" width: 25%; " class="topleft" src="https://storage.googleapis.com/developer_dasarata/logo-mitra/logo.png"
        alt="Background Image">
    <img style=" width: 15%; height: auto; " class="topright" src="https://storage.googleapis.com/developer_dasarata/logo-mitra/mitra.jpg"
        alt="Background Image">

    <div class="center">INVOICE</div>
    <div class="center-table">
        <table>
            <tr>
              <th>Nama Paket</th>
              <th>Harga</th>
              <th>Points</th>
            </tr>
            <tr>
              <td>Peter</td>
              <td>Griffin</td>
              <td>$100</td>
            </tr>
          </table>
    </div>
</body>
</html> --}}


<!DOCTYPE html>
<html>

<head>
    <title>Surat Jalan</title>
</head>
<style>
    @page {
        margin: 0;
    }

    body {
        font-family: Arial, sans-serif;
    }

    .container {
        width: 83%;
        margin: 20pt 50pt 20pt 50pt;
        display: flex
    }

    header {
        text-align: center;
    }

    h1 {
        margin: 0;
    }


    .content {
        margin: 10px;
        display: flex;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 0px;
    }

    th,
    td {
        border: 1px solid #808080;
        padding: 2px;
        text-align: left;
    }

    th {
        font-size: 14px;
    }

    td {
        font-size: 12px;
    }
</style>
</head>

<body>
    {{-- <img style=" width: 50%; height: auto;  position: fixed; top: 0; left: 0;z-index: -1" src="https://storage.googleapis.com/developer_dasarata/logo-mitra/logo.png"
        alt="Background Image"> --}}
    <div class="container">
        <header>
            <table style="margin: 0; border-bottom:solid black; padding:0;">
                <td style="border: none;  width: 140px">
                    <img src="logo.png" style=" height:auto; width:140px;  padding: 30px 10 0 0">
                </td>
                <td style="border: none; padding: 30px 0 5px 0; margin-right:200px; font-size: 15px">
                    <h3 style="padding: 0; margin:0">
                        PT. GARUDA LINTAS CAKRAWALA
                        <h6 style="padding: 0; margin:0">
                            Jl. Terusan Ambarawa No.41 E, Sumbersari <br>
                            Kec. Lowokwaru, Kota Malang, Jawa Timur 65145
                        </h6>
                    </h3>
                </td>
            </table>


        </header>


        <div class="content">
            <p style="margin-top: 0px; font-size:13px"><strong>Perihal : </strong> Surat Jalan</p>
            <table style="margin-top: 10px">
                <thead>
                    <tr>
                        <th style="border: none; padding:0px">
                            <p style="font-size:12px; padding:0px; margin:2px">
                                <strong>Tanggal </strong>

                            </p>
                            <p style="font-size:12px; padding:0px; margin:2px"><strong>No. Surat Jalan</strong></p>
                        </th>
                        <th style="border: none; ">
                            <p style="font-size:12px; padding:0px; margin:2px">
                                <strong>: </strong>

                            </p>
                            <p style="font-size:12px; padding:0px; margin:2px"><strong>:</strong></p>
                        </th>
                        <th style="border: none; ">
                            <p style="font-size:12px; padding:0px; margin:2px">

                                {{-- {{ \Carbon\Carbon::parse($data->shipping_date)->format('d F Y') }} --}}
                            </p>
                            <p style="font-size:12px; padding:0px; margin:2px"><strong></strong> </p>
                        </th>
                        <th style="border: none">
                            <p style="font-size:12px; padding:0px; margin:2px"><strong>Tujuan
                                </strong>
                            </p>
                            <p style="font-size:12px; padding:0px; margin:2px"><strong>Dikirim Dengan</strong>
                            </p>
                        </th>
                        <th style="border: none; ">
                            <p style="font-size:12px; padding:0px; margin:2px">
                                <strong>: </strong>

                            </p>
                            <p style="font-size:12px; padding:0px; margin:2px"><strong>:</strong></p>
                        </th>

                    </tr>
                </thead>
            </table>


            <h4 style="margin: 10px 0 10px 0">Detail Barang</h4>
            <h6 style="margin: 0px">
                Semua barang dalam kondisi baik, harap untuk terima barang dengan baik. <p
                    style="color: red; font-size: 10px; margin: 0px 0 5px 0">
                    Barang yang sudah diterima tidak bisa dikembalikan
                </p>
            </h6>

            <p style="font-size:12px; padding:0px; margin-top:20px">
                <strong>Diterima : </strong>
            </p>
            <br>
            <br>

            </p>
            <table style="margin-top: 20px">
                <thead>
                    <tr style="text-align: center;">
                        <th style="border: none; ">
                            <p style="font-size:12px; padding:0px; margin:2px; text-align: center;">
                                <strong>Penerima </strong>
                            </p>
                            <br>
                            <br>
                            <p style="font-size:12px; padding:0px; margin:2px; text-align: center;">
                                Awan
                            </p>
                        </th>
                        <th>
                            <p
                                style="font-size:12px; padding:0px; margin:2px; text-align: center; border: 1px solid #808080;">
                                <strong>Driver </strong>
                            </p>
                            <br>
                            <br>
                            <p style="font-size:12px; padding:0px; margin:2px; text-align: center;">

                            </p>
                        </th>
                        <th>
                            <p
                                style="font-size:12px; padding:0px; margin:2px; text-align: center; border: 1px solid #808080;">
                                <strong>Loading </strong>
                            </p>
                            <br>
                            <br>
                            <p style="font-size:12px; padding:0px; margin:2px; text-align: center;">
                                Awan
                            </p>
                        </th>
                        <th>
                            <p
                                style="font-size:12px; padding:0px; margin:2px; text-align: center; border: 1px solid #808080;">
                                <strong>Warehouse </strong>
                            </p>
                            <br>
                            <br>
                            <p style="font-size:12px; padding:0px; margin:2px; text-align: center;">
                                Awan
                            </p>
                        </th>

                    </tr>
                </thead>
            </table>


        </div>
    </div>

</body>

</html>




