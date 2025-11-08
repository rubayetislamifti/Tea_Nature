<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ThemeMarch">
    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- html2pdf -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    @php
        $subtotal = 0.0;
        foreach ($products as $p) {
            $subtotal += ((float)$p->price) * ((float)$p->quantity);
        }

        if (($guest->city ?? '') === 'Dhaka') {
            $shipping = isset($delivaryDhaka?->price) ? (float)$delivaryDhaka->price : 0.0;
        } else {
            $shipping = isset($delivaryOutside?->price) ? (float)$delivaryOutside->price : 0.0;
        }

        $grandTotal = $subtotal + $shipping;

        function bdt($amount) {
            return '৳' . number_format((float)$amount, 2, '.', '');
        }
    @endphp

    <style>
        :root {
            --bg: #f3f6f3;
            --card: #ffffff;
            --muted: #374151;
            --text: #1b2e1b;
            --accent: #15803d;
            --accent-2: #16a34a;
            --success: #22c55e;
            --divider: #b7f7ca;
            --focus-bg: #ecfdf5;
            --shadow-1: 0 2px 6px rgba(0,0,0,.1), 0 6px 20px rgba(22,163,74,.12);
        }

        html, body {
            background: radial-gradient(1200px 800px at 10% -10%, rgba(34,197,94,.15), transparent 50%),
            radial-gradient(1200px 800px at 100% 30%, rgba(16,185,129,.1), transparent 50%),
            var(--bg);
            color: var(--text);
            font-family: 'Inter', sans-serif;
        }

        .cs-container {
            max-width: 980px;
            margin: 28px auto;
            padding: 16px;
        }

        .cs-invoice {
            background: var(--card);
            border: 1px solid var(--divider);
            border-radius: 12px;
            box-shadow: var(--shadow-1);
        }

        .cs-invoice_in { padding: 28px; }

        .cs-invoice_head {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 24px;
        }

        .cs-type1 {
            background: linear-gradient(135deg, rgba(22,163,74,.15), rgba(34,197,94,.15));
            border: 1px solid var(--divider);
            padding: 18px 20px;
            border-radius: 16px;
        }

        .cs-logo img {
            height: 42px;
            filter: drop-shadow(0 6px 18px rgba(0,0,0,.35));
        }

        .cs-primary_color { color: var(--accent-2) !important; }
        .cs-invoice_number, .cs-invoice_date { color: var(--muted); }

        .cs-mb5 { margin-bottom: 6px; }
        .cs-mb10 { margin-bottom: 10px; }
        .cs-mb25 { margin-bottom: 20px; }
        .cs-m0 { margin: 0; }

        .cs-text_right { text-align: right; }

        .cs-invoice_left b, .cs-invoice_right b {
            display: inline-block;
            margin-bottom: 8px;
        }

        .cs-invoice_left p, .cs-invoice_right p {
            color: var(--text);
            opacity: .9;
            line-height: 1.6;
        }

        /* ✅ Fixed Table Styling */
        .cs-table_responsive {
            overflow-x: auto;
            border-radius: 10px;
            border: 1px solid var(--divider);
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        thead th {
            background: linear-gradient(180deg, #dcfce7, #bbf7d0);
            color: #14532d;
            font-weight: 700;
            padding: 12px 14px;
            font-size: 14px;
            text-align: left;
            border-bottom: 2px solid #86efac;
        }

        tbody td {
            padding: 12px 14px;
            border-bottom: 1px solid #c7f9d3;
            font-size: 14px;
            color: #1b2e1b;
        }

        tbody tr:nth-child(even) {
            background-color: #f0fdf4;
        }

        tbody tr:hover {
            background-color: #dcfce7;
            transition: background 0.15s ease-in-out;
        }

        thead tr:first-child th:first-child { border-top-left-radius: 10px; }
        thead tr:first-child th:last-child { border-top-right-radius: 10px; }

        td, th {
            text-align: left;
            vertical-align: middle;
        }

        tbody td:last-child {
            text-align: right;
            font-weight: 600;
        }

        /* ✅ Totals Table */
        .cs-right_footer table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 10px;
        }

        .cs-right_footer table td {
            padding: 10px 12px;
            border: 1px solid #c7f9d3;
            color: var(--accent);
            font-weight: 600;
            font-size: 14px;
        }

        .cs-right_footer table tr:last-child td {
            background: linear-gradient(90deg, #bbf7d0, #86efac);
            color: #064e3b;
            font-weight: 700;
        }

        .cs-note {
            display: flex;
            gap: 12px;
            align-items: center;
            background: linear-gradient(90deg, rgba(240,253,244,.6), rgba(255,255,255,.3));
            border: 1px dashed var(--divider);
            padding: 14px 16px;
            border-radius: 14px;
            margin-top: 18px;
        }

        .cs-note svg { width: 28px; height: 28px; color: var(--accent); }

        /* ✅ Status Chip */
        .cs-chip {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 10px;
            border-radius: 999px;
            background: linear-gradient(180deg, rgba(34,197,94,.15), rgba(34,197,94,.05));
            color: var(--accent);
            border: 1px solid rgba(34,197,94,.3);
            font-weight: 600;
            font-size: 12px;
        }

        /* ✅ Buttons */
        .cs-invoice_btns {
            display: flex;
            gap: 12px;
            padding: 14px;
            border-top: 1px solid var(--divider);
            background: linear-gradient(180deg, rgba(240,253,244,.9), rgba(255,255,255,.95));
            position: sticky;
            bottom: 0;
        }

        .cs-invoice_btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 10px;
            background: linear-gradient(90deg, var(--accent-2), var(--success));
            color: #fff;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: background .2s ease, transform .1s ease;
        }

        .cs-invoice_btn:hover {
            transform: translateY(-1px);
            background: linear-gradient(90deg, var(--success), var(--accent-2));
        }

        @media (max-width: 720px) {
            .cs-invoice_head { flex-direction: column; gap: 16px; }
            .cs-text_right { text-align: left; }
        }

        @media print {
            body { background: white; }
            .cs-hide_print { display: none !important; }
            .cs-invoice { border: none; box-shadow: none; }
        }
    </style>
</head>

<body>
<div class="cs-container">
    <div class="cs-invoice cs-style1">
        <div class="cs-invoice_in" id="download_section">
            <!-- Header -->
            <div class="cs-invoice_head cs-type1 cs-mb25">
                <div class="cs-invoice_left">
                    <p class="cs-invoice_number cs-primary_color cs-mb5">
                        <b>Invoice No:</b> #{{ $guest->invoice_id }}
                    </p>
                    <p class="cs-invoice_date cs-primary_color cs-m0">
                        <b>Date:</b> {{ \Carbon\Carbon::now('Asia/Dhaka')->format('d-m-Y') }}
                    </p>
                </div>
                <div class="cs-invoice_right cs-text_right">
                    <div class="cs-logo cs-mb5">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('user/img/logo.png') }}" alt="Logo">
                        </a>
                    </div>
                    <span class="cs-chip">
                        {{ $guest->payment_method !== 'COD' ? 'Paid' : 'Pending (COD)' }}
                    </span>
                </div>
            </div>

            <!-- Customer Info -->
            <div class="cs-invoice_head cs-mb10">
                <div class="cs-invoice_left">
                    <b class="cs-primary_color">Invoice To</b>
                    <p>
                        {{ $guest->name }} <br>
                        <b>{{ $guest->phone }}</b><br>
                        {{ $guest->address }} <br>{{ $guest->city }} - {{ $guest->zip }}
                    </p>
                </div>
                <div class="cs-invoice_right cs-text_right">
                    <b class="cs-primary_color">Payment Details</b>
                    <p>
                        Method: <strong>{{ $guest->payment_method }}</strong><br>
                        @if($guest->payment_method != 'COD')
                            Txn ID: <strong>{{ $guest->transaction_id }}</strong>
                        @else
                            <strong>Cash On Delivery</strong>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Product Table -->
            <div class="cs-table cs-style1">
                <div class="cs-round_border">
                    <div class="cs-table_responsive">
                        <table>
                            <thead>
                            <tr>
                                <th>Item</th>
                                <th>Unit Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody id="product-list">
                            @foreach($products as $product)
                                @php $lineTotal = ((float)$product->price) * ((float)$product->quantity); @endphp
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ bdt($product->price) }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ bdt($lineTotal) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Totals -->
                    <div class="cs-invoice_footer cs-border_top">
                        <div class="cs-left_footer cs-mobile_hide">
                            <p><b class="cs-primary_color">Additional Information</b></p>
                            <p>Please keep this invoice for your records.</p>
                        </div>
                        <div class="cs-right_footer">
                            <table>
                                <tr>
                                    <td>Subtotal</td>
                                    <td class="cs-text_right">{{ bdt($subtotal) }}</td>
                                </tr>
                                <tr>
                                    <td>Shipping</td>
                                    <td class="cs-text_right">{{ bdt($shipping) }}</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td class="cs-text_right">{{ bdt($grandTotal) }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Note -->
                <div class="cs-note">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M416 221.25V416a48 48 0 01-48 48H144a48 48 0 01-48-48V96a48 48 0 0148-48h98.75a32 32 0 0122.62 9.37l141.26 141.26a32 32 0 019.37 22.62z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/>
                    </svg>
                    <p><b class="cs-primary_color">Note:</b> This invoice is computer-generated and does not require a signature.</p>
                </div>
            </div>
        </div>

        <!-- Buttons -->
        <div class="cs-invoice_btns cs-hide_print">
            <button onclick="window.print()" class="cs-invoice_btn">🖨 Print</button>
            <button id="download_btn" class="cs-invoice_btn">⬇ Download</button>
        </div>
    </div>
</div>

<script>
    document.getElementById("download_btn").addEventListener("click", function () {
        const invoiceElement = document.querySelector(".cs-invoice");
        const opt = {
            margin: 0.5,
            filename: 'invoice_{{ $guest->invoice_id }}.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
        };
        html2pdf().set(opt).from(invoiceElement).save();
    });
</script>
</body>
</html>
