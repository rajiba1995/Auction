@extends('admin.app')
{{-- @section('title') {{ $pageTitle }} @endsection --}}
@section('content')
<div class="inner-content">
    <div class="report-table-box">
        <div class="heading-row">
            <h3>Participants List</h3>
            <div class="d-flex">    
                <a href="{{route('admin.inquiry.index')}}" class="btn btn-primary btn-sm">
                    <iconify-icon icon="icon-park-twotone:back"></iconify-icon>
                    Back 
                </a>          
            </div>
        </div>
            
<table class="table">
    <thead>
        <tr class="align-middle">
            <th>SL.</th>
            <th>Name</th>
            <th>Quotes</th>
        </tr>
    </thead>
    <tbody class="align-middle">
        @forelse ($data as $key =>$item)
        <tr>
            <td>{{ $key+1 }}</td>  
            <td>{{ $item->SellerData ? $item->SellerData->name : "" }}</td>
            <td>
                @php
                    $get_all_quotes = get_all_quotes_by_seller($item->inquiry_id, $item->user_id);
                    $quoteArray = [];
                @endphp
                <ul>
                    @forelse ($get_all_quotes as $quote)
                        <?php $quoteArray[] = $quote->quotes; ?>
                    @empty
                        <p>No quotes found</p>
                    @endforelse
                </ul>
                <p>{{ implode(' => ', $quoteArray) }}</p>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="100%" class="text-center">No Inquiry records found</td>
        </tr>
        @endforelse

    </tbody>
</table>
{{-- {{$data->appends($_GET)->links()}} --}}
</div>
</div>
@endsection
@push('scripts')
<script>
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