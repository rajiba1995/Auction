<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LBG Pvt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <section class="lbg_sec" style="padding: 30px 0px;">
        <div class="container-fluid">
            <h1 style=" font-size: 30px;text-align: center;margin-bottom: 20px;">{{$buyer_details['business_name']}}</h1>
            <h3 style=" font-size: 20px;text-align: center;margin-bottom: 20px;">{{$buyer_details['name']}}-{{$buyer_details['mobile']}}</h3>
            <div class="allotment_menu" style=" margin-bottom: 30px;">
                <h4 style="font-size: 20px;font-weight: 500;margin-bottom: 15px;">  {{ date('d-M-y h:i A') }}</h4>
                <div class="table-responsive">
                    <table class="table allotment_table">
                        <thead>
                            <tr class="allotment_th_tr" style="border: 1px solid #000;border-left: none;border-right: none;">
                                <th>ID</th>
                                <th>Date</th> 
                                <th>Title</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Extension Date</th>
                                <th>Max rate</th>
                                <th>Min rate</th>
                                <th>Allotment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style=" border: none;font-weight: 500;">{{$inquiry->inquiry_id}}</td>
                                <td style=" border: none;font-weight: 500;"> {{ date('d-M-Y', strtotime($inquiry->created_at)) }}<span style="display: block;">{{ date('h:i A', strtotime($inquiry->created_at)) }}</span></td>
                                <td style=" border: none;font-weight: 500;">{{$inquiry->title}}</td>
                                <td style=" border: none;font-weight: 500;max-width: 250px;">{{$inquiry->category}}</td>
                                <td style=" border: none;font-weight: 500;max-width: 250px;">{{$inquiry->sub_category}}</td>
                                <td style=" border: none;font-weight: 500;"> {{ date('d-M-Y', strtotime($inquiry->execution_date)) }}</td>
                                <td style=" border: none;font-weight: 500;">{{$max_rate}}</td>
                                <td style=" border: none;font-weight: 500;">{{$min_rate}}</td>
                                <!-- <td style=" border: none;font-weight: 500;">{{$inquiry->inquiry_amount}}</td> -->
                                 @if($inquiry->status == 4){
                                     <td style="font-size: 12px; border: none;font-weight: 500;">Inquiry Cancelled <span style="display: block;"> | {{$inquiry->cancelled_reason}}</span></td>
                                 @else
                                     <td style="font-size: 12px; border: none;font-weight: 500;">{{$inquiry->inquiry_amount}} <span style="display: block;">{{$final_seller_details['name']}}</span><span style="display: block;">| {{$final_seller_details['mobile']}}</span></td>
                                 @endif

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="description">
                <h4 style="font-size: 20px;font-weight: 500;margin-bottom: 15px;">Description: <span class="description_info" style="font-size: 12px;margin-left: 5px;">{{$inquiry->description}}</span></h4>
            </div>
            <div class="quotes_received" style="margin-bottom: 30px;">
                <h4 style="font-size: 20px;font-weight: 500;margin-bottom: 15px;">Quotes Received (PMT)</h4>
                <div class="table-responsive">
                    <table class="table quotes_received_table">
                        <thead>
                            <tr>
                                <th style="border: 1px solid #000;text-align: center;">Carrier Name</th>
                                <th style="border: 1px solid #000;text-align: center;">Contact Person</th>
                                <th style="border: 1px solid #000;text-align: center;">Rank</th>
                                <th style="border: 1px solid #000;text-align: center;">Bid 1</th>
                                <th style="border: 1px solid #000;text-align: center;">Last Quote</th>
                                <th style="border: 1px solid #000;text-align: center;">Final Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                          
                        @foreach($seller_data as $seller_id => $data)
                            <tr>
                                <td style="text-align: center;border: 1px solid #000;font-weight: 500;">{{$data['seller_details']['business_name']}}</td>
                                <td style="text-align: center;border: 1px solid #000;font-weight: 500;">{{$data['seller_details']['name']}} | {{$data['seller_details']['mobile']}}</td>
                                <td style="text-align: center;border: 1px solid #000;font-weight: 500;">
                                @if ($loop->first)
                                    L1
                                @elseif ($loop->last)
                                    L2
                                @else
                                    L{{ $loop->iteration }}
                                @endif
                                </td>
                                <td style="text-align: center;border: 1px solid #000;font-weight: 500;">Rs.{{$data['first_quote']}} </td>
                                <td style="text-align: center;border: 1px solid #000;font-weight: 500;">Rs.{{$data['latest_quote']}}</td>
                                <td style="text-align: center;border: 1px solid #000;font-weight: 500;">Rs.{{$data['latest_quote']}}</td>
                             
                            </tr>
                       @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>