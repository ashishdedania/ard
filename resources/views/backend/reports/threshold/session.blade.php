@if (!empty($sessionDetails))
<h2 class="pull-center">{!! trans('labels.backend.reports.threshold.content') !!}</h2>
<table class="table table-bordered table-responsive table-hover" style="width:auto;">
    <thead>
        <tr>
            <th class="bg-gray-hd">SNo.</th>
            <th class="bg-gray-hd">Client Id</th>
            <th class="bg-gray-hd">Assessment Date</th>
            <th class="bg-gray-hd">Assessment Title</th>
            <th class="bg-gray-hd">Threshold Start</th>
            <th class="bg-gray-hd">Threshold End</th>
            <th class="bg-gray-hd">Clinic Service</th>
            <th class="bg-gray-hd">Notes</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sessionDetails as $key => $sessionVal)
        <tr>
            <td>{!! ++$key !!}</td>
            <td>{!! $sessionVal['session_client']['client_code'] !!}</td>
            <td>{!! date('d-m-Y',strtotime($sessionVal['session_date'])) !!}</td>
            <td>{!! $sessionVal['title'] !!}</td>
            <td>
                <input type="number" style="width: 126px;" class="form-control box-size threshold_start" step=".01"   maxlength="4" onKeyDown="if (this.value.length == 4 && event.keyCode != 8)
			    return false;"  name="threshold_start[]" class="max-val" pattern="[1-9]{1}[0-9]{9}" min="1" max="10" value=@if ($sessionVal['threshold_start'] != "" || $sessionVal['threshold_start'] != null){!! $sessionVal['threshold_start'] !!}@else 0  @endif placeholder="range(0-10)">
            </td>
            <td>
                <input type="number" style="width: 126px;'" class="form-control box-size threshold_end" step=".01"  maxlength="4" onKeyDown="if (this.value.length == 4 && event.keyCode != 8)
			    return false;"  name="threshold_end[]" class="max-val" pattern="[1-9]{1}[0-9]{9}" min="1" max="10" value=@if ($sessionVal['threshold_end'] != "" || $sessionVal['threshold_end'] != null){!! $sessionVal['threshold_end'] !!}@else 0  @endif placeholder="range(0-10)">
            </td>
            <td>{!! $sessionVal['session_intervention']['name'] !!}</td>
          {{--   @php
            $desLength = strlen($sessionVal['description']);
            @endphp --}}
            {{-- @if ($desLength > 30) --}}
            {{--  <td>
                <span tabindex="1" class="" data-placement="left" role="button" data-toggle="popover" data-trigger="hover" title="Notes" data-content="{!! $sessionVal['description'] !!}">{!! substr($sessionVal['description'],0,30) !!}...</span>
            </td>  --}}
            {{-- @else --}}
            <td><textarea rows="7" cols="15" class="form-control insert_note" name="insert_note[]">{!! $sessionVal['description'] !!}</textarea></td>
            {{-- @endif --}}
        </tr>
    <input type="hidden" id="session-id" name="sessionId[]"  value="{!! $sessionVal['id'] !!}">
    @endforeach
    </tbody>
</table>
@endif