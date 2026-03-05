@extends('layouts.app')

@section('content')

{{-- HERO / GIỚI THIỆU --}}
<section style="
    position:relative;
    padding:160px 20px;
    text-align:center;
    background:
        linear-gradient(
            rgba(0,0,0,.45),
            rgba(0,0,0,.45)
        ),
        url('{{ asset('products/1766551404_Wedding-Dress.jpg') }}') center/cover no-repeat;
">
    <h1 style="
        font-size:56px;
        letter-spacing:10px;
        font-weight:300;
        color:#fff;
        margin-bottom:20px;
        position:relative;
        z-index:2;
    ">
        DANIELLE
    </h1>

    <p style="
        max-width:680px;
        margin:auto;
        font-size:18px;
        line-height:1.8;
        color:#e5e5e5;
        position:relative;
        z-index:2;
    ">
        Luxury Dresses – Nơi hội tụ của nghệ thuật, sự tinh tế và vẻ đẹp vượt chuẩn
    </p>
</section>

{{-- GIỚI THIỆU THƯƠNG HIỆU --}}
<section style="
    background:#000;
    padding:120px 20px;
">
    <div style="
        max-width:1200px;
        margin:auto;
        display:grid;
        grid-template-columns:1.2fr 1fr;
        gap:80px;
        align-items:center;
        color:#eaeaea;
    ">

        {{-- TEXT --}}
        <div>
            <h2 style="
                font-size:38px;
                font-weight:300;
                letter-spacing:6px;
                margin-bottom:30px;
                color:#fff;
            ">
                ABOUT DANIELLE
            </h2>

            <p style="
                font-size:16px;
                line-height:1.9;
                margin-bottom:24px;
                color:#d5d5d5;
            ">
                DANIELLE là thương hiệu váy cao cấp, nơi hội tụ giữa nghệ thuật thủ công tinh xảo,
                phom dáng chuẩn mực và cảm hứng couture vượt thời gian.
                Mỗi thiết kế không chỉ là một chiếc váy, mà là tuyên ngôn về vẻ đẹp,
                khí chất và sự tự tin của người phụ nữ hiện đại.
            </p>

            <p style="
                font-size:16px;
                line-height:1.9;
                margin-bottom:40px;
                color:#cfcfcf;
            ">
                Lấy cảm hứng từ những khoảnh khắc lộng lẫy nhất – váy cưới,
                dạ hội và các sự kiện thượng lưu – DANIELLE tạo nên những tác phẩm
                mang đậm dấu ấn cá nhân, được chăm chút đến từng chi tiết,
                giúp người mặc tỏa sáng theo cách riêng của mình.
            </p>

            <a href="/product"
               style="
                    display:inline-block;
                    padding:12px 36px;
                    border-radius:40px;
                    border:1px solid #b58e3e;
                    color:#b58e3e;
                    text-decoration:none;
                    font-size:13px;
                    letter-spacing:2px;
                    transition:.3s;
               "
               onmouseover="this.style.background='#b58e3e';this.style.color='#000'"
               onmouseout="this.style.background='transparent';this.style.color='#b58e3e'"
            >
                KHÁM PHÁ BỘ SƯU TẬP
            </a>
        </div>

        {{-- IMAGE --}}
        <div style="
            position:relative;
        ">
            <img src="{{ asset('products/1766552070_07-for-ELYSIAN-GLOW.jpg') }}"
                 alt="Danielle Couture"
                 style="
                    width:100%;
                    border-radius:18px;
                    box-shadow:0 30px 80px rgba(0,0,0,.6);
                 ">
        </div>

    </div>
</section>



{{-- SẢN PHẨM MỚI NHẤT --}}
<section style="
    padding:90px 20px;
    background:#fafafa;
">
    <div style="max-width:1200px;margin:auto;">

        <h2 style="
            text-align:center;
            letter-spacing:6px;
            font-weight:300;
            margin-bottom:70px;
            color:#222;
            font-size:32px;
        ">
            COLLECTIONS
        </h2>

        @if($featuredProducts->count() == 0)
            <p style="text-align:center;color:#888;">
                Chưa có sản phẩm nào.
            </p>
        @else
            <div style="
                display:grid;
                grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
                gap:40px;
            ">
                @foreach($featuredProducts as $p)
                    <div style="
                        background:#fff;
                        border-radius:18px;
                        overflow:hidden;
                        text-align:center;
                        box-shadow:0 20px 40px rgba(0,0,0,.08);
                        transition:.35s ease;
                    "
                    onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 30px 60px rgba(0,0,0,.15)'"
                    onmouseout="this.style.transform='none';this.style.boxShadow='0 20px 40px rgba(0,0,0,.08)'"
                    >

                        {{-- IMAGE --}}
                        <div style="
                            width:100%;
                            aspect-ratio:1/1;
                            background:linear-gradient(145deg,#f7f7f7,#ffffff);
                            display:flex;
                            align-items:center;
                            justify-content:center;
                            padding:18px;
                        ">
                            @if($p->image)
                                <img src="{{ asset('products/'.$p->image) }}"
                                     alt="{{ $p->name }}"
                                     style="
                                        width:100%;
                                        height:100%;
                                        object-fit:contain;
                                        transition:.3s;
                                     ">
                            @else
                                <span style="color:#aaa;">NO IMAGE</span>
                            @endif
                        </div>

                        {{-- INFO --}}
                        <div style="padding:26px;">
                            <h3 style="
                                font-size:17px;
                                font-weight:400;
                                color:#111;
                                margin-bottom:10px;
                                min-height:44px;
                            ">
                                {{ $p->name }}
                            </h3>

                            <p style="
                                font-size:16px;
                                font-weight:500;
                                color:#b58e3e;
                                margin-bottom:20px;
                            ">
                                {{ number_format($p->price) }} đ
                            </p>

                            <a href="{{ route('products.detail', $p->slug) }}"
                               style="
                                    display:inline-block;
                                    padding:10px 26px;
                                    border-radius:30px;
                                    font-size:13px;
                                    letter-spacing:1px;
                                    border:1px solid #b58e3e;
                                    color:#b58e3e;
                                    text-decoration:none;
                                    transition:.3s;
                               "
                               onmouseover="this.style.background='#b58e3e';this.style.color='#fff'"
                               onmouseout="this.style.background='transparent';this.style.color='#b58e3e'"
                            >
                                XEM CHI TIẾT
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif

    </div>
</section>

@endsection
