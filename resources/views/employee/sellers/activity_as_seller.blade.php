@extends('employee.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row">
            @if($data[0])
            <h3>{{$data[0]->SellerData?$data[0]->SellerData->name : ""}} -> Inquiry List (As a seller)</h3>
            @endif

            <form action="" method="get" id="">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-auto col-12">
                            <input type="text" name="keyword" placeholder="Search..." value="{{request()->input('keyword')??""}}" class="w-100"/>
                        </div>
                        <div class="col-lg-auto col-12 text-end">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-magnifying-glass"></i>Search</button>
                            <a href="{{route('show.user.seller.activity',$id)}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-xmark"></i></a>
                        </div>
                    </div>
                </div>
            </form>
            <div class="d-flex">      
            <a href="{{route('employee.sellers.index')}}" class="btn btn-danger btn-sm">
                <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                Back 
            </a>        
            </div>
        </div>
           
<table class="table">
    <thead>
        <tr class="align-middle">
            <th>SL.</th>
            <th width="10%">Inquiry Id</th>
            <th>Location</th>
            <th>Title</th>
            <th>Inquiry Type</th>
            <th>Amount</th>
            <th>Alloted</th>
            <th>Quote</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody class="align-middle">
        @forelse ($data as $key =>$item)
        <tr>
            <td> {{ $key+1 }}</td>
            <td> {{ $item->InquriesData?$item->InquriesData->inquiry_id:"" }}</td>     
            <td>{{ $item->InquriesData?$item->InquriesData->location:"" }}</td>      
            <td> {{ $item->InquriesData?$item->InquriesData->title:"" }}</td>      
            <td> {{ $item->InquriesData?$item->InquriesData->inquiry_type:"" }}</td>
            <td>{{ $item->InquriesData ? number_format($item->InquriesData->inquiry_amount, 2, '.', ',') : '' }}</td>      
            <td>
                @if($item->status == 4)
                <div  class="alert alert-success p-1 text-center" role="alert">Alloted</div>
                @else
                <div class="alert alert-danger p-1 text-center" role="alert">Not-Allot</div>
                @endif
            </td>  
            <td> 
                @php
                    $get_all_quotes =get_my_all_quotes_by_user($item->inquiry_id, $item->user_id);
                        $quotesString = '';
                        foreach ($get_all_quotes as $key => $value) {
                            // Concatenate quotes with '--' separator
                            $quotesString .= $value->quotes . ' -> ';
                        }
                    // Remove the last ' -- ' from the concatenated string
                    $quotesString = rtrim($quotesString, ' -> '); 
                @endphp
                <button type="button" class="btn btn-outline-primary" onclick="GetQuotes('{{$quotesString}}')">
                Quotes    
                <!-- pending -->
                </button>
            </td>     
            <td>{{ date('d-M-Y',strtotime($item->created_at)) }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="100%" class="text-center">No Inquiry records found</td>
        </tr>
        @endforelse

    </tbody>
{{-- </table> --}}
{{-- {{$data->appends($_GET)->links()}} --}}
</div>
</div>
@endsection
@push('scripts')
<script>
    function GetQuotes(id){
        if(id){
            Swal.fire({
                text: id,
            })
        }else{
            Swal.fire({
                text: "No quotes found!",
            })
        }
    }
   
    $('.itemremove').on("click", function() {
        var id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "banner/delete/" + id;
            } else {
                Swal.fire("Cancelled", "Record is safe", "error");
            }
        });
    });
</script>
@endpush