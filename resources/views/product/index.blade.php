@extends('layouts.user.app')

@section('content')
<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i></a>
                        <i class="icon-angle-right"></i>
                    </li>
                    <li class="active">Đặc sản</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="container">
        <div class="row">
            <section id="projects">
                <ul id="thumbs" class="portfolio">
                    @if($products)
                        @foreach ($products as $product)
                            <li class="item-thumbs col-lg-3 design" data-id="id-0" data-type="web">
                                <a href="{!! route('product.show', $product->id) !!}">
                                    <img src="upload/images/{!! $product->image !!}" 
                                        style="width: 400px; height: 210px;">
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </section>
        </div>
    </div>
</section>
@stop
