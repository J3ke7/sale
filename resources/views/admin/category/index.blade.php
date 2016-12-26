@extends('layouts.admin.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
                @lang('admin.list', ['name' => 'Category'])
            </h3>
        </div>

        <div class="col-md-12">
            <div class='col-md-3'>
                <a class="btn btn-primary" href="{{ route('admin.category.create') }}">
                    @lang('admin.button.add')
                </a>
            </div>
               
            <div class='col-md-3 col-md-offset-6 form-group'>
                {!! Form::open(['method' => 'GET', 'route' => 'admin.category.search']) !!}
                    {!! Form::text('search', null, ['id' => 'text-search-player',
                        'class' => 'form-control', 'placeholder' => 'Search']) !!}
                    <i class='fa fa-search' aria-hidden='true' id='search-team'></i>
                {!! Form::close() !!}
            </div>
        </div>
        
        <div class="col-lg-12">@include('shared.flash')</div>
                
        <div>
            @if (count($categories))
                <table class="table table-striped table-bordered table-hover" 
                    id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th class="colum" width="10%">@lang('admin.label.index')</th>
                            <th class="colum">@lang('admin.label.name')</th>
                            <th class="colum" width="10%">@lang('admin.label.edit')</th>
                            <th class="colum" width="10%">@lang('admin.label.delete')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $category)
                            <tr class="odd gradeX" align="center">
                                <td>{!! $key + 1 !!}</td>
                                <td>{!! $category->name !!}</td>
                                <td class="center" width="10%">
                                    <i class="fa fa-pencil fa-fw"></i>
                                    <a href="{!! route('admin.category.edit', $category->id) !!}">@lang('admin.label.edit')</a>
                                </td>
                                <td class="center" width="10%">
                                    {!! Form::open(['method' => 'DELETE', 
                                        'route' => ['admin.category.destroy',
                                        $category->id] ]) !!}

                                        {!! Form::submit( Lang::get('admin.button.delete'), 
                                            ['class' => 'btn btn-danger btn-xs']) !!}

                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-lg-7" align="right">
                    {!! $categories->render() !!}
                </div>
            @else
                <h4 align="center">@lang('admin.message.empty_data', ['name' => 'Category'])</h4>
            @endif
        </div>
    </div>
</div>
@stop
