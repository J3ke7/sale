@extends('layouts.user.app')

@section('content')
<section id="featured">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div id="main-slider" class="flexslider">
                    <ul class="slides">
                       <li><img src="user/img/slides/nen3.jpg" alt=""/></li>
                       <li><img src="user/img/slides/nen5.jpg" alt="" /></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>  
</section>

<div class="col-lg-12" style="text-align: center;">@include('shared.flash')</div>

<section class="callaction">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="big-cta">
                    <div class="cta-text">
                        <h2><span>@lang('user.product_hot')</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <?php $count = 0 ?>
         @if ($products) 
            @foreach ($products as $key => $product)
                @if ($count < 4) 
                    <?php $count++ ?>
                    <div class="col-lg-3">
                        <div class="box">
                            <div class="box-gray aligncenter">
                                <h4 style=" text-transform: uppercase;">
                                    {!! $product->name !!}
                                </h4>
                                <div class="icon">
                                    <a href="{!! route('product.show', $product->id) !!}">
                                        <img src="upload/images/{{ $product->image}}" 
                                            style="width: 400px; height: 200px;">
                                    </a>
                                </div>
                            </div>

                            <div class="box-bottom">
                                <a href="">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="solidline">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
