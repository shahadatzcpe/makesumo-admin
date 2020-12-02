<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>
    <body>
        @foreach($images as $img)
            <img src="{{ $img }}" style="max-width: 200px; max-height: 200px; position: absolute; top: 0px">
        @endforeach
    </body>
</html>
