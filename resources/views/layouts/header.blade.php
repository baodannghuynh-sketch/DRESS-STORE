<header style="
    background:#fff;
    border-bottom:1px solid #eee;
    position:sticky;
    top:0;
    z-index:1000;
">
    <div style="
        max-width:1300px;
        margin:auto;
        display:flex;
        align-items:center;
        justify-content:space-between;
        padding:18px 24px;
        gap:30px;
    ">

        {{-- LOGO IMAGE --}}

            <div class="dn-logo">
        <div class="oval rotate-slow">
            <span>DN</span>
        </div>
        <div class="brand">DANIELLE</div>
        <div class="sub">by Bảo Đan</div>
        </div>

        <style>
            :root{
            --gold:#c9a24d;
            }

            /* HEADER CONTAINER GỌN LẠI */
            header > div{
            padding:10px 24px !important; /* ↓ từ 18px */
            }

            /* LOGO WRAPPER */
            .dn-logo{
            text-align:center;
            font-family:"Playfair Display","Didot","Times New Roman",serif;
            color:var(--gold);
            line-height:1;
            }

            /* OVAL NHỎ LẠI */
            .oval{
            width:64px;        /* ↓ từ 120 */
            height:88px;       /* ↓ từ 160 */
            border:1.5px solid var(--gold);
            border-radius:50%;
            margin:0 auto 6px; /* ↓ margin */
            display:flex;
            align-items:center;
            justify-content:center;
            }

            /* DN NHỎ LẠI */
            .oval span{
            font-size:28px;    /* ↓ từ 64 */
            letter-spacing:2px;
            font-weight:500;
            }

            /* BRAND */
            .brand{
            font-size:12px;    /* ↓ từ 22 */
            letter-spacing:4px;
            margin-top:2px;
            }

            /* SUB */
            .sub{
            font-size:9px;     /* ↓ từ 12 */
            letter-spacing:1.5px;
            margin-top:2px;
            opacity:.85;
            }

            /* XOAY CHẬM HƠN (NHẸ NHÀNG) */
            .rotate-slow{
            animation: spin 24s linear infinite;
            }

            @keyframes spin{
            from{ transform:rotate(0deg); }
            to{ transform:rotate(360deg); }
            }
        </style>





        {{-- NAV --}}
        <nav style="
            display:flex;
            gap:36px;
            font-size:13px;
            letter-spacing:3px;
            font-weight:500;
        ">
            @php
                $linkStyle = "color:#111;text-decoration:none;transition:.3s;";
            @endphp

            <a href="/" style="{{ $linkStyle }}"
               onmouseover="this.style.color='#b58e3e'"
               onmouseout="this.style.color='#111'">HOME</a>

            <a href="/product" style="{{ $linkStyle }}"
               onmouseover="this.style.color='#b58e3e'"
               onmouseout="this.style.color='#111'">PRODUCTS</a>

            <a href="/cart" style="{{ $linkStyle }}"
               onmouseover="this.style.color='#b58e3e'"
               onmouseout="this.style.color='#111'">CART</a>

            <a href="/orders" style="{{ $linkStyle }}"
               onmouseover="this.style.color='#b58e3e'"
               onmouseout="this.style.color='#111'">ORDERS</a>
            <a href="/contact" style="{{ $linkStyle }}"
               onmouseover="this.style.color='#b58e3e'"
               onmouseout="this.style.color='#111'">CONTACT</a>

        </nav>

        {{-- SEARCH --}}
        <form action="/search" method="GET" class="search-dn"
            style="
                flex:1;
                max-width:280px;
                position:relative;
            ">
            <input type="text"
                name="q"
                placeholder="Search"
                style="
                        width:100%;
                        padding:8px 56px 8px 14px;
                        border:1px solid rgba(201,162,77,.6);
                        border-radius:30px;
                        font-size:13px;
                        outline:none;
                        font-family:'Playfair Display','Times New Roman',serif;
                ">

            <button type="submit"
                    style="
                        position:absolute;
                        right:6px;
                        top:50%;
                        transform:translateY(-50%);
                        width:38px;
                        height:38px;
                        border-radius:50%;
                        border:1.5px solid #c9a24d;
                        background:#fff;
                        color:#c9a24d;
                        font-family:'Playfair Display','Didot','Times New Roman',serif;
                        font-size:14px;
                        letter-spacing:1px;
                        cursor:pointer;
                        transition:.35s;
                    "
                    onmouseover="this.style.background='#c9a24d';this.style.color='#fff'"
                    onmouseout="this.style.background='#fff';this.style.color='#c9a24d'"
            >
                DN
            </button>
        </form>



        {{-- AUTH --}}
<div style="display:flex;align-items:center;gap:12px;">

    @if(session('user'))
        {{-- PROFILE --}}
        <a href="/profile"
           style="
                padding:8px 20px;
                border-radius:30px;
                border:1px solid #c9a24d;
                color:#c9a24d;
                text-decoration:none;
                font-size:13px;
                transition:.3s;
           "
           onmouseover="this.style.background='#c9a24d';this.style.color='#fff'"
           onmouseout="this.style.background='transparent';this.style.color='#c9a24d'">
            {{ session('user')->name }}
        </a>

        {{-- LOGOUT --}}
        <a href="{{ route('logout') }}"
           style="
                padding:8px 22px;
                border-radius:30px;
                border:1px solid #b58e3e;
                color:#b58e3e;
                text-decoration:none;
                font-size:13px;
                transition:.3s;
           "
           onmouseover="this.style.background='#b58e3e';this.style.color='#fff'"
           onmouseout="this.style.background='transparent';this.style.color='#b58e3e'">
            ĐĂNG XUẤT
        </a>
    @else
        <a href="{{ route('login') }}"
           style="
                padding:8px 22px;
                border-radius:30px;
                border:1px solid #b58e3e;
                color:#b58e3e;
                text-decoration:none;
                font-size:13px;
                transition:.3s;
           "
           onmouseover="this.style.background='#b58e3e';this.style.color='#fff'"
           onmouseout="this.style.background='transparent';this.style.color='#b58e3e'">
            ĐĂNG NHẬP
        </a>
    @endif

</div>


    </div>
</header>
