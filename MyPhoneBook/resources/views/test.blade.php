<!DOCTYPE html>
<html>
    <head>
        <title>Yo</title>
    </head>
    <body>
        @isset($yo)
            <p>test {{ $yo }}</p>
            <p>here</p>
        @else
            <p>Nothing to witness</p>
        @endisset
    </body>
</html>