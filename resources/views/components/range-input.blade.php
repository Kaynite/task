@props(['name', 'label', 'required' => false, 'value' => NULL])

<div class="row mb-10 align-items-center">
    <div class="col-md-2">
        {!! Form::label($name, $label, ['class' => $required ? 'form-label required' : 'form-label']) !!}
    </div>
    <div class="col-md-5">
        <div class="form-group">
            {!! Form::number("{$name}_from", $value, ['class' => 'form-control form-control-lg form-control-solid', 'required' => $required, $attributes, 'placeholder' => __('admin.from')]) !!}
            @error("{$name}_from")
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
            {!! Form::number("{$name}_to", $value, ['class' => 'form-control form-control-lg form-control-solid', 'required' => $required, $attributes, 'placeholder' => __('admin.to')]) !!}
            @error("{$name}_to")
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>