<!DOCTYPE html>
<html lang="en">

<head>

    <title>Invoice Pdf</title>
    <link rel="stylesheet" href="{{asset('public/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
</head>


<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table width="100%">
                    <tbody>
                        <tr>
                              <td><strong>Invoice No: #{{$invoice->invoice_no}}</strong></td>
                        </tr>
                        <td>
                            <span style="font-size:20px; background:blue;">
                                Sapla Shopping Moll
                                </span><br>
                                Kalishpur,Khulna
                            
                        </td>
                        <td><span>Showroom No:01740024889
                            <br>
                            owner No:00000000000
                        </span></td>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <hr style="margin-bottom: 0px;">
              <table>
                  <tbody>
                      <tr>
                          <td width="45%"></td>
                          <td><u><strong>Customer Invoice</strong></u></td>
                          
                          <td width="30%"></td>
                      </tr>
                  </tbody>
              </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @php
                $payment = App\Models\Model\Payment::where
                ('invoice_id',$invoice->id)->first();
                @endphp
                <table width="100%">
                    <tbody>
                        <tr>
                           
                            <td width="30%">
                               <strong>Name:</strong>{{$payment['customer'] ['name']}}
                            </td>
                            <td width="30%">
                               <strong>Mobile No:</strong>{{$payment['customer'] ['mobile_no']}}
                            </td>
                            <td width="40%">
                                <p><strong>Address:</strong>{{$payment['customer'] ['address']}}
                            </td>
                        </tr>
                    
                    </tbody>
                </table>

            </div>


        </div>

        <div class="row">
            <div class="col-md-12">
            <table border="1" width="100%" style="margin-bottom: 10px;">
                            <thead>
                                <tr class='text-center' >
                                    <th>SL.</th>
                                    <th>Category</th>
                                    <th>product Name</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                 $total_sum = '0';
                                @endphp
                                @foreach($invoice['invoice_details'] as $key => $details)
                                <tr class='text-center'>
                                    <td>{{$key+1}}</td>
                                    <td>{{$details ['category']['name']}}</td>
                                    <td>{{$details ['product']['name']}}</td>
                                    <td>{{$details->selling_qty}}</td>
                                    <td> {{$details->unit_price}}</td>
                                    <td>{{$details->selling_price}}</td>
                                </tr>
                                @php
                                 $total_sum += $details->selling_price;
                                @endphp
                                @endforeach
                                <tr>
                                    <td colspan="5" class="text-right"><strong>Sub Total</strong></td>
                                    <td class='text-center'><strong>{{ $total_sum}}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">Discount</td>
                                    <td class='text-center'><strong>{{ $payment->discount_amount}}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">Paid Amount</td>
                                    <td class='text-center'><strong>{{ $payment->paid_amount}}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">Due Amount</td>
                                    <td class='text-center'><strong>{{ $payment->due_amount}}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right"> Grand Total</td>
                                    <td class='text-center'><strong>{{ $payment->total_amount}}</strong></td>
                                </tr>
                            </tbody>
                               
                        </table>
                        @php
                           $date = new dateTime('now', new DateTimezone('Asia/Dhaka'))
                        @endphp
                        <i>Printing time : {{$date->format('F,j,Y, g:i a')}}</i>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <hr style="margin-bottom: 0px">
                <table border="0" width="100%">
                    <tbody>
                        <tr>
                            <td style="width:40%;">
                            <p style="text-align: center; margin-Left:: 20px;">
                             Customer Signature</p>

                            </td>
                            <td style:"width:20%"></td>
                            <td style="width:40%; text-align: center;">
                            <p style="text-align: center;">
                             Seller Signature</p>

                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</body>

</html>