<footer style="
    background:#000;
    padding:100px 30px 40px;
    color:#ddd;
">

    {{-- SEARCH --}}
    <div style="max-width:1200px;margin:0 auto 80px;text-align:center;">
        <form action="/search" method="GET"
              style="position:relative;max-width:520px;margin:auto;">
            <input type="text"
                   name="q"
                   placeholder="Search"
                   style="
                        width:100%;
                        padding:14px 64px 14px 20px;
                        background:transparent;
                        border:1px solid rgba(201,162,77,.6);
                        color:#fff;
                        font-size:14px;
                        letter-spacing:2px;
                        outline:none;
                        border-radius:40px;
                        font-family:'Playfair Display','Times New Roman',serif;
                   ">

            <button type="submit"
                    style="
                        position:absolute;
                        right:10px;
                        top:50%;
                        transform:translateY(-50%);
                        width:44px;
                        height:44px;
                        border-radius:50%;
                        border:1.5px solid #c9a24d;
                        background:transparent;
                        color:#c9a24d;
                        font-family:'Playfair Display','Didot','Times New Roman',serif;
                        font-size:14px;
                        letter-spacing:1px;
                        cursor:pointer;
                        transition:.35s;
                    "
                    onmouseover="this.style.background='#c9a24d';this.style.color='#000'"
                    onmouseout="this.style.background='transparent';this.style.color='#c9a24d'"
            >
                DN
            </button>
        </form>
    </div>

    {{-- CONTENT --}}
    <div style="
        max-width:1200px;
        margin:auto;
        display:grid;
        grid-template-columns:2fr 1fr;
        gap:120px;
    ">

        {{-- CONTACT --}}
        <div>
            <h2 style="
                font-size:28px;
                font-weight:400;
                margin-bottom:30px;
                letter-spacing:2px;
                color:#fff;
            ">
                Contact Us
            </h2>

            <p style="line-height:2;">
                📍 Võ Văn Kiệt, Phường Nguyễn Thái Bình,<br>
                Quận 1, TP. Hồ Chí Minh
            </p>

            <p style="margin-top:14px;">
                ☎ (+84) 335 808 265 <span style="color:#aaa;">(Vietnam only)</span>
            </p>

            <p style="margin-top:14px;">
                🌐 https://www.daniellecouture.com
            </p>

            {{-- SOCIAL --}}
            <div style="
                display:flex;
                gap:18px;
                margin-top:26px;
                font-size:18px;
                color:#c9a24d;
            ">
                <i class="fa-solid fa-envelope"></i>
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-pinterest-p"></i>
            </div>
        </div>

        {{-- EXPLORE --}}
        <div>
            <h2 style="
                font-size:28px;
                font-weight:400;
                margin-bottom:30px;
                letter-spacing:2px;
                color:#fff;
            ">
                Explore
            </h2>

            <ul style="
                list-style:none;
                padding:0;
                line-height:3;
                letter-spacing:1px;
            ">
                <li>Collections</li>
                <li>Celebrities</li>
                <li>Highlight Events</li>
                <li>Gallery</li>
                <li>News</li>
            </ul>
        </div>

    </div>

    {{-- BOTTOM --}}
    <div style="
        margin-top:80px;
        text-align:center;
        border-top:1px solid #222;
        padding-top:30px;
        font-size:12px;
        color:#888;
        letter-spacing:1px;
    ">
        © 2025 DANIELLE · THIS WEBSITE IS COPIED BY JOLIPOLI COUTURE. BECAUSE IT IS A FAKE WEBSITE, IT IS NOT SUITABLE FOR COMMERCIAL USE OR ANY OTHER PURPOSES.
    </div>

</footer>
