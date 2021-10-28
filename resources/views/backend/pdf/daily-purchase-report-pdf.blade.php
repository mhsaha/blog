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
        
           <table width="100%" border="1">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th> Purchase No</th>
                  <th> Date</th>
                  <th>Product Name</th>
                  <th>Description</th>
                  <th> Quantity</th>
                  <th>Unit Price</th>
                  <th>Buying Price</th>
                </tr>
              </thead>
              <tbody>

                @php
                $total_sum = '0';
                @endphp
                @foreach($allData as $key => $purchase)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$purchase->purchase_no}}</td>
                  <td>{{date('d-m-y',strtotime($purchase->date))}}</td>
                  <td>{{$purchase['product']['name']}}</td>
                  <td>{{$purchase->buying_qty}}
                      {{$purchase ['product'] ['unit'] ['name']}}
                  <td>
                 
                  <td>{{$purchase->unit_price}}</td>
                  <td>{{$purchase->buying_price}}</td>
                </tr>
                @php
                $total_sum += $purchase->buying_price;
                @endphp
                @endforeach
                <tr>
                    <td colspan="7" style="text-align: right;"> <strong>Grand Total</strong></td>
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