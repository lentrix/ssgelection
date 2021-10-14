<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addVideoModal">
    <i class="fa fa-upload"></i> Add Video
</button>

<!-- Modal -->
<div class="modal fade" id="addVideoModal" tabindex="-1" aria-labelledby="addVideoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addVideoModalLabel">Add Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['url'=>'/videos/' . $viewableEvent->id,'method'=>'post']) !!}
            {!! Form::hidden("viewable_event_id", $viewableEvent->id) !!}
            <div class="modal-body">
                <div class="mb-3">
                    {!! Form::label("title", "Video Title") !!}
                    {!! Form::text("title", null, ["class"=>"form-control"]) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label("video_id", "Youtube Video ID") !!}
                    {!! Form::text("video_id", null, ["class"=>"form-control"]) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label("description", "Description") !!}
                    {!! Form::textarea("description", null, ["class"=>"form-control",'rows'=>'4']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label("tags", "Tag") !!}
                    {!! Form::text("tags", null, ["class"=>"form-control"]) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Video</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
