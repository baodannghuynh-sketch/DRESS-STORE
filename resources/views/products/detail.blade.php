@extends('layouts.app')

@section('content')

<section style="
    background:#f6f6f6;
    padding:140px 60px;
    min-height:100vh;
">

    <div style="
        max-width:1200px;
        margin:auto;
        background:#fff;
        border-radius:28px;
        padding:60px;
        box-shadow:0 40px 80px rgba(0,0,0,.08);
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:70px;
        align-items:center;
    ">

        {{-- IMAGE --}}
        <div style="text-align:center;">
            @if($product->image && file_exists(public_path('products/'.$product->image)))
                <div style="
                    background:linear-gradient(145deg,#f5f5f5,#ffffff);
                    border-radius:24px;
                    padding:30px;
                ">
                    <img src="{{ asset('products/'.$product->image) }}"
                         style="
                            width:100%;
                            max-height:420px;
                            object-fit:contain;
                         ">
                </div>
            @else
                <div style="
                    width:100%;
                    height:420px;
                    background:#f0f0f0;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    color:#aaa;
                    border-radius:24px;
                ">
                    NO IMAGE
                </div>
            @endif
        </div>

        {{-- INFO --}}
        <div>
            <h1 style="
                font-size:36px;
                font-weight:300;
                margin-bottom:24px;
                color:#111;
                line-height:1.4;
            ">
                {{ $product->name }}
            </h1>

            <p style="
                color:#b58e3e;
                font-size:26px;
                font-weight:500;
                margin-bottom:30px;
            ">
                {{ number_format($product->price) }} đ
            </p>

            <p style="
                font-size:16px;
                color:#555;
                line-height:1.8;
                margin-bottom:40px;
            ">
                {{ $product->description }}
            </p>

            <form method="POST" action="{{ route('cart.add', $product->id) }}">
                @csrf
                <button style="
                    padding:16px 48px;
                    border-radius:40px;
                    border:1px solid #b58e3e;
                    background:#b58e3e;
                    color:#fff;
                    font-size:14px;
                    letter-spacing:1px;
                    cursor:pointer;
                    transition:.3s;
                "
                onmouseover="this.style.opacity='0.85'"
                onmouseout="this.style.opacity='1'"
                >
                    THÊM VÀO GIỎ
                </button>
            </form>
        </div>

    </div>

</section>

@endsection
