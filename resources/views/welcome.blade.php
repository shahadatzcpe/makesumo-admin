<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body class="antialiased">

    <canvas width="512" height="512" id="canvas"></canvas>

    <script>

        var canvas = document.getElementById("canvas");
        var ctx = canvas.getContext("2d");

        var img1 = loadImage('http://upload.wikimedia.org/wikipedia/en/2/24/Lenna.png', main);
        var img2 = loadImage('http://introcs.cs.princeton.edu/java/31datatype/peppers.jpg', main);

        var imagesLoaded = 0;
        function main() {
            imagesLoaded += 1;

            if(imagesLoaded == 2) {
                // composite now
                ctx.drawImage(img1, 0, 0);

                ctx.globalAlpha = 0.5;
                ctx.drawImage(img2, 0, 0);
            }
        }

        function loadImage(src, onload) {
            // http://www.thefutureoftheweb.com/blog/image-onload-isnt-being-called
            var img = new Image();

            img.onload = onload;
            img.src = src;

            return img;
        }
    </script>

    </body>
</html>
