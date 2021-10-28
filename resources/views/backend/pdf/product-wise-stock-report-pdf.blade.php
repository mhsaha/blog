<!DOCTYPE html>
<html lang="en">

<head>

    <title> Product wise Stock Report PDF</title>
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
                          <td width="70%"></td>
                          <td><u><strong><span style="font-size:15px">
                          Supplier wise Stock Report 
                
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
           <table border="1" width="100%">
              <thead>
                <tr>
                  <th>Supplier Name</th>
                  <th>category</th>
                  <th> Product Name</th>
                  <th>In.Qty</th>
                  <th>Out.Qty</th>
                  <th>Stock</th>
                  <th>Unit</th>
                  
                </tr>
              </thead>
              <tbody>

              @php
                $buying_total = App\Models\Model\Purchase::where('category_id', $product->category_id)->
                where('product_id',$product->id)->where('status','1')->sum('buying_qty');
                $selling_total = App\Models\Model\InvoiceDetail::where('category_id', $product->category_id)->
                where('product_id',$product->id)->where('status','1')->sum('selling_qty');
                @endphp
                <tr>
                   <td>{{$product['supplier']['name']}}</td>
                  <td>{{$product['category']['name']}}</td>
                  <td>{{$product->name}}</td>
                  <td>{{$buying_total}}</td>
                  <td>{{$selling_total}}</td>
                  <td>{{$product->quantity}}</td>
                  <td>{{$product['unit']['name']}}</td>
                  
                  
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
                            <td style="width:50%;">
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