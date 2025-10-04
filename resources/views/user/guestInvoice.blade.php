{{--<!DOCTYPE html>--}}
{{--<html class="no-js" lang="en">--}}
{{--<head>--}}
{{--    <!-- Meta Tags -->--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta http-equiv="x-ua-compatible" content="ie=edge">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}
{{--    <meta name="author" content="ThemeMarch">--}}
{{--    <title>{{ config('app.name') }}</title>--}}

{{--    <!-- Styles -->--}}
{{--    <link rel="stylesheet" href="{{ asset('user/assets/css/style.css') }}">--}}

{{--    <!-- html2pdf (for Download button) -->--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>--}}

{{--    <!-- Google Analytics -->--}}
{{--    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RLP6WBMWKY"></script>--}}
{{--    <script>--}}
{{--        window.dataLayer = window.dataLayer || [];--}}
{{--        function gtag(){dataLayer.push(arguments);}--}}
{{--        gtag('js', new Date());--}}
{{--        gtag('config', 'G-RLP6WBMWKY');--}}
{{--    </script>--}}

{{--    <style>--}}
{{--        @media print { .cs-hide_print { display: none !important; } }--}}
{{--    </style>--}}

{{--    @php--}}
{{--        // ---------- Server-side totals (robust for print/PDF) ------------}}
{{--        $subtotal = 0.0;--}}
{{--        foreach ($products as $p) {--}}
{{--            $subtotal += ((float)$p->price) * ((float)$p->quantity);--}}
{{--        }--}}

{{--        // Shipping (fix variable typo; use nullsafe + fallback)--}}
{{--        if (($guest->city ?? '') === 'Dhaka') {--}}
{{--            $shipping = isset($delivaryDhaka?->price) ? (float)$delivaryDhaka->price : 0.0;--}}
{{--        } else {--}}
{{--            $shipping = isset($delivaryOutside?->price) ? (float)$delivaryOutside->price : 0.0;--}}
{{--        }--}}

{{--        $grandTotal = $subtotal + $shipping;--}}

{{--        // Money formatter--}}
{{--        function bdt($amount) {--}}
{{--            return '৳' . number_format((float)$amount, 2, '.', '');--}}
{{--        }--}}
{{--    @endphp--}}
{{--</head>--}}

{{--<body>--}}
{{--<div class="cs-container">--}}
{{--    <div class="cs-invoice cs-style1">--}}
{{--        <div class="cs-invoice_in" id="download_section">--}}
{{--            <!-- Header -->--}}
{{--            <div class="cs-invoice_head cs-type1 cs-mb25">--}}
{{--                <div class="cs-invoice_left">--}}
{{--                    <p class="cs-invoice_number cs-primary_color cs-mb5 cs-f16">--}}
{{--                        <b class="cs-primary_color">Invoice No:</b> #{{ $guest->invoice_id }}--}}
{{--                    </p>--}}
{{--                    <p class="cs-invoice_date cs-primary_color cs-m0">--}}
{{--                        <b class="cs-primary_color">Date: </b>{{ \Carbon\Carbon::now('Asia/Dhaka')->format('d-m-Y') }}--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--                <div class="cs-invoice_right cs-text_right">--}}
{{--                    <div class="cs-logo cs-mb5">--}}
{{--                        <a href="{{ route('home') }}">--}}
{{--                            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Bill To / Payment Info -->--}}
{{--            <div class="cs-invoice_head cs-mb10">--}}
{{--                <div class="cs-invoice_left">--}}
{{--                    <b class="cs-primary_color">Invoice To:</b>--}}
{{--                    <p>--}}
{{--                        {{ $guest->name }} <br>--}}
{{--                        <span style="font-weight: bolder;color: black">{{ $guest->phone }}</span><br>--}}
{{--                        {{ $guest->address }} <br>{{ $guest->city }} - {{ $guest->zip }}<br>--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--                <div class="cs-invoice_right cs-text_right">--}}
{{--                    <b class="cs-primary_color">Payment Information:</b>--}}
{{--                    <p>--}}
{{--                        {{ $guest->payment_method }} <br>--}}
{{--                        @if($guest->payment_method != 'COD')--}}
{{--                            Transaction: <strong>{{ $guest->transaction_id }}</strong>--}}
{{--                        @else--}}
{{--                            <span style="font-weight: bolder;color: black">Cash On Delivery</span>--}}
{{--                        @endif--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Items -->--}}
{{--            <div class="cs-table cs-style1">--}}
{{--                <div class="cs-round_border">--}}
{{--                    <div class="cs-table_responsive">--}}
{{--                        <table>--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">Item</th>--}}
{{--                                <th class="cs-width_4 cs-semi_bold cs-primary_color cs-focus_bg">Unit Price</th>--}}
{{--                                <th class="cs-width_2 cs-semi_bold cs-primary_color cs-focus_bg">Qty</th>--}}
{{--                                <th class="cs-width_1 cs-semi_bold cs-primary_color cs-focus_bg">Total Price</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody id="product-list">--}}
{{--                            @foreach($products as $product)--}}
{{--                                @php--}}
{{--                                    $lineTotal = ((float)$product->price) * ((float)$product->quantity);--}}
{{--                                @endphp--}}
{{--                                <tr>--}}
{{--                                    <td class="cs-width_3">{{ $product->name }}</td>--}}
{{--                                    <td class="cs-width_4">{{ bdt($product->price) }}</td>--}}
{{--                                    <td class="cs-width_2">{{ $product->quantity }}</td>--}}
{{--                                    <td class="cs-width_1 item-total-price">{{ bdt($lineTotal) }}</td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}

{{--                    <!-- Subtotal / Shipping -->--}}
{{--                    <div class="cs-invoice_footer cs-border_top">--}}
{{--                        <div class="cs-left_footer cs-mobile_hide">--}}
{{--                            <p class="cs-mb0"><b class="cs-primary_color">Additional Information:</b></p>--}}
{{--                            <p class="cs-m0">--}}
{{--                                At check-in, you may need to present the credit card used for payment of this ticket.--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                        <div class="cs-right_footer">--}}
{{--                            <table>--}}
{{--                                <tbody>--}}
{{--                                <tr class="cs-border_left">--}}
{{--                                    <td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">Subtotal</td>--}}
{{--                                    <td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right" id="subtotal">--}}
{{--                                        {{ bdt($subtotal) }}--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr class="cs-border_left">--}}
{{--                                    <td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">Shipping Charges</td>--}}
{{--                                    <td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right" id="shipping-charges">--}}
{{--                                        {{ bdt($shipping) }}--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Grand Total -->--}}
{{--                <div class="cs-invoice_footer">--}}
{{--                    <div class="cs-left_footer cs-mobile_hide"></div>--}}
{{--                    <div class="cs-right_footer">--}}
{{--                        <table>--}}
{{--                            <tbody>--}}
{{--                            <tr class="cs-border_none">--}}
{{--                                <td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color">Total Amount</td>--}}
{{--                                <td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color cs-text_right" id="total-amount">--}}
{{--                                    {{ bdt($grandTotal) }}--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div> <!-- /.cs-table -->--}}

{{--            <!-- Note -->--}}
{{--            <div class="cs-note">--}}
{{--                <div class="cs-note_left">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">--}}
{{--                        <path d="M416 221.25V416a48 48 0 01-48 48H144a48 48 0 01-48-48V96a48 48 0 0148-48h98.75a32 32 0 0122.62 9.37l141.26 141.26a32 32 0 019.37 22.62z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/>--}}
{{--                        <path d="M256 56v120a32 32 0 0032 32h120M176 288h160M176 368h160" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--                <div class="cs-note_right">--}}
{{--                    <p class="cs-mb0"><b class="cs-primary_color cs-bold">Note:</b></p>--}}
{{--                    <p class="cs-m0">This invoice is computer-generated and does not require a signature.</p>--}}
{{--                </div>--}}
{{--            </div><!-- .cs-note -->--}}
{{--        </div>--}}

{{--        <!-- Buttons -->--}}
{{--        <div class="cs-invoice_btns cs-hide_print">--}}
{{--            <a href="javascript:window.print()" class="cs-invoice_btn cs-color1">--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">--}}
{{--                    <path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/>--}}
{{--                    <rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/>--}}
{{--                    <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/>--}}
{{--                    <circle cx="392" cy="184" r="24"/>--}}
{{--                </svg>--}}
{{--                <span>Print</span>--}}
{{--            </a>--}}
{{--            <button id="download_btn" class="cs-invoice_btn cs-color2">--}}
{{--                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><title>Download</title>--}}
{{--                    <path d="M336 176h40a40 40 0 0140 40v208a40 40 0 01-40 40H136a40 40 0 01-40-40V216a40 40 0 0140-40h40" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>--}}
{{--                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M176 272l80 80 80-80M256 48v288"/>--}}
{{--                </svg>--}}
{{--                <span>Download</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<!-- JS: Download + GA events (no client-side math needed) -->--}}
{{--<script>--}}
{{--    document.getElementById("download_btn").addEventListener("click", function () {--}}
{{--        const invoiceElement = document.querySelector(".cs-invoice");--}}
{{--        const opt = {--}}
{{--            margin: 0.5,--}}
{{--            filename: 'invoice_{{ $guest->invoice_id }}.pdf',--}}
{{--            image: { type: 'jpeg', quality: 0.98 },--}}
{{--            html2canvas: { scale: 2 },--}}
{{--            jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }--}}
{{--        };--}}
{{--        html2pdf().set(opt).from(invoiceElement).save();--}}
{{--    });--}}

{{--    document.addEventListener('DOMContentLoaded', function () {--}}
{{--        // Read server-rendered totals--}}
{{--        const totalText = (document.getElementById('total-amount')?.textContent || '').replace('৳','').trim();--}}
{{--        const total = parseFloat(totalText) || 0;--}}

{{--        // Per-item GA events--}}
{{--        document.querySelectorAll('#product-list tr').forEach(function (row) {--}}
{{--            const productName = row.querySelector('td:nth-child(1)')?.textContent?.trim();--}}
{{--            const unitPrice   = parseFloat((row.querySelector('td:nth-child(2)')?.textContent || '').replace('৳','').trim()) || 0;--}}
{{--            const quantity    = parseFloat((row.querySelector('td:nth-child(3)')?.textContent || '').trim()) || 0;--}}
{{--            const lineTotal   = unitPrice * quantity;--}}

{{--            if (productName && unitPrice && quantity) {--}}
{{--                gtag('event', 'purchase', {--}}
{{--                    'transaction_id': "{{ $guest->invoice_id }}",--}}
{{--                    'affiliation': 'Online Store',--}}
{{--                    'value': lineTotal,--}}
{{--                    'currency': 'BDT',--}}
{{--                    'items': [{--}}
{{--                        'item_name': productName,--}}
{{--                        'price': unitPrice,--}}
{{--                        'quantity': quantity--}}
{{--                    }]--}}
{{--                });--}}
{{--            }--}}
{{--        });--}}

{{--        // Order-level GA event--}}
{{--        const paymentMethod = "{{ $guest->payment_method }}";--}}
{{--        if (paymentMethod !== 'COD') {--}}
{{--            gtag('event', 'purchase', {--}}
{{--                'transaction_id': "{{ $guest->transaction_id }}",--}}
{{--                'affiliation': 'Online Store',--}}
{{--                'value': total,--}}
{{--                'currency': 'BDT',--}}
{{--                'payment_method': 'bKash'--}}
{{--            });--}}
{{--        } else {--}}
{{--            gtag('event', 'purchase', {--}}
{{--                'transaction_id': "{{ $guest->invoice_id }}",--}}
{{--                'affiliation': 'Online Store',--}}
{{--                'value': total,--}}
{{--                'currency': 'BDT',--}}
{{--                'payment_method': 'Cash On Delivery'--}}
{{--            });--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}

{{--<!-- (Optional) Local scripts -->--}}
{{--<script src="{{ asset('assets/js/jquery.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/jspdf.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/html2canvas.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/main.js') }}"></script>--}}
{{--</body>--}}
{{--</html>--}}
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

    <!-- Your base stylesheet (kept) -->
    <link rel="stylesheet" href="{{ asset('user/assets/css/style.css') }}">

    <!-- html2pdf (for Download button) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RLP6WBMWKY"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-RLP6WBMWKY');
    </script>

    @php
        // ---------- Server-side totals (robust for print/PDF) ----------
        $subtotal = 0.0;
        foreach ($products as $p) {
            $subtotal += ((float)$p->price) * ((float)$p->quantity);
        }

        // Shipping (use nullsafe + fallback)
        if (($guest->city ?? '') === 'Dhaka') {
            $shipping = isset($delivaryDhaka?->price) ? (float)$delivaryDhaka->price : 0.0;
        } else {
            $shipping = isset($delivaryOutside?->price) ? (float)$delivaryOutside->price : 0.0;
        }

        $grandTotal = $subtotal + $shipping;

        // Money formatter
        function bdt($amount) {
            return '৳' . number_format((float)$amount, 2, '.', '');
        }
    @endphp

    <style>
        :root {
            --bg: #f3f4f6; /* page background */
            --card: #ffffff; /* invoice card background solid white */
            --muted: #4b5563; /* dark gray for secondary text */
            --text: #1f2937; /* main text color */
            --accent: #2563eb; /* blue */
            --accent-2: #7c3aed; /* purple */
            --success: #16a34a; /* green */
            --danger: #dc2626;
            --warning: #d97706;
            --divider: #e5e7eb;
            --focus-bg: #f3f4f6;
            --shadow-1: 0 2px 6px rgba(0,0,0,.1), 0 6px 24px rgba(0,0,0,.15);
        }


        html, body{
            background: radial-gradient(1200px 800px at 10% -10%, rgba(108,91,255,.15), transparent 50%),
            radial-gradient(1200px 800px at 100% 30%, rgba(106,164,255,.15), transparent 50%),
            var(--bg);
            color: var(--text);
            font-family: 'Inter', system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .cs-container{
            max-width: 980px;
            margin: 28px auto;
            padding: 16px;
        }

        /* Card */
        .cs-invoice {
            background: var(--card);
            border: 1px solid var(--divider);
            border-radius: 12px;
            box-shadow: var(--shadow-1);
            color: var(--text);
        }


        .cs-invoice_in{ padding: 28px; }

        /* Header */
        .cs-invoice_head{
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 24px;
        }
        .cs-type1{
            background: linear-gradient(120deg, rgba(108,91,255,.25), rgba(106,164,255,.25));
            border: 1px solid var(--divider);
            padding: 18px 20px;
            border-radius: 16px;
        }
        .cs-logo img{ height: 42px; filter: drop-shadow(0 6px 18px rgba(0,0,0,.35)); }

        .cs-primary_color {
            color: var(--accent) !important;
        }

        .cs-invoice_number, .cs-invoice_date{ color: var(--muted); }
        .cs-f16{ font-size: 16px; }
        .cs-mb5{ margin-bottom: 6px; }
        .cs-mb10{ margin-bottom: 10px; }
        .cs-mb25{ margin-bottom: 20px; }
        .cs-m0{ margin: 0; }
        .cs-text_right{ text-align: right; }

        /* Info blocks */
        .cs-invoice_head + .cs-mb10{
            margin-top: 14px;
        }
        .cs-invoice_left b, .cs-invoice_right b{
            display: inline-block; margin-bottom: 8px; letter-spacing: .3px;
        }
        .cs-invoice_left p, .cs-invoice_right p{
            color: var(--text);
            opacity: .9; line-height: 1.6;
        }

        /* Table */
        .cs-table_responsive{
            overflow-x: auto;
            border-radius: 14px;
            border: 1px solid var(--divider);
        }
        table{
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            min-width: 720px;
        }
        thead th {
            background: var(--focus-bg);
            color: var(--text);
            font-weight: 600;
        }

        tbody td{
            padding: 14px 16px;
            border-bottom: 1px solid var(--divider);
        }
        tbody tr:nth-child(odd){
            background: var(--table-stripe);
        }
        .cs-round_border{ border-radius: 16px; overflow: hidden; }

        /* Footers / Panels */
        .cs-invoice_footer{
            display: flex;
            align-items: stretch;
            justify-content: space-between;
            gap: 18px;
            padding: 16px 0 0;
            margin-top: 16px;
        }
        .cs-border_top{ border-top: 1px dashed var(--divider); }
        .cs-left_footer{
            flex: 1 1 58%;
            background: linear-gradient(180deg, rgba(255,255,255,.02), transparent);
            border: 1px dashed var(--divider);
            border-radius: 14px;
            padding: 14px 16px;
            color: var(--muted);
        }
        .cs-right_footer{
            flex: 1 1 42%;
            background: linear-gradient(180deg, rgba(255,255,255,.02), transparent);
            border: 1px dashed var(--divider);
            border-radius: 14px;
            padding: 10px 12px;
        }
        .cs-right_footer table{ min-width: 100%; }

        .cs-focus_bg{ background: var(--focus-bg); }
        .cs-semi_bold{ font-weight: 600; }
        .cs-bold{ font-weight: 800; }

        /* Totals row */
        .cs-border_none td{ border: none; }
        .cs-border_top_0{ border-top: none!important; }
        .cs-text_right{ text-align: right; }

        /* Note box */
        .cs-note{
            display: flex;
            gap: 12px;
            align-items: center;
            background: linear-gradient(90deg, rgba(255,255,255,.03), transparent);
            border: 1px dashed var(--divider);
            padding: 14px 16px;
            border-radius: 14px;
            margin-top: 18px;
        }
        .cs-note svg{ width: 28px; height: 28px; color: var(--accent); }

        /* Buttons */
        .cs-invoice_btns{
            display: flex;
            gap: 12px;
            padding: 14px;
            background: linear-gradient(180deg, rgba(255,255,255,.03), transparent);
            border-top: 1px solid var(--divider);
            position: sticky;
            bottom: 0;
            backdrop-filter: blur(6px);
        }
        .cs-invoice_btn{
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 12px;
            background: linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.03));
            color: var(--text);
            border: 1px solid var(--divider);
            text-decoration: none;
            cursor: pointer;
            transition: transform .06s ease, box-shadow .2s ease, border-color .2s ease;
        }
        .cs-invoice_btn:hover{
            transform: translateY(-1px);
            border-color: var(--ring);
            box-shadow: 0 0 0 3px var(--ring) inset;
        }
        .cs-invoice_btn svg{ width: 18px; height: 18px; }

        /* Pills / chips */
        .cs-chip{
            display: inline-flex; align-items:center; gap:8px;
            padding: 6px 10px; border-radius: 999px;
            background: linear-gradient(180deg, rgba(34,197,94,.12), rgba(34,197,94,.06));
            color: #d1fae5; border: 1px solid rgba(34,197,94,.3);
            font-weight: 600; font-size: 12px; letter-spacing: .3px;
        }

        /* Width helpers (kept to align with your table) */
        .cs-width_1{ width: 18%; }
        .cs-width_2{ width: 14%; }
        .cs-width_3{ width: 50%; }
        .cs-width_4{ width: 18%; }

        /* Responsive */
        @media (max-width: 720px){
            .cs-invoice_in{ padding: 18px; }
            .cs-invoice_head{ flex-direction: column; gap: 16px; }
            .cs-text_right{ text-align: left; }
            .cs-mobile_hide{ display: none !important; }
            .cs-invoice_btns{ position: static; }
        }

        /* Print */
        @media print {
            body{ background: white; }
            .cs-hide_print{ display: none !important; }
            .cs-invoice{
                box-shadow: none; border: none; background: white; color: #111;
            }
            .cs-primary_color{ color: #111 !important; }
            .cs-invoice_btns{ display: none!important; }
            .cs-left_footer, .cs-right_footer, .cs-type1, .cs-note{
                border-color: #e5e7eb !important; background: transparent !important;
            }
            thead th{ -webkit-print-color-adjust: exact; print-color-adjust: exact; background: #f3f4f6 !important; color:#111 !important; }
        }
    </style>

    <style>
        /* Hide on print */
        @media print { .cs-hide_print { display: none !important; } }
    </style>
</head>

<body>
<div class="cs-container">
    <div class="cs-invoice cs-style1">
        <div class="cs-invoice_in" id="download_section">
            <!-- Top header -->
            <div class="cs-invoice_head cs-type1 cs-mb25">
                <div class="cs-invoice_left">
                    <p class="cs-invoice_number cs-primary_color cs-mb5 cs-f16">
                        <b class="cs-primary_color">Invoice No:</b> #{{ $guest->invoice_id }}
                    </p>
                    <p class="cs-invoice_date cs-primary_color cs-m0">
                        <b class="cs-primary_color">Date: </b>{{ \Carbon\Carbon::now('Asia/Dhaka')->format('d-m-Y') }}
                    </p>
                </div>
                <div class="cs-invoice_right cs-text_right">
                    <div class="cs-logo cs-mb5">
                        <a href="{{ route('home') }}">
                            <img src="{{asset('user/img/logo.png')}}" alt="Logo">
                        </a>
                    </div>
                    <span class="cs-chip" title="Paid status">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M9 12l2 2 4-4"></path><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" fill="none" stroke="currentColor" stroke-width="1.5"/></svg>
                        {{ $guest->payment_method !== 'COD' ? 'Paid' : 'Pending (COD)' }}
                    </span>
                </div>
            </div>

            <!-- Bill to / Payment info -->
            <div class="cs-invoice_head cs-mb10">
                <div class="cs-invoice_left">
                    <b class="cs-primary_color">Invoice To</b>
                    <p>
                        {{ $guest->name }} <br>
                        <span style="font-weight: 700; color: var(--text)">{{ $guest->phone }}</span><br>
                        {{ $guest->address }} <br>{{ $guest->city }} - {{ $guest->zip }}<br>
                    </p>
                </div>
                <div class="cs-invoice_right cs-text_right">
                    <b class="cs-primary_color">Payment Details</b>
                    <p>
                        Method: <strong>{{ $guest->payment_method }}</strong><br>
                        @if($guest->payment_method != 'COD')
                            Txn ID: <strong>{{ $guest->transaction_id }}</strong>
                        @else
                            <span style="font-weight: 700; color: var(--text)">Cash On Delivery</span>
                        @endif
                    </p>
                </div>
            </div>

            <!-- Items -->
            <div class="cs-table cs-style1">
                <div class="cs-round_border">
                    <div class="cs-table_responsive">
                        <table>
                            <thead>
                            <tr>
                                <th class="cs-width_3">Item</th>
                                <th class="cs-width_4">Unit Price</th>
                                <th class="cs-width_2">Qty</th>
                                <th class="cs-width_1">Total Price</th>
                            </tr>
                            </thead>
                            <tbody id="product-list">
                            @foreach($products as $product)
                                @php $lineTotal = ((float)$product->price) * ((float)$product->quantity); @endphp
                                <tr>
                                    <td class="cs-width_3">{{ $product->name }}</td>
                                    <td class="cs-width_4">{{ bdt($product->price) }}</td>
                                    <td class="cs-width_2">{{ $product->quantity }}</td>
                                    <td class="cs-width_1 item-total-price">{{ bdt($lineTotal) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Subtotal / Shipping -->
                    <div class="cs-invoice_footer cs-border_top">
                        <div class="cs-left_footer cs-mobile_hide">
                            <p class="cs-mb0"><b class="cs-primary_color">Additional Information</b></p>
                            <p class="cs-m0">
                                Please keep this invoice for your records. At delivery, you may be asked to present the payment method used for this order.
                            </p>
                        </div>
                        <div class="cs-right_footer">
                            <table>
                                <tbody>
                                <tr class="cs-border_left">
                                    <td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">Subtotal</td>
                                    <td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right" id="subtotal">
                                        {{ bdt($subtotal) }}
                                    </td>
                                </tr>
                                <tr class="cs-border_left">
                                    <td class="cs-width_3 cs-semi_bold cs-primary_color cs-focus_bg">Shipping</td>
                                    <td class="cs-width_3 cs-semi_bold cs-focus_bg cs-primary_color cs-text_right" id="shipping-charges">
                                        {{ bdt($shipping) }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Grand Total -->
                <div class="cs-invoice_footer">
                    <div class="cs-left_footer cs-mobile_hide"></div>
                    <div class="cs-right_footer">
                        <table>
                            <tbody>
                            <tr class="cs-border_none">
                                <td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color">Total Amount</td>
                                <td class="cs-width_3 cs-border_top_0 cs-bold cs-f16 cs-primary_color cs-text_right" id="total-amount">
                                    {{ bdt($grandTotal) }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div> <!-- /.cs-table -->

            <!-- Note -->
            <div class="cs-note">
                <div class="cs-note_left">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                        <path d="M416 221.25V416a48 48 0 01-48 48H144a48 48 0 01-48-48V96a48 48 0 0148-48h98.75a32 32 0 0122.62 9.37l141.26 141.26a32 32 0 019.37 22.62z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/>
                        <path d="M256 56v120a32 32 0 0032 32h120M176 288h160M176 368h160" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
                    </svg>
                </div>
                <div class="cs-note_right">
                    <p class="cs-mb0"><b class="cs-primary_color cs-bold">Note</b></p>
                    <p class="cs-m0">This invoice is computer-generated and does not require a signature.</p>
                </div>
            </div><!-- .cs-note -->
        </div>

        <!-- Buttons -->
        <div class="cs-invoice_btns cs-hide_print">
            <a href="javascript:window.print()" class="cs-invoice_btn cs-color1" aria-label="Print invoice">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512">
                    <path d="M384 368h24a40.12 40.12 0 0040-40V168a40.12 40.12 0 00-40-40H104a40.12 40.12 0 00-40 40v160a40.12 40.12 0 0040 40h24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/>
                    <rect x="128" y="240" width="256" height="208" rx="24.32" ry="24.32" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/>
                    <path d="M384 128v-24a40.12 40.12 0 00-40-40H168a40.12 40.12 0 00-40 40v24" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/>
                    <circle cx="392" cy="184" r="24"/>
                </svg>
                <span>Print</span>
            </a>
            <button id="download_btn" class="cs-invoice_btn cs-color2" aria-label="Download invoice PDF">
                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><title>Download</title>
                    <path d="M336 176h40a40 40 0 0140 40v208a40 40 0 01-40 40H136a40 40 0 01-40-40V216a40 40 0 0140-40h40" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M176 272l80 80 80-80M256 48v288"/>
                </svg>
                <span>Download</span>
            </button>
        </div>
    </div>
</div>

<!-- JS: Download + GA events (no client-side math needed) -->
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

    document.addEventListener('DOMContentLoaded', function () {
        // Order-level GA event
        const totalText = (document.getElementById('total-amount')?.textContent || '').replace('৳','').trim();
        const total = parseFloat(totalText) || 0;

        // Per-item GA events
        document.querySelectorAll('#product-list tr').forEach(function (row) {
            const productName = row.querySelector('td:nth-child(1)')?.textContent?.trim();
            const unitPrice   = parseFloat((row.querySelector('td:nth-child(2)')?.textContent || '').replace('৳','').trim()) || 0;
            const quantity    = parseFloat((row.querySelector('td:nth-child(3)')?.textContent || '').trim()) || 0;
            const lineTotal   = unitPrice * quantity;

            if (productName && unitPrice && quantity) {
                gtag('event', 'purchase', {
                    'transaction_id': "{{ $guest->invoice_id }}",
                    'affiliation': 'Online Store',
                    'value': lineTotal,
                    'currency': 'BDT',
                    'items': [{
                        'item_name': productName,
                        'price': unitPrice,
                        'quantity': quantity
                    }]
                });
            }
        });

        const paymentMethod = "{{ $guest->payment_method }}";
        if (paymentMethod !== 'COD') {
            gtag('event', 'purchase', {
                'transaction_id': "{{ $guest->transaction_id }}",
                'affiliation': 'Online Store',
                'value': total,
                'currency': 'BDT',
                'payment_method': 'bKash'
            });
        } else {
            gtag('event', 'purchase', {
                'transaction_id': "{{ $guest->invoice_id }}",
                'affiliation': 'Online Store',
                'value': total,
                'currency': 'BDT',
                'payment_method': 'Cash On Delivery'
            });
        }
    });
</script>

<!-- (Optional) Local scripts -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jspdf.min.js') }}"></script>
<script src="{{ asset('assets/js/html2canvas.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
