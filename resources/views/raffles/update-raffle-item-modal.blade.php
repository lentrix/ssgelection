<!-- Modal -->
<div class="modal fade" id="updateRaffleItemModal" tabindex="-1" aria-labelledby="updateRaffleItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateRaffleItemModalLabel">Update Raffle Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['url'=>'/raffles/items', 'method'=>'put']) !!}
            {!! Form::hidden('id', null, ['id'=>'form-id']) !!}
            <div class="modal-body">
                <div class="mb-3">
                    {!! Form::label('item', 'Item') !!}
                    {!! Form::text('item', null, ['class'=>'form-control','id'=>'form-item']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('worth', 'Worth') !!}
                    {!! Form::text('worth', null, ['class'=>'form-control','id'=>'form-worth']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('sponsor', 'Sponsor') !!}
                    {!! Form::text('sponsor', null, ['class'=>'form-control','id'=>'form-sponsor']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('quantity', 'Quantity') !!}
                    {!! Form::number('quantity', null, ['class'=>'form-control','id'=>'form-quantity']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update Raffle Item</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
