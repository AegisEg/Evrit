<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@if(isset($title))  {{$title}} - @endif Escoboom</title> 
        @include("layouts.parts.assets")  
              
    </head>
    <body>
        @include("layouts.parts.header_main")
        <div class="content">
        @yield("content")
        </div>
        @include("layouts.parts.footer")
    </body>
</html>