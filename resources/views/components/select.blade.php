<div class="mb-3">
    <select id="largeSelect" class="form-select form-select-lg">
        <option selected>{{ $placeholder }}</option>
        @if ($options)
            @foreach ($options as $option)
                <option value="{{ $option->id }}">{{ $option->name }}</option>
            @endforeach
        @endif

    </select>
</div>
