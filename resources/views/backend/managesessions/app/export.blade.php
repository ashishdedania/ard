<table class="table table-bordered table-hover">
    <tbody>
        <tr>
            <td>Question Name</td>
            <td>Option</td>
            @if(access()->user()->roles()->first()->id != env('CLIENT_ROLE_ID') && $type != 'Subjective')<th>Score</th>@endif
        </tr>

        @if ($type == 'Subjective')
        @foreach ($questionDetails as $key => $quenAns)
        <tr>
            <td>{!! $quenAns->question_name !!}</td>
            <td>{!! $quenAns->options !!}</td>
        </tr>
        @endforeach
        @else
        @foreach ($questionDetails as $key => $quenAns)
        <tr>
            <td>{!! $quenAns['question'] !!}</td>
            <td>{!! $quenAns['option'] !!}</td>
            @if(access()->user()->roles()->first()->id != env('CLIENT_ROLE_ID') &&  $type != 'Subjective')
            <td>{!! $quenAns['marks'] !!}</td>
            @endif
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

