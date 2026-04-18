<div>
    <table border="1" cellpadding="100px" cellspacing="100px">
        <thead>
            <tr>
                <th colspan="4">
                    <h2>Book Store</h2>
                    <h3>Corporate Address: Galaxy Building, CG Road, Ahmedabad</h3>
                </th>
            </tr>
            <tr>
                <th style="width:100%">Books Name</th>
                <th style="width:100%">Price</th>
                <th style="width:100%">Quantity</th>
                <th style="width:100%" class="text-center">Total</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @foreach($cartRec as $details)
            <tr>
                <td align="center">
                    <h4 class="nomargin">{{ $details->bookname }}</h4>
                </td>
                <td align="center">
                    <h4 class="nomargin">{{ $details->price *82}}</h4>
                </td>
                <td align="center">
                    <h4 class="nomargin">{{ $details->quantity }}</h4>
                </td>
                <td align="center">
                    <h4 class="nomargin">{{ $details->total *82}}</h4>
                </td>
                @php $total = $total + $details->total; @endphp
                <hr>
            </tr>
            @endforeach
            <tr>
                <td colspan="4">
                    <h4 class="nomargin" align="right">Grand Total: {{ $total *82 }}</h4>
                </td>
            </tr>
        </tbody>
    </table>
</div>


@section('scripts')
<script type="text/javascript">
    $(".update-cart").change(function(e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: '{{ route("update.cart") }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: ele.parents("tr").attr("data-id"),
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function(response) {
                window.location.reload();
            }
        });
    });
    $(".remove-from-cart").click(function(e) {
        e.preventDefault();
        var ele = $(this);
        if (confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route("remove.from.cart") }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id")
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    });
</script>
@endsection