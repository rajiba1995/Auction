{{-- {{$data}} --}}

@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
@php
    $package_type = isset($_GET['package']) ? $_GET['package'] : "buyer";
@endphp
<div class="inner-content">
    <div class="page-tabs-row">
        <ul class="nav nav-tabs watchlist-tabs" id="productsServicesTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link {{$package_type=='buyer'?"active":""}}" id="buyers-tab" data-bs-toggle="tab" data-bs-target="#buyers" type="button" role="tab" aria-controls="buyers" aria-selected="true">Buyer</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link {{$package_type=='seller'?"active":""}}" id="sellers-tab" data-bs-toggle="tab" data-bs-target="#sellers" type="button" role="tab" aria-controls="sellers" aria-selected="false">Seller</button>
            </li>
        </ul>
    </div>
    <div class="tab-content report-table-box">
         <div class="tab-pane fade {{$package_type=='buyer'?"show active":""}}" id="buyers" role="tabpanel" aria-labelledby="buyers-tab" tabindex="0">
            <div class="heading-row">
                <h3>User Buyer Wallet  History</h3>
                <div class="d-flex">         
                    <a href="{{route('admin.user.index')}}" class="btn btn-primary btn-sm">
                        <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                        Back 
                    </a>       
                </div>
            </div>
        <div class="row">
            <div class="col-lg-8">
                        <table class="table">
                            <thead>
                                <tr class="align-middle">
                                <th>SL.</th>        
                                <th>Credit Unit</th>
                                <th>Debit Unit</th>                                               
                                <th>Current Unit</th>
                                <th>Date</th>
                                </tr>
                            </thead>
                            <tbody class="align-middle">
                            @forelse ($buyer_wallet_transactions as $key =>$item)
                                <tr>
                                    <td> {{ $key+1 }}</td>
                                    <td>{{ number_format($item->credit_unit, 2) }}</td>
                                    <td>{{ number_format($item->debit_unit, 2) }}</td>
                                    <td>{{ number_format($item->current_unit, 2) }}</td>
                                    <td> {{ $item->created_at->format('d-M-Y h:i:s A') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="100%" class="text-center">No records found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
            </div>
            <div class="col-lg-4">
                <h3>Gift credit to buyer</h3>
                <form action="{{route('admin.user.gift.buyer.credit')}}" method="post">
                    @csrf
                    <label for="">Gift credit unit</label>
                    <input type="number" name="buyer_gift_credit" class="form-control"/>
                    <input type="hidden" name="user_id" value="{{$user_id}}">
                    @error('buyer_gift_credit')<div class="text-danger">{{ $message }}</div>@enderror
                    <button type="submit" class="btn btn-outline-primary" onclick="return confirmSubmission()">Gift</button>
                </form>
            </div>
        </div>

            

         </div>
         <div class="tab-pane fade {{$package_type=='seller'?"show active":""}}" id="sellers" role="tabpanel" aria-labelledby="sellers-tab" tabindex="0">
            <div class="heading-row">
                <h3>User Seller Wallet  History</h3>
                <div class="d-flex">  
                    <a href="{{route('admin.user.index')}}" class="btn btn-primary btn-sm">
                        <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                        Back 
                    </a>            
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <table class="table">
                        <thead>
                            <tr class="align-middle">
                                <th>SL.</th>        
                                <th>Credit Unit</th>
                                <th>Debit Unit</th>                                               
                                <th>Current Unit</th>
                                <th>Date</th>

                            </tr>
                        </thead>
                        <tbody class="align-middle">
                        @forelse ($seller_wallet_transactions as $key =>$item)
                            <tr>
                                <td> {{ $key+1 }}</td>
                                <td>{{ number_format($item->credit_unit, 2) }}</td>
                                <td>{{ number_format($item->debit_unit, 2) }}</td>
                                <td>{{ number_format($item->current_unit, 2) }}</td>
                                <td> {{ $item->created_at->format('d-M-Y h:i:s A') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%" class="text-center">No records found</td>
                            </tr>
                        @endforelse
                                                
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <h3>Gift credit to seller</h3>
                    <form action="{{route('admin.user.gift.seller.credit')}}" method="post">
                        @csrf
                        <label for="">Gift credit unit</label>
                        <input type="number" name="seller_gift_credit" class="form-control"/>
                        <input type="hidden" name="user_id" value="{{$user_id}}">
                        @error('buyer_gift_credit')<div class="text-danger">{{ $message }}</div>@enderror
                        <button type="submit" class="btn btn-outline-primary" onclick="return confirmSubmission()">Gift</button>
                    </form>
                </div>
            </div>
         </div>
    </div>
</div>

@endsection
@push('scripts')
{{-- <script>
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
</script> --}}
<script>
    function confirmSubmission() {
        return confirm("Are you sure you want to gift this credit?");
    }
</script>
@endpush