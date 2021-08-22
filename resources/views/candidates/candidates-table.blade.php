<table class="table table-bordered">
    <tr class="bg-info text-dark">
        <th class="d-none d-lg-table-cell">Candidate ID</th>
        <th>Name</th>
        <th>Program & Year</th>
        <th>Party</th>
        <th class="d-none d-md-table-cell">Department</th>
        <th class="d-none d-lg-table-cell">Tag Line</th>
    </tr>
    @foreach($candidates as $cnd)
    <tr>
        <td class="d-none d-lg-table-cell">{{$cnd->id}}</td>
        <td>
            <a href="{{url('/candidates/' . $cnd->id)}}">
                {{$cnd->user->fullName}}
            </a>
        </td>
        <td>{{$cnd->user->program}} - {{$cnd->user->year}}</td>
        <td>{{$cnd->party}}</td>
        <td class="d-none d-md-table-cell">{{$cnd->user->dept}}</td>
        <td class="d-none d-lg-table-cell">{{$cnd->tag_line}}</td>
    </tr>
    @endforeach
</table>
