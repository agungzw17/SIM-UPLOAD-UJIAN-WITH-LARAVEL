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
<div class="ui pointing menu">
    <a  class="item" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        <h1>{{ Auth::user()->name }}</h1>
    </a>

    <a class="active item" style="margin-left: 80%;" href="/">
        <a class="item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            <h1>{{ __('Logout') }}</h1>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </a>


</div>


<div class="ui container">
<div class="ui grid two columns stackable">
    <div class="ui column">
            <table class="ui celled table">
                <h1>List Dosen</h1>
                <thead>
                <tr><th>Nama</th>
                </tr></thead>
                <tbody>
                @foreach($dosen as $userr)

                    <tr>
                        <td>{{$userr->name}}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
{{--    <div class="ui column">--}}
{{--        <table class="ui celled table">--}}
{{--            <h1>Sudah upload</h1>--}}
{{--            <thead>--}}
{{--            <tr><th>Upload soal</th>--}}
{{--            </tr></thead>--}}
{{--            <tbody>--}}
{{--            @foreach($sudahupload as $userr)--}}

{{--                <tr>--}}
{{--                    <td>{{$userr->user_id >= 1 ? 'Sudah' : 'Belum'}}</td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}
    <div class="ui column">
            <table class="ui celled table">
                <h1>List Panitia</h1>
                <thead>
                <tr><th>Nama</th>
                </tr></thead>
                <tbody>
                @foreach($panitia as $userr)

                    <tr>
                        <td>{{$userr->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
<table class="ui celled table">
    <h1>Dosen yang sudah meng-Upload</h1>


    <thead>
    <tr><th>Dosen</th>
        <th>Matakuliah</th>
        <th>Download File Ujian</th>
    </tr></thead>
    <tbody>
    @foreach($uploadFile as $upload)
    <tr>
        <td>{{$upload->user_name}}</td>
        <td>{{$upload->matakuliahh->nama}}</td>
        <td>
{{--            <a href="/download"><button>{{$upload->file_soal_id >= 1 ? 'Download' : 'Belum Upload'}}</button></a>--}}
            <a href="{{ route('downloadfile', $upload->file_soal_id) }}"><button>Download</button></a>

        </td>
    </tr>
        @endforeach
    </tbody>
</table>




</div>
</body>
</html>
