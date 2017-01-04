@extends('layouts.user.app')

@section('content')
<section id="inner-headline">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                    <li class="active">Giỏ hàng</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<h2 style="text-align: center; margin: 30px;">Giỏ hàng của bạn</h2>

<div class="table-responsive" style="margin-bottom: 50px;">
    <table border="1" style="text-align: center" class="table">
        <tr>
            <td><label>STT</label></td>
            <td><label>Sản phẩm</label></td>
            <td><label>Số lượng</label></td>
            <td><label>Đơn giá</label></td>
            <td><label>Thành tiền</label></td>
            <td><label>Thao tác</label></td>
        </tr>
        <?php $count = 1 ?>
        @foreach (Cart::content() as $key => $cart)
            <tr>
                <td>{!! $count++ !!}</td>
                <td>{!! $cart->name !!}</td>
                <td>{!! $cart->qty !!}</td>
                <td>{!! number_format($cart->price) !!}</td>
                <td>
                    {!! number_format($cart->subtotal) !!}</td>
                <td>
                <a href="{!! route('user.cart.deleteItem', $cart->rowId) !!}">Xóa</a></td>
            </tr>
        @endforeach

        <div style="text-align: center; margin-top: 20px;">
            <h4 class="col-lg-4">Tổng giá: <span style="color: red;">
                {!! Cart::subtotal() !!}</span> đồng</h4>
            <p style="margin-left: 70px;" class="col-lg-3"></p>
            <h4 style="margin: 20px 20px;" class="col-lg-4"><a href="{!! route('user.order.addOrder') !!}">Xác nhận mua hàng</a></h4>
        </div>
    </table>
</div>
@stop
