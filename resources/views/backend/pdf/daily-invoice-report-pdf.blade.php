<!DOCTYPE html>
<html lang="en">

<head>

    <title> Daily Invoice Report Pdf</title>
    <link rel="stylesheet" href="{{asset('public/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
</head>


<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table width="100%">
                    <tbody>
                        <tr>
                              <td></td>
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
                          <td><u><strong><span>
                          Daily Invoice Report 
                          ({{date('d-m-Y',strtotime($start_date))}} - {{date('d-m-Y',strtotime($end_date))}})
                          </span>
                             </strong></u></td>
                          
                          <td width="30%"></td>
                      </tr>
                  </tbody>
              </table>
            </div>
        </div>
       <div class="row">
           <div class="col-md-12">
           <table border="1" width:"100%">
              <thead>
                <tr>
                  <th>Sl.</th>
                  <th> Customer Name</th>
                  <th> Invoice No</th>
                  <th>Date</th>
                  <th>Description</th>
                  <th style="width: 12%">Amount</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $total_sum ="0";
                @endphp
                @foreach($allData as $key =>$invoice)
                 <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$invoice['payment']['customer']['name']}}
                    ({{$invoice['payment']['customer']
                       ['mobile_no']}}-{{$invoice['payment']['customer']['address']}})
                  </td>
                  <td>Invoice No #{{$invoice->invoice_no}}</td>
                  <td>{{date('d-m-Y',strtotime($invoice->date))}}</td>
                  <td>{{$invoice->description}}</td>
                  <td>{{$invoice ['payment'] ['total_amount']}}</td>
                  @php
                  $total_sum += $invoice['payment'] ['total_amount'];
                  @endphp
                </tr>
              @endforeach
              <tr>
                  <td colspan="5" style="text-right ;"> Grand Total</td>
                  <td>{{$total_sum}}</td>
              </tr>
              </tbody>
            </table>

           </div>
       </div>

        <div class="row">
            <div class="col-md-12">
                <hr style="margin-bottom: 0px">
                <table border="0" width="100%">
                    <tbody>
                        <tr>
                            <td style="width:40%;">
                            </td>
                            <td style="width:20%"></td>
                            <td style="width:40%; text-align: center;">
                            <p style="text-align: center; border-bottom: 1px solid #000;">
                             Owner Signature</p>

                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</body>

</html>