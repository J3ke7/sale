@extends('layouts.admin.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
                @lang('admin.list', ['name' => 'Product'])
            </h3>
        </div>

        <div class="col-md-12">
            <div class='col-md-3'>
                <a class="btn btn-primary" href="{{ route('admin.product.create') }}">
                    @lang('admin.button.add')
                </a>
            </div>
               
            <div class='col-md-3 col-md-offset-6 form-group'>
                {!! Form::open(['method' => 'GET', 'route' => 'admin.product.search']) !!}
                    {!! Form::text('search', null, ['id' => 'text-search-player',
                        'class' => 'form-control', 'placeholder' => 'Search']) !!}
                    <i class='fa fa-search' aria-hidden='true' id='search-team'></i>
                {!! Form::close() !!}
            </div>
        </div>
        
        <div class="col-lg-12">@include('shared.flash')</div>
                
        <div>
            @if (count($products))
                <table class="table table-striped table-bordered table-hover" 
                    id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th class="colum" width="10%">@lang('admin.label.index')</th>
                            <th class="colum">@lang('admin.label.name')</th>
                            <th class="colum">@lang('admin.code')</th>
                            <th class="colum">@lang('admin.price')</th>
                            <th class="colum">@lang('admin.quantity')</th>
                            <th class="colum">@lang('admin.local')</th>
                            <th class="colum">@lang('admin.category')</th>
                            <th class="colum" width="10%">@lang('admin.label.edit')</th>
                            <th class="colum" width="10%">@lang('admin.label.delete')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                            <tr class="odd gradeX" align="center">
                                <td>{!! $key + 1 !!}</td>
                                <td>{!! $product->name !!}</td>
                                <td>{!! $product->code !!}</td>
                                <td>{!! $product->price !!}</td>
                                <td>{!! $product->quantity !!}</td>
                                <td>{!! $product->local !!}</td>
                                <td>{!! $product->category->name !!}</td>
                                <td class="center" width="10%">
                                    <i class="fa fa-pencil fa-fw"></i>
                                    <a href="{!! route('admin.product.edit', $product->id) !!}">@lang('admin.label.edit')</a>
                                </td>
                                <td class="center" width="10%">
                                    {!! Form::open(['method' => 'DELETE', 
                                        'route' => ['admin.product.destroy',
                                        $product->id] ]) !!}

                                        {!! Form::submit( Lang::get('admin.button.delete'), 
                                            ['class' => 'btn btn-danger btn-xs']) !!}

                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="col-lg-7" align="right">
                    {!! $products->render() !!}
                </div>
            @else
                <h4 align="center">@lang('admin.message.empty_data', ['name' => 'product'])</h4>
            @endif
        </div>
    </div>
</div>
@stop
