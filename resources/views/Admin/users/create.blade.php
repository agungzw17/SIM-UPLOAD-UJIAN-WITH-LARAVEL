<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"
        type="text/css"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
    />
</head>
<body>
<div class="ui container">
    <div class="ui pointing menu">
        <a class="active item" style="margin-left: 48%;" href="/">
            <h1>Home</h1>
        </a>
    </div>
</div>
<div class="ui container">
    <h1>Buat akun</h1>
    {!! form()->POST(route('user.store'))->multipart() !!}

        @csrf
        <div class="field">
            <label>Nama</label>
            <input type="text" name="name">
        </div>
        <div class="field">
            <label>E-mail</label>
            <input type="email" placeholder="joe@schmoe.com" name="email">
        </div>

    {!! form()->select('role_id', $roles)->label('Role') !!}

        <div class="field">
            <label>Password</label>
            <input type="password" name="password">
        </div>
        <button class="ui button" type="submit">Submit</button>
    {!! form()->close() !!}
</div>
</body>
</html>
