@extends('layouts.app')

@section('content')

<style>
.search-title {
    text-align:center;
    letter-spacing:4px;
    margin-bottom:50px;
    font-weight:300;
}

.search-grid {
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(280px,1fr));
    gap:40px;
}

.product-card {
    background:#fff;
    border-radius:18px;
    padding:24px;
    box-shadow:0 20px 40px rgba(0,0,0,.08);
    text-align:center;
    transition:.4s;
}

.product-card:hover {
    transform:translateY(-6px);
    box-shadow:0 30px 60px rgba(0,0,0,.12);
}

.product-img {
    width:100%;
    height:360px;
    object-fit:contain;
    background:#f9f9f9;
    border-radius:14px;
}

.product-name {
    margin-top:18px;
    font-size:15px;
    letter-spacing:1px;
}

.product-price {
    margin-top:6px;
    color:#b58e3e;
    font-weight:600;
}

.btn-outline {
    display:inline-block;
    margin-top:14px;
    padding:8px 26px;
    border-radius:30px;
    border:1px solid #b58e3e;
    color:#b58e3e;
    font-size:12px;
    letter-spacing:1px;
    text-decoration:none;
    transition:.3s;
}

.btn-outline:hover {
    background:#b58e3e;
    color:#fff;
}
</style>

<div class="container mt-5 mb-5">

    <h2 class="search-title">
        KẾT QUẢ TÌM KIẾM
    </h2>

    <p style="text-align:center;margin-bottom:40px;">
        Từ khóa: <strong>{{ $q }}</strong>
    </p>

    @if($products->isEmpty())
        <p style="text-align:center;">Không tìm thấy sản phẩm phù hợp.</p>
    @else
        <div class="search-grid">

            @foreach($products as $p)
                <div class="product-card">

                    {{-- IMAGE --}}
                    <img src="/products/{{ $p->image }}"
                         class="product-img">

                    {{-- NAME --}}
                    <div class="product-name">
                        {{ $p->name }}
                    </div>

                    {{-- PRICE --}}
                    <div class="product-price">
                        {{ number_format($p->price) }} đ
                    </div>

                    {{-- ACTION --}}
                    <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;">
                        <a href="{{ route('products.detail', $p->slug) }}" class="btn-outline">
                            XEM CHI TIẾT
                        </a>

                        <form action="{{ route('cart.add', $p->id) }}" method="POST">
                            @csrf
                            <button class="btn-outline" type="submit">
                                THÊM GIỎ HÀNG
                            </button>
                        </form>
                    </div>

                </div>
            @endforeach

        </div>
    @endif

</div>

@endsection
