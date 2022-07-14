<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataSiswa</title>
</head>

<body>
    <h1>IF ELSE</h1>
    <ol>
        <li>{{$siswa}}</li>
    </ol>

    <h1>LOOP FOR</h1>
    <ol>
        @for ($i = 0; $i < 5; $i++) <li>DEVELOPMENT FRAMEWORK</br></li> @endfor
    </ol>

    <h1>FOREACH</h1>
    <ol>
        @foreach($siswa1 as $row)
        <li>
            {{$row}}
        </li>
        @endforeach
    </ol>
</body>

</html>