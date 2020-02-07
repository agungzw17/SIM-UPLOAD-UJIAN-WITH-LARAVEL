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
    <h1>INDEX</h1>
    <button class="ui red button"><a href="{{route('user.create')}}">Create</a></button>
    <br>
        <table class="ui celled table">
            <thead>
            <tr><th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>created_at</th>
                <th>updated_at</th>
            </tr></thead>
            <tbody>
            @if($users)

                @foreach($users as $user)

                    <tr>
                        <td>{{$user->id}}</td>
                        {{--                    <td>{{$user->photo ? $user->photo->file : 'no user photo'}}</td>--}}
                        {{--                    <td><img height="50" src="/images/{{$user->photo ? $user->photo->file : 'no user photo'}}" alt=""></td>--}}
                        {{--setelah diberi fungsi getphoto di model photo--}}
                        {{--<td><img height="50" src="{{$user->photo ? $user->photo->file : 'no user photo'}}" alt=""></td>--}}
+
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role_id}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                    </tr>

                @endforeach

            @endif
            </tbody>
        </table>

</div>
</body>
</html>
