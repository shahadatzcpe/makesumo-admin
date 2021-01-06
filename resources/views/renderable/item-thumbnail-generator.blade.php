<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>
    <body>
        @foreach($images as $img)
            <div style="width: 200px; height: 200px; position: absolute; top: 0px; overflow: hidden; display: flex; justify-content: center;align-items: center">
                <img src="{{ $img }}" style="max-width: 100%; max-height: 100%; mix-blend-mode: multiply">
            </div>
        @endforeach
    </body>
</html>
