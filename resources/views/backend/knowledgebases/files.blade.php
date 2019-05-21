
@if (isset($type))
<div class="form-group">
    <label class="">Knowledgebase Description:</label>
         <ul class="list-group">
           <li class="list-group-item">{{ $knowledgebase['description'] }}</li>
        </ul>
</div>
@endif
<table class="table table table-hover table-bordered main">
    <thead>
        <tr>
            <th width="5%">SR.No</th>
            <th>File Name</th>
            <th width="5%" colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
        @php
        $fileName = json_decode($knowledgebase['file'],TRUE);
        $i = 1;
        @endphp
        @if (!empty($fileName))
        @foreach ($fileName as $key => $files)
        @php
        $path = 'public/Knowledgebase/' . $knowledgebase['id'] . '/' . $files;
        @endphp
        <tr>
            <td>{!! $i !!}</td>
            <td>{!! $files !!}</td>
            <td><a href="{!! \Storage::url("/Knowledgebase/".$knowledgebase['id'].'/'.$files) !!}" download class="fa fa-download"></a></td>
            {{-- <td><a href="{!! route('admin.knowledgebases.download',[$knowledgebase['id'],$files]) !!}" class="fa fa-download"></a></td> --}}
            @if (!isset($type))
            <td><a href="#"  class="delete fa fa-trash" data="{!! $files !!}" data-id={!! $knowledgebase['id'] !!}></td>
            @endif
        </tr>
        @php $i++; @endphp
        @endforeach
        @else
         <tr>
            <td colspan="3" style="text-align: center;">No Attachments Found.</td>
        </tr>
        @endif
    </tbody>
</table>