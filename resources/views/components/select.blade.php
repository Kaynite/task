@props(['name', 'label', 'required' => false, 'options' => [], 'placeholder'])

<div class="row mb-10 align-items-center">
    <div class="col-md-2">
        {!! Form::label($name, $label, ['class' => $required ? 'form-label required' : 'form-label']) !!}
    </div>
    <div class="col-md-10">
        <div class="form-group">
            {!! Form::select($name, $options, null, ['class' => 'form-control form-control-lg form-control-solid', 'required' => $required, 'placeholder' => $placeholder, $attributes]) !!}
            @error($name)
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>
