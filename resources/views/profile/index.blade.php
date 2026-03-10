@extends('layouts.app')

@section('content')

<div style="
    max-width:600px;
    margin:120px auto;
    background:#fff;
    padding:50px;
    border-radius:20px;
    box-shadow:0 20px 60px rgba(0,0,0,.08);
">

    <h2 style="
        font-family:'Playfair Display',serif;
        letter-spacing:3px;
        margin-bottom:30px;
        color:#111;
        text-align:center;
    ">
        MY PROFILE
    </h2>

    <form method="POST" action="/profile/update">
        @csrf

        <label style="letter-spacing:2px;font-size:13px;">NAME</label>
        <input type="text"
               name="name"
               value="{{ session('user')->name }}"
               style="
                    width:100%;
                    padding:14px;
                    border-radius:12px;
                    border:1px solid #ddd;
                    margin-bottom:24px;
               ">

        <label style="letter-spacing:2px;font-size:13px;">EMAIL</label>
        <input type="email"
               value="{{ session('user')->email }}"
               disabled
               style="
                    width:100%;
                    padding:14px;
                    border-radius:12px;
                    border:1px solid #ddd;
                    margin-bottom:36px;
                    background:#f5f5f5;
               ">

        <button type="submit"
                style="
                    width:100%;
                    padding:14px;
                    border-radius:40px;
                    border:none;
                    background:#000;
                    color:#fff;
                    letter-spacing:3px;
                    font-size:13px;
                ">
            UPDATE PROFILE
        </button>
    </form>

</div>

@endsection
