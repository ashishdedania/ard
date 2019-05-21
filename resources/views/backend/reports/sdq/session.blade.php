@if (!empty($sessionDetails))
<table class="table table-bordered table-responsive table-hover" style="width:auto;">
    <thead>
        <tr>
            <th class="bg-gray-hd">SNo.</th>
            <th class="bg-gray-hd">Assessment Date</th>
            <th class="bg-gray-hd">Assessment Title</th>
            <th class="bg-gray-hd">Compare</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sessionDetails as $key => $sessionVal)
        <tr>
            <td>{!! ++$key !!}</td>
            <td>{!! date('d-m-Y',strtotime($sessionVal['session_date'])) !!}</td>
            <td>{!! $sessionVal['title'] !!}</td>
            <td><input type="checkbox" class="check-session" name="session_selected[]" value="{{$sessionVal['id']}}"></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif