<!DOCTYPE html>
<html>

<head>
    <title>Invoice</title>
</head>
<style>
    @page {
        margin: 0;
    }

    body {
        font-family: "Times New Roman", Times, serif;
    }

    .container {
        width: 85%;
        margin: 20pt 30pt 20pt 30pt;
        display: flex
    }

    h3 {
        margin: 20px;
        text-align: center;
    }

    footer {
        text-align: center;
        padding: 10;
        position: fixed;
        bottom: 0;
        width: 100%;
        font-size: 12px;
        font-style: bold;
    }

    .signature {
        text-align: center;
        padding: 10px;
        position: fixed;
        bottom: 150px;
        right: 20;
        width: 25%;
        font-size: 14px;
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

        text-align: left;
    }

    th {
        font-size: 14px;
    }

    td {
        font-size: 12px;
    }

    .header-image {
        max-height: 100px;
        width: 170px;
        padding: 30px 10 0 20;
    }
    .header-mitra-image {
        max-height: 70px;
        max-width: 200px;
        padding: 30px 20 0 10;
        float: right;
    }

    .p-style {
        font-size: 11px;
        padding: 1px;
        margin: 0;
        font-style: bold;
    }
    header{
        height: 100px;
        margin-bottom: 20px;
    }
</style>
</head>

