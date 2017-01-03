@extends('layouts.admin.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
                @lang('admin.list', ['name' => 'User'])
            </h3>
        </div>

        <div class="col-md-12">
            <div class='col-md-3 col-md-offset-9 form-group'>
                {!! Form::open(['method' => 'GET', 'route' => 'admin.user.search']) !!}
                    {!! Form::text('search', null, ['id' => 'text-search-player',
                        'class' => 'form-control', 'placeholder' => 'Search']) !!}
                    <i class='fa fa-search' aria-hidden='true' id='search-team'></i>
                {!! Form::close() !!}
            </div>
        </div>
        
        <div class="col-lg-12">@include('shared.flash')</div>
                
        <div>
            @if (count($users))
                <table class="table table-striped table-bordered table-hover" 
                    id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th class="colum" width="10%">@lang('admin.label.index')</th>
                            <th class="colum">@lang('admin.label.name')</th>
                            <th class="colum">@lang('admin.email')</th>
                            <th class="colum" width="10%">@lang('admin.label.delete')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr class="odd gradeX" align="center">
                                <td>{!! $key + 1 !!}</td>
                                <td>{!! $user->name !!}</td>
                                <td>{!! $user->email !!}</td>
                                <td class="center" width="10%">
                                    {!! Form::open(['method' => 'DELETE', 
                                        'route' => ['admin.user.destroy',
                                        $user->id] ]) !!}

                                        {!! Form::submit( Lang::get('admin.button.delete'), 
                                            ['class' => 'btn btn-danger btn-xs']) !!}

                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="col-lg-7" align="right">
                    {!! $users->render() !!}
                </div>
            @else
                <h4 align="center">@lang('admin.message.empty_data', ['name' => 'user'])</h4>
            @endif
        </div>
    </div>
</div>
@stop
