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
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
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
    <h1>Upload File Ujian</h1>
    {!! form()->POST(route('dosen.store'))->multipart() !!}
        <h3>Mata Kuliah</h3>
    <input type = "hidden" name = "user_id" value = "{{Auth::user()->id}}">
    <input type = "hidden" name = "user_name" value = "{{Auth::user()->name}}">
        <div class="field">
            <select name="mata_kuliah_id">
                <option value="">Pilih Mata Kuliah</option>
                @foreach($matakuliahh as $matakuliah)
                <option value="{{$matakuliah->id}}">{{$matakuliah->nama}}</option>
                @endforeach
            </select>
            <h3>Berapa Kali Ujian</h3>
            <div class="field">
                <label></label>
                <input type="text" name="total_ujian">
            </div>
            <h3>Jenis Ujian</h3>
            <select name="jenis_ulangan_id">
                <option value="">Pilih Jenis Ujian</option>
                @foreach($jenisujian as $jenisujiann)
                <option value="{{$jenisujiann->id}}">{{$jenisujiann->nama}}</option>
                @endforeach
            </select>
            <h3>Tanggal Ujian</h3>
            <div class="ui calendar" id="example2">
                <div class="ui input left icon">
                    <i class="calendar icon"></i>
                    <input type="text" placeholder="Date" name="tanggal_ujian">
                    <script>
                        $('#example2').calendar({
                            type: 'date',
                            formatter: {
                                date: function (date, settings) {
                                    if (!date) return '';
                                    var day = date.getDate() + '';
                                    if (day.length < 2) {
                                        day = '0' + day;
                                    }
                                    var month = (date.getMonth() + 1) + '';
                                    if (month.length < 2) {
                                        month = '0' + month;
                                    }
                                    var year = date.getFullYear();
                                    return year + '/' + month + '/' + day;
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
        <h3>Jam</h3>
        <div class="ui form">
            <div class="two fields">
                <div class="field">
                    <label>Jam Mulai</label>
                    <div class="ui calendar" id="example3">
                        <div class="ui input left icon">
                            <i class="time icon"></i>
                            <input type="text" placeholder="Time" name="jam_mulai_ujian">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <label>Jam Selesai</label>
                    <div class="ui calendar" id="example6">
                        <div class="ui input left icon">
                            <i class="time icon"></i>
                            <input type="text" placeholder="Time" name="jam_selesai_ujian">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h3>Durasi Ujian</h3>
        <div class="field">
            <label></label>
            <input type="text" name="durasi_ujian" id="doc">
        </div>
        <div>
            <h3>Upload Soal Ujian</h3>
            <input type="file" (change)="fileEvent($event)" class="inputfile" id="embedpollfileinput" name="file_soal_id"/>
        </div>

    <script>
        $('#document').ready(function(){

            // client id of the project

            var clientId = "825706679029-nbfo1ovl82lfour6bsi631ph2u71qm3p.apps.googleusercontent.com";

            // redirect_uri of the project

            var redirect_uri = "http://localhost:8000/dosen/create";

            // scope of the project

            var scope = "https://www.googleapis.com/auth/drive";

            // the url to which the user is redirected to

            var url = "";


            // this is event click listener for the button

            $("#login").click(function(){

                // this is the method which will be invoked it takes four parameters

                signIn(clientId,redirect_uri,scope,url);

            });

            function signIn(clientId,redirect_uri,scope,url){

                // the actual url to which the user is redirected to

                url = "https://accounts.google.com/o/oauth2/v2/auth?redirect_uri="+redirect_uri
                    +"&prompt=consent&response_type=code&client_id="+clientId+"&scope="+scope
                    +"&access_type=offline";

                // this line makes the user redirected to the url

                window.location = url;




            }



        });
    </script>

        <br>
        <br>

        <div>
            <button class="ui green button">Submit</button>
        </div>

        <script>
            $('#example1').calendar();
            $('#example3').calendar({
                type: 'time'
            });
            $('#example6').calendar({
                type: 'time'
            });
            $('#rangestart').calendar({
                type: 'date',
                endCalendar: $('#rangeend')
            });
            $('#rangeend').calendar({
                type: 'date',
                startCalendar: $('#rangestart')
            });
            $('#example4').calendar({
                startMode: 'year'
            });
            $('#example5').calendar();
            $('#example7').calendar({
                type: 'month'
            });
            $('#example8').calendar({
                type: 'year'
            });
            $('#example9').calendar();
            $('#example10').calendar({
                on: 'hover'
            });
            var today = new Date();
            $('#example11').calendar({
                minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate() - 5),
                maxDate: new Date(today.getFullYear(), today.getMonth(), today.getDate() + 5)
            });
            $('#example12').calendar({
                monthFirst: false
            });
            $('#example13').calendar({
                monthFirst: false,
                formatter: {
                    date: function (date, settings) {
                        if (!date) return '';
                        var day = date.getDate();
                        var month = date.getMonth() + 1;
                        var year = date.getFullYear();
                        return day + '/' + month + '/' + year;
                    }
                }
            });
            $('#example14').calendar({
                inline: true
            });
            $('#example15').calendar();
        </script>





    {!! form()->close() !!}
</div>

</body>
</html>
