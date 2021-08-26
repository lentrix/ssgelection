<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Create Activity
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Activity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['url'=>'/activities', 'method'=>'post']) !!}
            <div class="modal-body">
                <div class="mb-3">
                    {!! Form::label("title", "Title of Activity") !!}
                    {!! Form::text("title", null, ["class"=>'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label("date", "Date") !!}
                    {!! Form::date("date", null, ["class"=>'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label("start", "Start Time") !!}
                    {!! Form::time("start", null, ["class"=>'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label("end", "End Time") !!}
                    {!! Form::time("end", null, ["class"=>'form-control']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Activity</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
