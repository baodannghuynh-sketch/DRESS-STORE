@extends('layouts.app')

@section('content')

<style>
/* HERO */
.contact-hero {
    background: #0b0b0b;
    color: #c9a24d;
    padding: 120px 60px;
    text-align: center;
}

.contact-hero h1 {
    font-size: 48px;
    letter-spacing: 6px;
    margin-bottom: 16px;
    font-weight: 400;
}

.contact-hero p {
    color: #ddd;
    letter-spacing: 2px;
}

/* SECTION */
.contact-section {
    padding: 100px 60px;
    background: #f6f5f3;
}

/* INFO BOX */
.contact-info {
    background: linear-gradient(135deg, #c9a24d, #b8963c);
    padding: 50px;
    border-radius: 28px;
    box-shadow: 0 30px 80px rgba(0,0,0,.15);
    color: #fff;
}

.contact-info h3 {
    font-size: 32px;
    margin-bottom: 28px;
    letter-spacing: 2px;
}

.contact-info p {
    font-size: 16px;
    margin-bottom: 14px;
}

/* FORM BOX */
.contact-box.gold {
    background: #fff;
    padding: 60px;
    border-radius: 28px;
    box-shadow: 0 30px 80px rgba(0,0,0,.12);
}

.contact-box.gold h3 {
    font-size: 32px;
    margin-bottom: 30px;
    letter-spacing: 2px;
    color: #0b0b0b;
}

/* INPUT */
.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 16px 20px;
    border-radius: 16px;
    border: 1px solid #ddd;
    font-size: 15px;
    margin-bottom: 20px;
    background: #fafafa;
}

.contact-form input:focus,
.contact-form textarea:focus {
    border-color: #c9a24d;
    outline: none;
}

/* BUTTON */
.contact-form button {
    background: #0b0b0b;
    color: #c9a24d;
    padding: 16px 48px;
    border-radius: 40px;
    border: none;
    letter-spacing: 4px;
    font-size: 13px;
    transition: .4s;
}

.contact-form button:hover {
    background: #c9a24d;
    color: #0b0b0b;
}


</style>

{{-- HERO --}}

<section class="contact-hero">
    <h1>CONTACT US</h1>
    <p>DANIELLE COUTURE – Bridal & Couture Dresses</p>
</section>

{{-- CONTENT --}}
<section class="contact-section">
    <div class="container">
        <div class="row g-5 align-items-center">


            {{-- THÔNG TIN --}}
            <div class="col-md-5">
                <div class="contact-box contact-info">
                    <h3>Danielle Couture</h3>
                    <p>📍 Address: 123 Bridal Street, Ho Chi Minh City</p>
                    <p>📞 Phone: 0909 123 456</p>
                    <p>✉ Email: contact@daniellecouture.com</p>
                    <p>🕒 Open: Mon – Sat | 9:00 – 18:00</p>
                </div>
            </div>

            {{-- FORM --}}
            <div class="col-md-7">
                <div class="contact-box-gold contact-form">

                    <form>
                        <input type="text" placeholder="Your Name">
                        <input type="email" placeholder="Your Email">
                        <textarea rows="5" placeholder="Your Message"></textarea>
                        <button type="submit">SEND MESSAGE</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
