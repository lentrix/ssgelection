<!-- Modal -->
<div class="modal fade" id="updateActivityModal" tabindex="-1" aria-labelledby="updateActivityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateActivityModalLabel">Update Activity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::model($activity, ['url'=>'/activities/' . $activity->id, 'method'=>'put']) !!}
            <div class="modal-body">
                <div class="mb-3">
                    {!! Form::label("title", "Title of Activity") !!}
                    {!! Form::text("title", null, ["class"=>'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label("date", "Date") !!}
                    {!! Form::date("date", $activity->start, ["class"=>'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label("start", "Start Time") !!}
                    {!! Form::time("start", $activity->start->format('h:i'), ["class"=>'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label("end", "End Time") !!}
                    {!! Form::time("end", $activity->end->format('h:i'), ["class"=>'form-control']) !!}
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