<body>
    <img style=" width: 50%; height: auto;  position: fixed; bottom: 0; right: 0;z-index: -1; opacity: 0.4;"
        src="favicon.png" alt="Background Image">
    <div class="container">
        <header>
            <img src="https://storage.googleapis.com/developer_dasarata/logo-mitra/logo.png" class="header-image">
            <img src="https://storage.googleapis.com/developer_dasarata/logo-mitra/mitra.jpg" class="header-mitra-image">
        </header>

        <div class="content">
            <h3>
                INVOICE
            </h3>

            {{-- table informasi data invoice --}}
            <table style="margin-top: 10px; width:100%;">
                <thead>
                    <tr>
                        <th style="border: none; padding:0px; width:50%;">
                            <p class="p-style">
                                <strong>
                                    Kepada :
                                </strong>
                            </p>
                            <p class="p-style">
                                <strong>
                                    {{ $payment->customerBill->customer->nama }}
                                </strong>
                            </p>
                            <p class="p-style">
                                <strong>{{ $payment->customerBill->customer->alamat }}</strong>
                            </p>
                            <p class="p-style">
                                <strong>
                                    {{ $payment->customerBill->customer->nomor_telpn }}
                                </strong>
                            </p>
                        </th>
                        <th>
                            <p class="p-style">
                                <strong>
                                    No. Invoice
                                </strong>
                            </p>
                            <p class="p-style">
                                <strong>
                                    Tanggal
                                </strong>
                            </p>
                            <p class="p-style">
                                <strong>
                                    ID Pelanggan
                                </strong>
                            </p>
                        </th>
                        <th>
                            <p class="p-style">
                                {{-- : GLC/INV-0003-10/10/23 --}}
                                : {{ $payment->trx_id }}
                            </p>
                            <p class="p-style">
                                : {{ $date }}
                            </p>
                            <p class="p-style">
                                : {{ $payment->customerBill->customer->customer_id }}
                            </p>
                        </th>
                    </tr>
                    {{-- <tr>
                        <th style="border: none; padding:0px; width:50%;">
                        </th>
                        <th style="border: none; width:20%">
                            <p class="p-style">
                                <strong>
                                    Jatuh Tempo
                                </strong>
                            </p>
                        </th>
                        <th style="border: none; width:30%">
                            <p class="p-style">
                                : 10 November 2023
                            </p>
                        </th>
                    </tr> --}}
                </thead>
            </table>


            {{-- table informasi jumlah invoice --}}
            <table style="margin-top: 30px;">
                <thead style="border-bottom: 2px solid black; border-top: 2px solid black;">
                    <tr>
                        <th style="padding: 4px;">No.</th>
                        <th style="text-align: center;">Nama Paket</th>
                        <th style="text-align: center;">Metode Pembayaran</th>
                        <th style="text-align: center;">Total Amount</th>
                    </tr>
                </thead>
                <tbody style="border-bottom: 2px solid black">
                    <tr style="font-style: bold;">
                        <td style="width: 20px; text-align: center;">1</td>
                        <td style="padding: 10px;text-align: center;">
                            <p class="p-style">
                                {{ $payment->customerBill->nama_paket }}
                            </p>
                        </td>
                        <td style="padding: 5px;text-align: center;">
                            <p class="p-style">
                                {{ $payment->payment_channel }}
                            </p>
                        </td>
                        <td>
                            <p style="text-align: center;" class="p-style">
                                {{ "Rp.".number_format($payment->payment_total) }}
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>

            {{-- <table style="margin-top: 10px; width:100%; ">
                <thead>
                    <tr>
                        <th style="border: none; padding:0px; width:50%;">

                        </th>
                        <th style="border-bottom :2px solid black; width:20%">
                            <p class="p-style"><strong>Dasar Pengenaan Pajak
                                </strong>
                            </p>
                            <p class="p-style"><strong>PPN 11%</strong>
                            </p>
                            <p class="p-style">
                                <strong>Biaya Materai</strong>
                            </p>
                        </th>
                        <th style="border-bottom :2px solid black; width:5%">
                            <p class="p-style">
                                :

                            </p>
                            <p class="p-style"> :
                            </p>

                            <p class="p-style">
                                :

                            </p>
                        </th>
                        <th style="border-bottom :2px solid black; width:25%">
                            <p class="p-style" style="text-align : right;">
                                1.351.351
                            </p>
                            <p class="p-style" style="text-align : right;">
                                148.649
                            </p>

                            <p class="p-style" style="text-align : right;">
                                -

                            </p>
                        </th>

                    </tr>
                    <tr>
                        <th style="border: none; padding:0px; width:50%;">
                        </th>
                        <th style="border: none; width:20%">
                            <p class="p-style"><strong>Total
                                </strong>
                            </p>
                        </th>
                        <th style=" width:5%">
                            <p class="p-style"><strong>:
                                </strong>
                            </p>
                        </th>
                        <th style="border: none; width:25%">
                            <p class="p-style" style="text-align : right;"> 1.500.000

                            </p>
                        </th>
                    </tr>
                </thead>
            </table> --}}
            {{-- <div class="p-style">
                <p style="font-style: bold-italic; margin-top:10px;">
                    Terbilang : Satu Juta Lima Ratus Ribu Rupiah </p>
                <p style="margin-top:5px;">
                    Layanan ini merupakan objek dari Pajak Penghasilan</p>
                <p style="margin-top:5px;">
                    Note :
                    <br>
                    Sistem Pembayaran Melalui Transfer Bank
                </p>
            </div> --}}

            {{-- table informasi pembayaran invoice--}}
            {{-- <table style="width: 100%; margin-top:10px;">
                <tbody>
                    <tr>
                        <td style="width: 15%; ">
                            <p class="p-style" style="padding: 3px 0 3px 0;">
                                Bank

                            </p>
                            <p class="p-style" style="padding: 3px 0 3px 0;">
                                No. Rekening
                            </p>
                            <p class="p-style" style="padding: 3px 0 3px 0;">
                                A/n
                            </p>
                        </td>
                        <td style="width: 85%;">
                            <p class="p-style" style="padding: 3px 0 3px 0;">
                                : BRI (Bank Rakyat Indonesia)

                            </p>
                            <p class="p-style" style="padding: 3px 0 3px 0;">
                                : 034401112223306
                            </p>
                            <p class="p-style" style="padding: 3px 0 3px 0;">
                                : PT GARUDA LINTAS CAKRAWALA
                            </p>

                        </td>

                    </tr>
                </tbody>
            </table> --}}

            <div style="float: left">
                <p style="text-align: left; padding: 10px 0 0 0;" class="p-style">
                    <strong>Metode Pembayaran :</strong>
                </p>
                <table style="margin-top: 10px; width:100%; ">
                    <thead>
                        <tr>
                            <th style="border: none; padding:0px; width:50%;">

                            </th>
                            <th style="black; width:20%">
                                <p class="p-style"><strong>BCA Virtual Account
                                    </strong>
                                </p>
                                <p class="p-style"><strong>BRI Virtual Account</strong>
                                </p>
                                <p class="p-style">
                                    <strong>Alfamart</strong>
                                </p>
                                <p class="p-style">
                                    <strong>Indomaret</strong>
                                </p>
                            </th>
                            <th style="black; width:5%">
                                <p class="p-style">
                                    :
                                </p>
                                <p class="p-style">
                                    :
                                </p>
                                <p class="p-style"> :
                                </p>
                                <p class="p-style">
                                    :
                                </p>
                            </th>
                            <th style="black; width:25%">
                                <p class="p-style" style="text-align : right;">
                                    {{ '19005614'.$payment->customerBill->virtual_account }}
                                </p>
                                <p class="p-style" style="text-align : right;">
                                    {{ '142321'.$payment->customerBill->virtual_account }}
                                </p>
                                <p class="p-style" style="text-align : right;">
                                    {{ '352220'.$payment->customerBill->virtual_account }}
                                </p>
                                <p class="p-style" style="text-align : right;">
                                    {{ '352221'.$payment->customerBill->virtual_account }}
                                </p>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>


            {{-- signature--}}
            <div class="signature">
                <p class="p-style" style="margin-bottom: 70px;">
                    {{ $partner->kecamatan }}, {{ $date }}

                </p>
                <p class="p-style"
                    style=" width: auto; border-bottom: 1px solid black;  text-transform: uppercase; text-align:center;">
                    Ja'far Shodiq
                </p>
                <p class="p-style" style="text-align:center;">
                    Manager Accounting
                </p>
            </div>

        </div>
    </div>
    <footer>
        PT. GARUDA LINTAS CAKRAWALA
        <p style="font-size:12px; text-align:center;padding : 10px">
            {{ $partner->alamat }}<br> KECAMATAN  {{ $partner->kecamatan }} -  {{ $partner->kabupaten }} - {{ $partner->provinsi }}
            ({{ $partner->kode_pos }})
            <br>
        </p>
    </footer>

</body>

</html>
