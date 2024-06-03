<div class="modal fade" id="{{$modalToggle}}" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <form action="{{ route($action, $id) }}" method="POST" class="w-100">
      @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalToggleLabel">{{ $title }} {{ $name }} ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="form-group m-3">
                {{-- <input type="date" class="form-control" name="date" value="{{old("date")}}"> --}}
                <select name="date" class="form-control" id="">
                    <option value="">{{__('models.select')}}</option>
                    <option value="1">{{"1 ".__('models.day')}}</option>
                    <option value="2">{{"2 ".__('models.day')}}</option>
                    <option value="30">{{__('models.month')}}</option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">


                    No
                </button>
                    <button type="submit" class="btn btn-primary d-flex align-items-center gap-2">Yes</button>
            </div>
        </div>
    </form>
</div>
</div>
