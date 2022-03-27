<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<ul>
        <form action="/show" method="post">
            @csrf
            <input type="text" name="name" id="name">
            <button>Send</button>
        </form>
        @if(isset($name))
        <h1>{{$name}}</h1>
        @endif
</body>
</html>