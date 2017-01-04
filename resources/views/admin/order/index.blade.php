@extends('layouts.admin.app')

@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
                @lang('admin.list', ['name' => 'Order'])
            </h3>
        </div>

        <div class="col-md-12">
            <div class='col-md-3 col-md-offset-9 form-group'>
                {!! Form::open(['method' => 'GET']) !!}
                    {!! Form::text('search', null, ['id' => 'text-search-player',
                        'class' => 'form-control', 'placeholder' => 'Search']) !!}
                    <i class='fa fa-search' aria-hidden='true' id='search-team'></i>
                {!! Form::close() !!}
            </div>
        </div>
        
        <div class="col-lg-12">@include('shared.flash')</div>
                
        <div>
            @if (count($orders))
                <table class="table table-striped table-bordered table-hover" 
                    id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th class="colum" width="10%">@lang('admin.label.index')</th>
                            <th class="colum">@lang('admin.user')</th>
                            <th class="colum">@lang('admin.status')</th>
                            <th class="colum">@lang('admin.total')</th>
                            <th class="colum">@lang('admin.created_at')</th>
                            <th class="colum" width="10%">@lang('admin.label.delete')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $order)
                            <tr class="odd gradeX" align="center">
                                <td>{!! $key + 1 !!}</td>
                                <td>{!! $order->user->name !!}</td>
                                <td>{!! config("view.status")[$order->status] !!}</td>
                                <td>{!! number_format($order->total_price) !!}</td>
                                <td>{!! $order->created_at !!}</td>
                                <td class="center" width="10%">
                                    {!! Form::open(['method' => 'DELETE', 
                                        'route' => ['admin.order.destroy',
                                        $order->id] ]) !!}

                                        {!! Form::submit( Lang::get('admin.button.delete'), 
                                            ['class' => 'btn btn-danger btn-xs']) !!}

                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="col-lg-7" align="right">
                    {!! $orders->render() !!}
                </div>
            @else
                <h4 align="center">@lang('admin.message.empty_data', ['name' => 'order'])</h4>
            @endif
        </div>
    </div>
</div>
@stop
