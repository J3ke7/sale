@extends('layouts.admin.app')

@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-1">
                <h1 class="page-header">
                    @lang('admin.product')
                    <small>@lang('admin.label.edit')</small>
                </h1>
            </div>

            <div class="col-lg-7 col-lg-offset-1">
                {!! Form::model($product, ['method' => 'PUT', 'files' => 'true',
                    'route' => ['admin.product.update', $product->id]]) !!}
                    @include('shared.error')

                    <div class="form-group">
                        {!! Form::label('name', Lang::get('admin.label.name')) !!}
                        {!! Form::text('name', null, [
                            'class' => 'form-control',
                            'placeholder' => Lang::get('admin.message.holder', ['name' => 'Product'])
                        ]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('code', Lang::get('admin.code')) !!}
                        {!! Form::text('code', null, [
                            'class' => 'form-control',
                            'placeholder' => Lang::get('admin.message.holder', ['name' => 'Code'])
                        ]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('price', Lang::get('admin.price')) !!}
                        {!! Form::text('price', null, [
                            'class' => 'form-control',
                            'placeholder' => Lang::get('admin.message.holder', ['name' => 'Price'])
                        ]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('quantity', Lang::get('admin.quantity')) !!}
                        {!! Form::text('quantity', null, [
                            'class' => 'form-control',
                            'placeholder' => Lang::get('admin.message.holder', ['name' => 'Quantity'])
                        ]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('local', Lang::get('admin.local')) !!}
                        {!! Form::text('local', null, [
                            'class' => 'form-control',
                            'placeholder' => Lang::get('admin.message.holder', ['name' => 'Local'])
                        ]) !!}
                    </div>

                    <div class='form-group'>
                        {!! Form::label('category_id', Lang::get('admin.category')) !!}
                        {!! Form::select('category_id', $categories, null, [
                            'class' => 'form-control',
                            'placeholder' => Lang::get('admin.message.choose', ['name' => 'Category'])
                        ]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('image', Lang::get('admin.image')) !!}
                        {!! Form::file('image') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('description', Lang::get('admin.description')) !!}
                        {!! Form::textarea('description', null, [
                            'class' => 'form-control',
                            'placeholder' => Lang::get('admin.message.holder', ['name' => 'Description'])
                        ]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit(Lang::get('admin.button.update'),
                            ['class' => 'btn btn-primary']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
