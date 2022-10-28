@props(['name' => null, 'label', 'required' => false, 'value' => null])

<div class="row mb-10 align-items-center">
    <div class="col-md-2">
        {!! Form::label($name, $label, ['class' => $required ? 'form-label required' : 'form-label']) !!}
    </div>
    <div class="col-md-10">
        <div class="form-check form-switch form-check-custom form-check-solid">
            {!! Form::hidden($name, 0) !!}
            {!! Form::checkbox($name, 1, null, ['class' => 'form-check-input', $attributes]) !!}
        </div>
        @error($name)
            <small class="form-text text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
