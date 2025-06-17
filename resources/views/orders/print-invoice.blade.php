
<!DOCTYPE html>

<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title> Invoice</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- bootstrap & fontawesome -->
<!--        <link rel="stylesheet" href="{{URL::to('/')}}/assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="{{URL::to('/')}}/assets/font-awesome/4.5.0/css/font-awesome.min.css" />-->
<style type="text/css">
    body{
        font-family:Verdana;
        font-size:13px;
    }
    @media print{
        #buttons{
            display:none;
        }
    }
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td {
  /*border: 1px solid #dddddd;*/
  /*text-align: left;*/
  padding: 3px;
  font-size: 8px;
}
 th {
  /*border: 1px solid #dddddd;*/
  /*text-align: left;*/
  padding: 3px;
  font-size: 10px;
}

tr:nth-child(even) {
  /*background-color: #dddddd;*/
}
.branding-logos li{
list-style:none;
float:left;
}
.branding-logos li img{
width:90px;
}


</style>
    </head>
    <body>
        <div style="width:16cm; padding:0.5cm;margin:0.5cm;border:solid 1px #304346">
            <table border="0" width="80%">
                <tr>
              
                <td  ><h3 style="margin:0" >TACKLE TIPS</h3></td>
              </tr>

                   <tr>
                <td style="line-height: 15px">1ST FLOOR, 11/893-J<br>MALAPPURAM<br>mob:7012901159<br>GSTIN : 32AARFT7217R1ZD</td>
              </tr>

            <tr>
                <td colspan="3" align="center"><strong>TAX INVOICE</strong></td>
            </tr>
            <tr>
                  <td colspan="3">
              <table border="1" width="100%">

                <tr>
                  <td width="50%" >Reverse Charge:<br>Invoice No : {{ $order->order_number }}<br>{{ \Carbon\Carbon::parse($order->date)->format('d-m-Y') }}</td>
                  
                    
                 <td width="50%" >Transportation Mode :<br>Vehicle Number:<br>Place of Supply:</td>                
                </tr>
           
              </table>
              </td> 
            </tr>
              <tr>
                  <table border="1">
                      <tr>
                <td ><strong>Details of Receiver | Billed to:</strong></td>
                <td ><strong>Details of Consignee | Shipped to:</strong></td>
                </tr>
                <tr>
               
                    <td>Name :{{ $order->payment_name }}</td>
               
                
                    <td>Name :{{ $order->shipping_name }}</td>
              
                </tr>
                <tr border="0">
                    <td>Address : {{ $order->payment_address }}<br><br>
                      Contact  {{ $order->customer_mob }}</td>
               
                    <td>Address : {{ $order->shipping_address ?? 'N/A' }}<br><br>
                   
                      Contact :{{ $order->customer_mob ?? 'N/A' }}</td>
                </tr>
                 </table>
                
            </tr>
  <br>
           
            <tr class="itemtable" style="width:50%;" >
                <td colspan="3">
                    <table border="1"  cellspacing="0" cellpadding="5">
                        <tr>
                            <th rowspan="2">Sl No.</th>
                            <th rowspan="2">Item Name</th>
                            <th rowspan="2">HSNC/SAC</th>
                            <th rowspan="2">Qty</th>
                            <th rowspan="2">MRP</th>
                            <th rowspan="2">Price</th>
                            <th rowspan="2" style="display:none;">Amount</th>
                            <!-- <th rowspan="2">less Dis</th> -->
                            <th  rowspan="2">Taxable Value</th>
                            <th colspan="2">CGST</th>
                            <th colspan="2">SGST</th>
                            <th rowspan="2">Total</th>
                        </tr>
                           <tr>
                            <th>
                            Rate
                          <td>Amount</td>
                            </th>
                                <th>
                            Rate
                          <td>Amount</td>
                            </th>
                            </tr>
                         <?php $amount=0;?>
                         <?php $taxable=0;?>
                         <?php $tax=0;?>
                         <?php $total=0;?>
                       <tr>
                           
                            @foreach($order->detail as $key=>$detail)
                            <td>{{$key+1}}</td>
                            <td>{{$detail->name}} {{$detail->sub_name}}</td>
                            <td>{{ $detail->product->hsncode ?? 'N/A' }}</td>
                            <td>{{$detail->quantity}}</td>
                            <td>{{$detail->price}}</td>
                             <td>{{$detail->rate}}</td>
                            <td style="display:none;">{{$detail->quantity*$detail->rate}} </td>
                             <!-- <td>{{$detail->prodiscount}}</td> -->
                            <td>{{$detail->taxable}}<?php $taxable+=$detail->taxable; ?></td>
                              
                         
                            <td>{{$detail->percentage/2}}</td>
                        <td>{{$detail->tax_amt/2}}<?php $tax+=$detail->tax_amt; ?></td>
                        <td>{{$detail->percentage/2}}</td>
                        <td>{{$detail->tax_amt/2}}</td>
                         <td>{{$detail->total_amount}}<?php $total+=$detail->total_amount; ?></td>   
                        </tr>
                        @endforeach
                        @for($i=17; $i>=count($order->detail); $i--)
                        <tr>
                            <td height="9"></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                 <td></td>
                                  <td></td>
                                  <td></td>
                                 <td></td>
                                    <td></td>
                              <td></td> 
                        </tr>
                        @endfor
                       
                        <tr>
                            <td colspan="6" align="right">Total Amount:</td><td></td>
                            <td><?php echo number_format($taxable,2,'.',','); ?></td>
                            <td></td>
                            <td><?php echo number_format($tax/2,2,'.',','); ?></td>
                            <td></td>
                             <td><?php echo number_format($tax/2,2,'.',','); ?></td>
                            <td><?php echo number_format($total,2,'.',','); ?></td>
                        </tr>
                      <tr>
                  <table border="1">
                      <tr>
                <td ><strong>Bank Details :</strong></td>
               <td align="right">Total Amount Before Tax : <?php echo number_format($taxable,2,'.',','); ?></td>
                </tr>
                <tr>
               
                    <td>Bank Name :SBI TANUR</td>
              
          
                    <td align="right">Less : Discount :{{$order->discount}}</td>
              
                </tr>
                <tr border="0">
                      
                    <td>Bank Account Number:40644245044</td>
             
                
                   <td align="right">Add : CGST <?php echo number_format($tax/2,2,'.',','); ?></td></td>
               
                </tr>
                <tr border="0">
                      
                    <td>Bank Branch IFSC:IFSC SBIN0070211</td>
             
                
                   <td align="right">Add : SGST <?php echo number_format($tax/2,2,'.',','); ?></td></td>
               
                </tr>
                <tr>
                    <td></td>
                    <td align="right">Add :shipping Charge {{ number_format($order->shipping_charge, 2) }}  </td>
                </tr>
                <tr>
                     <td  align="right"><strong>Total Amount After Tax:</strong></td>
                    <td   align="right"><strong>{{$order->total_amnt}}</strong></td>
                    
                
                </tr>
                 </table>
                
         <br>
                        
 <tr>

           <td colspan="3">
              <table border="1" width="100%">

                <tr>
                  <td width="50%" ><strong> Terms and Conditions :</strong><br><br><br><br><br></td>
                  
                    
                 <td width="50%" >Certified that the particlars given above are true and correct<br><br>For TACKLE TIPS<br><br><br>Authorised Signatory</td>                
                </tr>
           
              </table>
              </td>           
              
            </tr>
           
          
            <tr>
        
                
                <td align="right"><strong>Seal</strong><strong> [ E & OE ]</strong><br></td>
         
            
            
        </table>
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

