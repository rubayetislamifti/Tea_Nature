<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Invoice #{{ $details->invoice_id ?? 'N/A' }} — {{ config('app.name') }}</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* ========= THEME & COLORS ========= */
        :root{
            /* Default (pending) theme */
            --bg1: #f6f9ff;
            --bg2: #eef3ff;
            --ring: #7c3aed;
            --brand: #4f46e5;
            --brand-2: #06b6d4;
            --ink: #0f172a;

            --ok: #16a34a;
            --warn: #f59e0b;
            --bad: #dc2626;

            --chip-bg: #f1f5ff;
            --chip-br: #c7d2fe;
            --chip-ink:#1e293b;

            --card-br: #e5e7eb;
            --soft: #fafafa;

            --thead: linear-gradient(180deg,#f7faff, #eef2ff);
            --stripe: #fbfbff;

            --totals-bg: #ffffff;
            --totals-br: #dfe7ff;
            --totals-glow: 0 10px 30px rgba(99,102,241,.16);
            --stamp-color: var(--warn);
            --stamp-opacity:.16;

            --btn-grad: linear-gradient(90deg,#4f46e5, #06b6d4);
            --btn-grad-hover: linear-gradient(90deg,#4338ca, #0891b2);
        }
        /* Status-based palettes */
        .status-approved{
            --ring:#059669; --brand:#059669; --brand-2:#22c55e;
            --chip-bg:#ebfff4; --chip-br:#a7f3d0; --chip-ink:#064e3b;
            --thead:linear-gradient(180deg,#ebfff4,#d1fae5);
            --stripe:#f6fffb; --totals-br:#b7f7d9; --totals-glow:0 10px 30px rgba(16,185,129,.18);
            --stamp-color:#22c55e; --stamp-opacity:.18;
            --btn-grad:linear-gradient(90deg,#059669,#22c55e);
            --btn-grad-hover:linear-gradient(90deg,#047857,#16a34a);
        }
        .status-cancelled{
            --ring:#e11d48; --brand:#dc2626; --brand-2:#fb7185;
            --chip-bg:#fff1f2; --chip-br:#fecdd3; --chip-ink:#7f1d1d;
            --thead:linear-gradient(180deg,#fff1f2,#ffe4e6);
            --stripe:#fff7f8; --totals-br:#fecaca; --totals-glow:0 10px 30px rgba(239,68,68,.18);
            --stamp-color:#dc2626; --stamp-opacity:.20;
            --btn-grad:linear-gradient(90deg,#dc2626,#fb7185);
            --btn-grad-hover:linear-gradient(90deg,#b91c1c,#f43f5e);
        }

        /* ========= LAYOUT ========= */
        body {
            background:
                radial-gradient(1200px 600px at 0% -10%, var(--bg2) 0%, transparent 60%),
                radial-gradient(1200px 600px at 100% 110%, var(--bg1) 0%, transparent 60%),
                linear-gradient(180deg, #ffffff, #f8fafc);
            color: var(--ink);
        }
        .container-narrow { max-width: 980px; }

        .invoice-card {
            background:#fff;
            border-radius: 20px;
            border:1px solid var(--card-br);
            box-shadow:
                0 12px 40px rgba(20,20,60,.08),
                0 2px 0 rgba(99,102,241,.06);
            position: relative;
            overflow: hidden;
        }

        /* ========= WATERMARK ========= */
        .stamp{
            position: absolute; inset: 0;
            display:flex; align-items:center; justify-content:center;
            pointer-events:none; z-index:20;
        }
        .stamp span{
            font-weight: 900; text-transform: uppercase; letter-spacing: .25em;
            white-space: nowrap; user-select: none; transform: rotate(-18deg);
            font-size: clamp(40px, 12vw, 160px); line-height: 1;
            color: var(--stamp-color); opacity: var(--stamp-opacity);
            mix-blend-mode: multiply; text-shadow: 0 2px 6px rgba(0,0,0,.06);
        }
        @media print { .stamp span { opacity:.24; } }

        /* Layering */
        .brand-bar, .section { position: relative; z-index: 10; }

        /* ========= HEADER / BRAND ========= */
        .brand-bar {
            border-bottom:1px solid var(--card-br);
            padding: 22px 24px; display:flex; align-items:center; justify-content:space-between; gap:16px;
            background:
                radial-gradient(1100px 400px at -5% -30%, rgba(79,70,229,.14) 0%, transparent 60%),
                radial-gradient(900px 320px at 110% 130%, rgba(6,182,212,.12) 0%, transparent 60%);
        }
        .brand-title {
            font-weight:800; letter-spacing:.2px; margin:0; display:flex; align-items:center; gap:.6rem;
        }
        .brand-ring{
            width:34px; height:34px; border-radius:50%;
            background: conic-gradient(from 0deg, var(--brand), var(--brand-2), var(--brand));
            box-shadow: inset 0 0 0 4px #fff, 0 6px 18px rgba(79,70,229,.25);
        }

        .chip {
            display:inline-flex; gap:.5rem; align-items:center;
            background: var(--chip-bg);
            border:1px solid var(--chip-br);
            color: var(--chip-ink);
            padding:.4rem .75rem; border-radius:999px; font-size:.85rem; font-weight:600;
        }
        .chip .bi { opacity:.9; }

        /* ========= SECTIONS ========= */
        .section { padding: 22px 24px; }
        .section-title { font-size:.85rem; text-transform:uppercase; letter-spacing:.1em; color:#475467; margin-bottom:.5rem; }
        .card-soft {
            background: var(--soft); border:1px solid var(--card-br); border-radius:14px; padding:14px;
        }

        /* ========= TABLE ========= */
        .table thead th {
            background: var(--thead);
            border-bottom:1px solid var(--card-br);
            color:#111827; font-weight:700;
        }
        .table tbody tr { border-color:#eef2f7; }
        .table-striped>tbody>tr:nth-of-type(odd)>* { background-color: var(--stripe); }
        .table td, .table th { vertical-align: middle; }
        .table tbody tr:hover { background-color:#f8fbff; }
        .text-muted-2 { color:#667085!important; }

        /* Mobile stacked table */
        @media (max-width:576px){
            .table thead { display:none; }
            .table tbody tr { display:block; background:#fff; border:1px solid var(--card-br); border-radius:12px; margin-bottom:12px; }
            .table td { display:flex; justify-content:space-between; border:0!important; padding:.65rem .85rem; }
            .table td::before { content: attr(data-label); color:#667085; font-weight:600; margin-right:1rem; }
        }

        /* ========= TOTALS ========= */
        .totals {
            border:1px solid var(--totals-br); border-radius:14px; background:var(--totals-bg); padding:14px;
            box-shadow: var(--totals-glow);
            background-image: radial-gradient(80% 80% at 100% 0%, rgba(99,102,241,.08) 0%, transparent 60%);
        }
        .row-line { display:flex; justify-content:space-between; gap:12px; padding:.35rem 0; }
        .grand { font-size:1.15rem; font-weight:800; color: var(--brand); }

        /* ========= BUTTONS / PRINT ========= */
        .btn-gradient{
            background:var(--btn-grad); border:0; color:#fff;
            box-shadow: 0 8px 22px rgba(79,70,229,.25);
        }
        .btn-gradient:hover{ background:var(--btn-grad-hover); color:#fff; }

        @media print {
            .no-print { display:none!important; }
            body { background:#fff; }
            .invoice-card { box-shadow:none; border-color:#d0d5dd; }
            .brand-bar { background:#fff; }
        }

        /* ==== ONE-PAGE PRINT (A4) ==== */
        @page {
            size: A4 portrait;
            margin: 10mm;
        }

        @media print {
            /* Keep colors in print */
            body {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                background: #fff !important;
            }

            /* Fit everything on one page */
            :root{ --print-scale: 0.92; } /* tweak 0.85–0.98 if still overflows */

            .container-narrow { max-width: none !important; padding: 0 !important; }
            .no-print { display: none !important; }

            .invoice-card {
                box-shadow: none !important;
                border-color: #d0d5dd !important;
                /* Scale-to-fit while preserving layout */
                transform: scale(var(--print-scale));
                transform-origin: top left;
                /* Make the scaled width equal to printable width */
                width: calc(210mm / var(--print-scale) - 2mm);
                /* Avoid splitting the card across pages */
                break-inside: avoid;
                page-break-inside: avoid;
            }

            /* Compact paddings / fonts for print */
            .brand-bar, .section {
                padding: 10px 12px !important;
                background: #fff !important; /* flatten gradients for clean print */
            }
            .section-title { font-size: .78rem !important; }

            /* Table compaction + keep rows intact */
            .table { font-size: 12px !important; }
            .table thead th { padding: 6px 8px !important; }
            .table td, .table th { padding: 6px 8px !important; }
            table, thead, tbody, tr, td, th {
                page-break-inside: avoid !important;
                break-inside: avoid !important;
            }

            /* Totals box compaction */
            .totals { padding: 10px 12px !important; box-shadow: none !important; }
            .row-line { padding: .25rem 0 !important; }
            .grand { font-size: 1rem !important; }

            /* Watermark visibility in print */
            .stamp span { opacity: .20 !important; }

            /* Remove extra margins to reduce chance of overflow */
            .container, .container-fluid { padding: 0 !important; margin: 0 !important; }
        }

        /* Optional: if your content is still just a hair too tall,
           lower --print-scale (e.g., 0.90 or 0.88) above. */

    </style>
</head>
<body
    @php
        $status = strtolower($details->order_status ?? 'pending');
        $stampText = $status === 'approved' ? 'PAID' : ($status === 'cancelled' ? 'CANCELLED' : 'PENDING');
        $statusClass = $status === 'approved' ? 'status-approved'
                     : ($status === 'cancelled' ? 'status-cancelled' : '');
    @endphp
    class="{{ $statusClass }}"
>
<div class="container container-narrow py-4">
    <div class="d-flex justify-content-between align-items-center mb-3 no-print">
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Back
        </a>
        <button class="btn btn-gradient btn-sm" onclick="window.print()">
            <i class="bi bi-printer me-1"></i> Print
        </button>
    </div>

    <div class="invoice-card">
        <!-- Watermark Stamp -->
        <div class="stamp">
            <span>{{ $stampText }}</span>
        </div>

        <!-- Brand / Meta -->
        <div class="brand-bar">
            <div class="d-flex align-items-center gap-2">
                <div class="brand-ring"></div>
                <div class="brand-title h4 mb-0">{{ config('app.name') }}</div>
            </div>

            <div class="d-flex flex-wrap gap-2">
                <span class="chip"><i class="bi bi-hash"></i> Invoice: <strong class="ms-1">{{ $details->invoice_id ?? 'N/A' }}</strong></span>
                <span class="chip"><i class="bi bi-calendar-event"></i> {{ \Carbon\Carbon::parse($details->created_at ?? now())->format('d M, Y h:i A') }}</span>
                @if(!empty($details->delivary_date))
                    <span class="chip"><i class="bi bi-truck"></i> {{ \Carbon\Carbon::parse($details->delivary_date)->format('d M, Y') }}</span>
                @endif
                <span class="chip">
                    <i class="bi {{ $status === 'approved' ? 'bi-check-circle' : ($status === 'cancelled' ? 'bi-x-circle' : 'bi-hourglass-split') }}"></i>
                    {{ ucfirst($status) }}
                </span>
            </div>
        </div>

        <!-- Parties -->
        <div class="section">
            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <div class="section-title">Billed To</div>
                    <div class="card-soft">
                        <div class="fw-semibold">{{ $details->name ?? 'N/A' }}</div>
                        <div class="text-muted-2 small">{{ $details->email ?? '' }}</div>
                        <div class="text-muted-2 small">{{ $details->phone ?? '' }}</div>
                        @if(!empty($details->address))
                            <div class="text-muted-2 small">{{ $details->address }}</div>
                        @endif
                        @if(!empty($details->city) || !empty($details->zip))
                            <div class="text-muted-2 small">{{ $details->city ?? '' }} {{ $details->zip ? '- '.$details->zip : '' }}</div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="section-title">From</div>
                    <div class="card-soft">
                        <div class="fw-semibold">{{ config('app.name') }}</div>
                        <div class="text-muted-2 small">support@teamnature.example</div>
                        <div class="text-muted-2 small">Dhaka, Bangladesh</div>
                        <hr class="my-2">
                        <div class="row g-2">
                            @if(!empty($details->payment_method))
                                <div class="col-6">
                                    <div class="text-muted-2 small">Payment</div>
                                    <div class="fw-semibold small">{{ strtoupper($details->payment_method) }}</div>
                                </div>
                            @endif
                            @if(!empty($details->transaction_id))
                                <div class="col-6">
                                    <div class="text-muted-2 small">Txn</div>
                                    <div class="fw-semibold small">{{ $details->transaction_id }}</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Items -->
        <div class="section pt-0">
            <div class="table-responsive">
                <table class="table table-striped align-middle mb-0">
                    <thead>
                    <tr>
                        <th class="text-nowrap">#</th>
                        <th>Product</th>
                        <th class="text-end text-nowrap">Qty</th>
                        <th class="text-end text-nowrap">Unit</th>
                        <th class="text-end text-nowrap">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $grand = 0; @endphp
                    @forelse($product as $i => $row)
                        @php
                            $qty  = (int)($row->quantity ?? 1);
                            $unit = $row->products_price;
                            $line = $qty * $unit;

                            $grand += $line;
                        @endphp
                        <tr>
                            <td data-label="#"> {{ $i + 1 }} </td>
                            <td data-label="Product">
                                <div class="fw-semibold">{{ $row->product_name ?? 'Product' }}</div>
                                @if(!empty($row->product_id))
                                    <div class="text-muted-2 small">ID: {{ $row->product_id }}</div>
                                @endif
                            </td>
                            <td class="text-end" data-label="Qty">{{ $qty }}</td>
                            <td class="text-end" data-label="Unit">{{ number_format($unit, 2) }}</td>
                            <td class="text-end" data-label="Total">{{ number_format($line, 2) }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">No products found.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Totals -->
{{--        @php--}}
{{--            $discount = (float)($details->discount ?? 0);--}}
{{--            $shipping = (float)($details->shipping ?? 0);--}}
{{--            $tax      = (float)($details->tax ?? 0);--}}
{{--            $subtotal = max($grand - $discount, 0);--}}
{{--            $total    = $subtotal + $shipping + $tax;--}}
{{--        @endphp--}}
        <div class="section">
            <div class="row justify-content-end">

                @php

                    $subtotal = (float)$grand;


                    if (!empty($details->city) && strtolower(trim($details->city)) === 'dhaka') {
                        $delivery = (float)($shipping->price ?? 0);
                    } else {
                        $delivery = (float)($shippingOutside->price ?? 0);
                    }


                    $total = $subtotal + $delivery;
                @endphp

                <div class="section">
                    <div class="row justify-content-end">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="totals">
                                <div class="row-line">
                                    <span class="text-muted-2">Subtotal</span>
                                    <span class="fw-semibold">{{ number_format($subtotal, 2) }}</span>
                                </div>

                                <div class="row-line">
                                    <span class="text-muted-2">Delivery Charges</span>
                                    <span class="fw-semibold">{{ number_format($delivery, 2) }}</span>
                                </div>

                                <hr class="my-2">

                                <div class="row-line grand">
                                    <span>Total Amount</span>
                                    <span>{{ number_format($total, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="section text-center text-muted-2">
            Thank you for choosing <strong>{{ config('app.name') }}</strong>.
        </div>
    </div>
</div>
</body>
</html>
