<table class="table table table-hover table-bordered main">
    <thead>
        <tr>
            <th width="5%">SR.No</th>
            <th>Customer Name</th>
            <th>Ratings</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($clientDetails))
        @php $i=1; @endphp
        @foreach ($clientDetails as $key => $customer)
             <tr>
                <td>{!! $i !!}</td>
                <td>{!! $customer['first_name'].' '.$customer['last_name'] !!}
                <td><label class="label label-success">
                    @if($customer['ratings'] != null)
                         {!! $customer['ratings'] !!}
                    @else 0
                    @endif
                </label></a></td>
            </tr>

        @php $i++; @endphp
        @endforeach
        @else
            <tr>
                <td colspan="3" style="text-align: center;">No Records Found.</td>
            </tr>
        @endif
    </tbody>
</table>