@section('script')
<script>
  $(document).on('.load',function(){
    // convertNumberToWords(200);
  alert("pageload event fired!");
});

  function convertNumberToWords(amount) {
    var words = new Array();
    words[0] = '';
    words[1] = 'One';
    words[2] = 'Two';
    words[3] = 'Three';
    words[4] = 'Four';
    words[5] = 'Five';
    words[6] = 'Six';
    words[7] = 'Seven';
    words[8] = 'Eight';
    words[9] = 'Nine';
    words[10] = 'Ten';
    words[11] = 'Eleven';
    words[12] = 'Twelve';
    words[13] = 'Thirteen';
    words[14] = 'Fourteen';
    words[15] = 'Fifteen';
    words[16] = 'Sixteen';
    words[17] = 'Seventeen';
    words[18] = 'Eighteen';
    words[19] = 'Nineteen';
    words[20] = 'Twenty';
    words[30] = 'Thirty';
    words[40] = 'Forty';
    words[50] = 'Fifty';
    words[60] = 'Sixty';
    words[70] = 'Seventy';
    words[80] = 'Eighty';
    words[90] = 'Ninety';
    amount = amount.toString();
    var atemp = amount.split(".");
    var number = atemp[0].split(",").join("");
    var n_length = number.length;
    var words_string = "";
    if (n_length <= 9) {
        var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        var received_n_array = new Array();
        for (var i = 0; i < n_length; i++) {
            received_n_array[i] = number.substr(i, 1);
        }
        for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
            n_array[i] = received_n_array[j];
        }
        for (var i = 0, j = 1; i < 9; i++, j++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                if (n_array[i] == 1) {
                    n_array[j] = 10 + parseInt(n_array[j]);
                    n_array[i] = 0;
                }
            }
        }
        value = "";
        for (var i = 0; i < 9; i++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                value = n_array[i] * 10;
            } else {
                value = n_array[i];
            }
            if (value != 0) {
                words_string += words[value] + " ";
            }
            if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Crores ";
            }
            if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Lakhs ";
            }
            if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Thousand ";
            }
            if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                words_string += "Hundred and ";
            } else if (i == 6 && value != 0) {
                words_string += "Hundred ";
            }
        }
        words_string = words_string.split("  ").join(" ");
    }
    alert(words_string);
    return words_string;
}
   </script>
@stop



