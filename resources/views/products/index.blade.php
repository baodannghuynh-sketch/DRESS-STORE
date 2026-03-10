@extends('layouts.app')

@section('content')

<section style="
    background:#f6f6f6;
    padding:120px 40px;
    min-height:100vh;
">

    <h2 style="
        text-align:center;
        letter-spacing:6px;
        margin-bottom:80px;
        color:#111;
        font-weight:300;
        font-size:32px;
    ">
        COLLECTIONS
    </h2>

    <div style="
        max-width:1300px;
        margin:auto;
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
        gap:40px;
    ">
        @foreach($products as $p)
        <div style="
            background:#fff;
            border-radius:18px;
            padding:22px;
            display:flex;
            flex-direction:column;
            height:100%;
            box-shadow:0 20px 40px rgba(0,0,0,.08);
            transition:.35s ease;
        "
        onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 30px 60px rgba(0,0,0,.15)'"
        onmouseout="this.style.transform='none';this.style.boxShadow='0 20px 40px rgba(0,0,0,.08)'"
        >

            {{-- IMAGE --}}
            @if($p->image)
                <div style="
                    width:100%;
                    height:260px;
                    background:linear-gradient(145deg,#f5f5f5,#ffffff);
                    border-radius:14px;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    margin-bottom:22px;
                ">
                    <img src="{{ asset('products/'.$p->image) }}"
                         style="
                            width:100%;
                            height:100%;
                            object-fit:contain;
                            transition:.3s;
                         ">
                </div>
            @else
                <div style="
                    width:100%;
                    height:260px;
                    background:#f0f0f0;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    color:#aaa;
                    margin-bottom:22px;
                    border-radius:14px;
                ">
                    NO IMAGE
                </div>
            @endif

            {{-- CONTENT --}}
            <div style="flex:1;text-align:center;">
                <h3 style="
                    margin:10px 0 12px;
                    color:#111;
                    font-size:17px;
                    font-weight:400;
                    min-height:44px;
                ">
                    {{ $p->name }}
                </h3>

                <p style="
                    color:#b58e3e;
                    font-size:16px;
                    font-weight:500;
                    margin-bottom:26px;
                ">
                    {{ number_format($p->price) }} đ
                </p>
            </div>

            {{-- BUTTON --}}
            <a href="{{ route('products.detail', $p->slug) }}"
               style="
                    display:block;
                    text-align:center;
                    padding:12px 0;
                    border:1px solid #b58e3e;
                    color:#b58e3e;
                    text-decoration:none;
                    border-radius:30px;
                    font-size:13px;
                    letter-spacing:1px;
                    transition:.3s;
               "
               onmouseover="this.style.background='#b58e3e';this.style.color='#fff'"
               onmouseout="this.style.background='transparent';this.style.color='#b58e3e'"
            >
                XEM CHI TIẾT
            </a>
        </div>
        @endforeach
    </div>

</section>

@endsection
