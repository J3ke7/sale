@extends('layouts.admin.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-1">
                <h1 class="page-header">
                    @lang('admin.category')
                    <small>@lang('admin.button.add')</small>
                </h1>
            </div>

            <div class="col-lg-7 col-lg-offset-1">
               {!! Form::model($category, ['method' => 'PUT', 'route' => ['admin.category.update',
                    $category->id]]) !!}
                    @include('shared.error')

                    <div class="form-group">
                        {!! Form::label('name', Lang::get('admin.name', ['name' => 'Category'])) !!}
                        {!! Form::text('name', null, [
                            'class' => 'form-control',
                            'placeholder' => Lang::get('admin.message.holder', ['name' => 'Category'])
                        ]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit(Lang::get('admin.button.update'), ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
