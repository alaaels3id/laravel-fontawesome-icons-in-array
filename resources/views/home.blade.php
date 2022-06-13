@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <select
                        name="icon"
                        id="icon"
                        class="icons_select2 form-control form-data"
                        data-size="auto"
                        title="@lang('back.select-a-value')"
                    >
                        @foreach($icons as $icon)
                            <option data-icon="{{ $icon['icon'] }}" value="{{ $icon['icon'] }}">
                                {{ Str::of($icon['name'])->headline() }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

            let iformat = (icon) => $('<span><i class="fa ' + $(icon.element).data('icon') + '"></i> ' + icon.text + '</span>');

            $('.icons_select2').select2({
                width: "100%",
                templateSelection: iformat,
                templateResult: iformat,
                allowHtml: true
            });
        });
    </script>
@stop
