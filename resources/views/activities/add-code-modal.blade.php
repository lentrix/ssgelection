<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCheckpoint">
    Add Checkpoint
</button>

<!-- Modal -->
<div class="modal fade" id="addCheckpoint" tabindex="-1" aria-labelledby="addCheckpointLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCheckpointLabel">Add Checkpoint</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['url'=>'/activities/add-checkpoint/' . $activity->id, 'method'=>'post']) !!}
            <div class="modal-body">
                <div class="mb-3">
                    {!! Form::label('check_time', 'Check Time') !!}
                    {!! Form::time('check_time', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Checkpoint</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
