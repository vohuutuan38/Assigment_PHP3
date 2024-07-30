@extends('layouts.client')

@section('css')
    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin:
                0;
        }
    </style>
@endsection

@section('content')
    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">cart</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- cart main wrapper start -->
        <div class="cart-main-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="pro-thumbnail">Thumbnail</th>
                                                <th class="pro-title">Product</th>
                                                <th class="pro-price">Price</th>
                                                <th class="pro-quantity">Quantity</th>
                                                <th class="pro-subtotal">Total</th>
                                                <th class="pro-remove">Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cart as $item)
                                                <tr data-id="{{ $item['id'] }}">
                                                    <td class="pro-thumbnail"><a href="#"><img class="img-fluid"
                                                                src="{{ asset('storage/' . $item['avatar']) }}"
                                                                alt="Product" /></a></td>
                                                    <td>{{ $item['name'] }}</td>
                                                    <td>${{ number_format($item['price']) }}</td>
                                                    <td>
                                                        <div class="quantity">
                                                            <div class="pro-qty">
                                                                <input type="number" name="quantities[{{ $item['id'] }}]"
                                                                    value="{{ $item['quantity'] }}" min="1">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="pro-subtotal" data-price="{{ $item['price'] }}">
                                                        ${{ number_format($item['quantity'] * $item['price']) }}
                                                    </td>
                                                    <td class="pro-remove">
                                                        <form action="{{ route('cart.remove', $item['id']) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit"><i class="fa fa-trash-o"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="cart-update-option d-block d-md-flex justify-content-between">
                                        <div class="cart-update">
                                            <input type="submit" value="Update Cart" class="btn btn-sqr">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 ml-auto">
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h6>Cart Totals</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>Sub Total</td>
                                                <td class="total-amount">${{ $sum }}</td>
                                            </tr>
                                            <tr>
                                                <td>Shipping</td>
                                                <td>$30</td>
                                            </tr>
                                            <tr class="total">
                                                <td>Total</td>
                                                <td class="total-sum">${{ $sum + 30 }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <a href="checkout.html" class="btn btn-sqr d-block">Proceed Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
    </main>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lấy tất cả các trường input số lượng
            const quantityInputs = document.querySelectorAll('input[type="number"]');
            // console.log(quantityInputs);
            quantityInputs.forEach(input => {
                input.addEventListener('input', function() {
                    console.log('Input changed:', this.value);

                    const quantity = parseFloat(this.value) || 0;
                    const row = this.closest('tr');
                    const price = parseFloat(row.querySelector('.pro-subtotal').dataset.price);
                    const subtotal = quantity * price;

                    console.log('Quantity:', quantity, 'Price:', price, 'Subtotal:', subtotal);

                    row.querySelector('.pro-subtotal').textContent = `$${subtotal.toFixed(2)}`;
                    updateCartTotal();
                });
            });

            function updateCartTotal() {
                // Lấy tất cả các giá trị subtotal
                const subtotals = document.querySelectorAll('.pro-subtotal');
                let total = 0;

                subtotals.forEach(subtotal => {
                    total += parseFloat(subtotal.textContent.replace('$', '')) || 0;
                });

                // Cập nhật tổng số tiền
                document.querySelector('.total-amount').textContent = `$${total.toFixed(2)}`;
                document.querySelector('.total-sum').textContent = `$${(total+30).toFixed(2)}`;
            }
        });
    </script>
@endsection
