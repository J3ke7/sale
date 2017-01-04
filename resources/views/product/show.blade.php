@extends('layouts.user.app')

@section('content')
<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                    <li class="active">Đặc sản</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="detail">
                    <h2 style="text-align: center; color: #69a4c2;">{!! $product->name !!}</h2>
                    
                    <div style="border-radius: 5px;" class="col-lg-5 design">
                        <img src="../upload/images/{{ $product->image }}" 
                            style="width: 390px; height: 300px;">
                        <h3 style="margin: 20px 100px; color: red;">
                            {!! number_format($product->price) !!} đồng
                        </h3>
                        <h5 style="margin: 10px 120px;">
                            <a href="{!! route('user.cart.addItem', $product->id) !!}">Mua ngay</a>
                        </h5>
                    </div>

                    <div class="col-lg-7 design">
                        <h4>Mã sản phẩm: <span class="atribute">{!! $product->code !!}</span></h4>
                        <h4>Xuất xứ: <span class="atribute">{!! $product->local !!}</span></h4>
                        <h4>Danh mục: <span class="atribute">{!! $product->category->name !!}</span></h4>
                        <div>
                            <h4>Mô tả</h4>
                            <p style="font-size: 16px;">{!! $product->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
