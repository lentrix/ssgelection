<!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-end mt-1" data-bs-toggle="modal" data-bs-target="#addRaffleItemModal">
    <i class="fa fa-plus"></i>
    Add Raffle Item
</button>

<!-- Modal -->
<div class="modal fade" id="addRaffleItemModal" tabindex="-1" aria-labelledby="addRaffleItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRaffleItemModalLabel">Add Raffle Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['url'=>'/raffles/items', 'method'=>'post']) !!}
            <div class="modal-body">
                <div class="mb-3">
                    {!! Form::label('item', 'Item') !!}
                    {!! Form::text('item', null, ['class'=>'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('worth', 'Worth') !!}
                    {!! Form::text('worth', null, ['class'=>'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('sponsor', 'Sponsor') !!}
                    {!! Form::text('sponsor', null, ['class'=>'form-control']) !!}
                </div>
                <div class="mb-3">
                    {!! Form::label('quantity', 'Quantity') !!}
                    {!! Form::number('quantity', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Raffle Item</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
