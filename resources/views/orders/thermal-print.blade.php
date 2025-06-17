<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thermal Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            width: 80mm;
            margin: 0 auto;
            padding: 5px;
            background: #fff;
        }
        .receipt {
            text-align: center;
        }
        .header h2, .header p {
            margin: 2px 0;
            font-size: 12px;
        }
        .invoice-details, .bill-to, .items, .summary {
            width: 100%;
            font-size: 12px;
            margin-top: 5px;
        }
        .items th, .items td {
            border-bottom: 1px dashed #000;
            padding: 3px;
            text-align: left;
        }
        .total {
            text-align: right;
            font-weight: bold;
        }
        .footer {
            font-size: 10px;
            text-align: center;
            margin-top: 10px;
        }
        @media print {
            .print-button {
                display: none;
            }
        }
        .print-button {
            display: block;
            margin: 10px auto;
            padding: 5px 10px;
            font-size: 14px;
            background: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <div class="header">
        <h1>TACKLE TIPS</h1>
            <p>1ST FLOOR, 11/893-J</p>
            <p>MALAPPURAM</p>
           
            <p>G.S.T. : 32AARFT7217R1ZD</p>
            <p>Mob: 7012901159</p>
        </div>

        <div class="invoice-details">
            <p><strong>Invoice:</strong> {{ $order->order_number }}</p>
            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($order->date)->format('d-m-Y') }}</p>
        </div>

        <div class="bill-to">
            <p><strong>Bill to:</strong> {{ $order->payment_name }}</p>
            <p><strong>Phone:</strong> {{ $order->customer_mob }}</p>
        </div>

        <table class="items">
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Qty</th>
                    <th>Amt</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->detail as $detail)
                <tr>
                    <td>{{ $detail->product->name ?? 'N/A' }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ number_format($detail->price * $detail->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="summary">
            <p class="total">Shipping: {{ number_format($order->shipping_charge, 2) }}</p>
            <p class="total">Grand Total: {{ $currency }}{{ number_format($order->total_amnt, 2) }}</p>
        </div>

        <div class="footer">
            <p>Thank you for shopping!</p>
            <p>For inquiries: info@msnaturalproducts.com</p>
        </div>
    </div>
    <button onclick="window.print()" class="print-button">Print</button>
</body>
</html> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt Print Format</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f8f9fa;
        }
        .receipt {
            max-width: 400px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .receipt-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .receipt-header h1 {
            font-size: 20px;
            margin: 0;
        }
        .receipt-header p {
            margin: 2px 0;
            font-size: 12px;
        }
        .receipt-body {
            margin-bottom: 20px;
        }
        .receipt-body table {
            width: 100%;
            border-collapse: collapse;
        }
        .receipt-body th, .receipt-body td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            font-size: 12px;
        }
        .receipt-body th {
            background: #f0f0f0;
        }
        .receipt-footer {
            font-size: 12px;
            text-align: right;
        }
        .receipt-summary {
            margin-top: 20px;
        }
        .receipt-summary table {
            width: 100%;
        }
        .receipt-summary th, .receipt-summary td {
            text-align: right;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <div class="receipt-header">
            <h1>TACKLE TIPS</h1>
            <p>1ST FLOOR, 11/893-J</p>
            <p>MALAPPURAM</p>
            <!--<p>KOTTAKKAL - 676501</p>-->
            <p>G.S.T. : 32AARFT7217R1ZD</p>
            <p>Mob: 7012901159</p>
        </div>
        <div class="receipt-body">
            <p><strong>Bill #: {{ $order->order_number }}</strong> | <strong>Date: {{ \Carbon\Carbon::parse($order->date)->format('d-m-Y') }}</strong></p>
            <table>
                <thead>
                    <tr>
                        <th>Description</th>
                        <!--<th>HSN</th>-->
                        <th>Qty</th>
                        <th>Rate</th>
                        <th>Tax %</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                       <?php $taxable=0;?>
                        <?php $tax=0;?>
                        @foreach($order->detail as $detail)
    <tr>
    <tr>
                        <td>{{$detail->name}} {{$detail->sub_name}}</td>
                        <!--<td>{{$detail->hsncode}}</td>-->
                        <td>{{$detail->quantity}}</td>
                        <td>{{$detail->rate}}</td>
                        <td>{{$detail->percentage}}</td>
                        <td>{{$detail->total_amount}}<?php $taxable+=$detail->taxable; ?><?php $tax+=$detail->tax_amt; ?></td>
                    
    </tr>
@endforeach
                   
                   
                </tbody>
            </table>
        </div>
        <div class="receipt-summary">
            <table>
                <tr>
                    <th>Total Amount Before Tax:</th>
                    <td><?php echo number_format($taxable,2,'.',','); ?></td>
                    <td   align="right"><strong>{{$order->total}}</strong></td>

                </tr>
               
               
                <tr>
                    <th>Add : CGST:</th>
                    <td><?php echo number_format($tax/2,2,'.',','); ?></td>
                </tr>
                 <tr>
                    <th>Add : SGST:</th>
                    <td><?php echo number_format($tax/2,2,'.',','); ?></td>
                </tr>
                 <tr>
                    <th>Add : shipping charge:</th>
                    <td>{{$order->shipping_charge}}</td>
                </tr>
                
                <tr>
                    <th>Total Amount After Tax:</th>
                    <td>{{$order->total_amnt}}</td>
                </tr>
            </table>
        </div>
        <div class="receipt-footer">
            <p>Bank Name :SBI TANUR</p>
            <p>Bank Account Number:40644245044</p>
            <p>Bank Branch IFSC:IFSC SBIN0070211</p>
            <p>Thank You! Shop Online www.tackletips.in</p>
        </div>
    </div>
            <div style="padding-left:18px" id="buttons">
            <button onclick="window.print(); return false">Print</button>

            @if(Request::get('destination'))
            <button onclick="window.location='{{URL::to(Input::get('destination'))}}'; return false">Close</button>
            @else
            <button onclick="window.close(); return false">Close</button>
            @endif
        </div>
</body>
</html>

