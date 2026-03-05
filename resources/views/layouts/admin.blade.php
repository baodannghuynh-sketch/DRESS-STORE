<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>ADMIN PANEL</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #f4f6f9;
            color: #111;
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        aside {
            width: 240px;
            background: #111;
            color: #fff;
            padding: 30px 20px;
        }

        aside h2 {
            letter-spacing: 4px;
            font-weight: 400;
            text-align: center;
            margin-bottom: 40px;
        }

        aside nav a {
            display: block;
            padding: 12px 16px;
            margin-bottom: 10px;
            color: #ccc;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s;
        }

        aside nav a:hover {
            background: #b58e3e;
            color: #fff;
        }

        /* MAIN AREA */
        .main-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* TOPBAR */
        header {
            background: #fff;
            padding: 16px 30px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: flex-end;
        }

        header a {
            padding: 8px 20px;
            border-radius: 20px;
            border: 1px solid #b58e3e;
            color: #b58e3e;
            text-decoration: none;
            font-size: 13px;
            transition: .3s;
        }

        header a:hover {
            background: #b58e3e;
            color: #fff;
        }

        /* CONTENT */
        main {
            padding: 40px;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
        }

        th, td {
            padding: 14px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        th {
            background: #f8f8f8;
            font-size: 13px;
            letter-spacing: 1px;
            color: #555;
        }

        /* BUTTONS */
        .btn {
            padding: 8px 16px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 13px;
            display: inline-block;
        }

        .btn-add {
            background: #28a745;
            color: #fff;
        }

        .btn-edit {
            background: #ffc107;
            color: #111;
        }

        .btn-delete {
            background: #dc3545;
            color: #fff;
        }
    </style>
</head>

<body>

    {{-- SIDEBAR --}}
    <aside>
        <h2>ADMIN</h2>
        <nav>
            <a href="{{ route('admin.dashboard') }}">📊 Dashboard</a>

        </nav>
    </aside>

    {{-- MAIN --}}
    <div class="main-wrapper">

        {{-- TOP BAR --}}
        <header>
            <a href="{{ route('logout') }}">Đăng xuất</a>
        </header>

        {{-- CONTENT --}}
        <main>
            @yield('content')
        </main>

    </div>

</body>
</html>
