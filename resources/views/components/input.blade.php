<div class="form-floating mb-3">
    @if ($type == 'file')
        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">{{ __("home.$label") }}</label>
            <input class="form-control" type="file" id="formFileMultiple" multiple />
        </div>
    @else
        <input type="{{ $type }}" class="form-control" id="floatingInput" placeholder="{{ $placeholder }}"
            aria-describedby="floatingInputHelp" type="{{ $type }}" name="{{ $name }}"
            value="{{ $value }}" multiple />
        <label for="floatingInput">{{ __("home.$label") }}</label>
    @endif
</div>
