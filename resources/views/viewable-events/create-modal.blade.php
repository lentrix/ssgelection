<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createViewableEventModal">
    <i class="fa fa-plus"></i> Create Event
</button>

<!-- Modal -->
<div class="modal fade" id="createViewableEventModal" tabindex="-1" aria-labelledby="createViewableEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createViewableEventModalLabel">Create Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['url'=>'/viewable-events','method'=>'post']) !!}
            <div class="modal-body">
                <div class="mb-3">
                    {!! Form::label("title", "Event Title") !!}
                    {!! Form::text("title", null, ["class"=>"form-control"]) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label("start_date", "Start Date") !!}
                    {!! Form::date("start_date", null, ["class"=>"form-control"]) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label("start_time", "Start Time") !!}
                    {!! Form::time("start_time", null, ["class"=>"form-control"]) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label("end_date", "End Date") !!}
                    {!! Form::date("end_date", null, ["class"=>"form-control"]) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label("end_time", "End Time") !!}
                    {!! Form::time("end_time", null, ["class"=>"form-control"]) !!}
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create Event</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
