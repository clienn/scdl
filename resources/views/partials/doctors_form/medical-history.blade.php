@foreach($mh as $item)
<div class="row mt-4 justify-content-between border-bottom-1">
    <div class="col-md-6 ml-2">
        <span>{{ $item->name }}</span>
    </div>
    <div class="col-md-2">
        <div class="row">
            <div class="col-md-3 flex-column d-flex form-check ml-3">
                <input type="radio" name="mh-{{ $item->id }}" class="form-check-input adjust-radio-1 mh" value="0">
                <label class="form-check-label">YES</label>
            </div>
            <div class="col-md-4 flex-column d-flex form-check">
                <input type="radio" name="mh-{{ $item->id }}" class="form-check-input adjust-radio-1 mh" value="1">
                <label class="form-check-label">NO</label>
            </div>
        </div>
    </div>
</div>
@endforeach