<script type="text/css">

    @import url(http://fonts.googleapis.com/css?family=Noto+Sans);

    {
        margin: 0;
        padding: 0;
    }

    #wrap {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background-color: #333;
        overflow: hidden;
    }

    #popup {
        position: absolute;
        width: 300px;
        height: auto;
        top: 50%; left: 50%;
        margin-left: -150px; margin-top: -100px;

        -webkit-perspective: 800px;
        -webkit-perspective-origin: 50% 50px;
        perspective: 800px;
        perspective-origin: 50% 50px;
    }

    .piece {
        background: rgba(95,144,222,0.5);
        float: left;
    }

    #popup h1 {
        position: absolute;
        text-align: center;
        width: 100%;
        height: 40px;
        top: 50%; margin-top: -20px;
        font-family: 'Noto Sans', sans-serif;
        color: #ccc;
    }

    .reverse {
        position: absolute;
        top: 20px;
        left: 20px;
        font-family: 'Noto Sans', sans-serif;
        color: #ccc;
        cursor: pointer;
    }

</script>

<div id="wrap">
    <div id="popup">
        <h1>break me</h1>
    </div>
</div>

<div class="reverse">Reverse</div

<script

    <script src="jquery-2.2.3.min.js" type="application/javascript"></script>

    <script type="application/javascript">

        var pieces = 70,
            speed = 1,
            pieceW = 30,
            pieceH = 30;


        for (var i = pieces - 1; i >= 0; i--) {
            $('#popup').prepend('<div class="piece" style="width:'+pieceW+'px; height:'+pieceH+'px"></div>');
        };

        function breakGlass(from){
            if (from === "reverse"){
                $('.piece').each(function(){
                    TweenLite.to($(this), speed, {x:0, y:0, rotationX:0, rotationY:0, opacity: 1, z: 0});
                    TweenLite.to($('#popup h1'),0.2,{opacity:1, delay: speed});
                });
                return;
            }

            if(!from){
                TweenLite.to($('#popup h1'),0.2,{opacity:0});
            } else {
                TweenLite.from($('#popup h1'),0.5,{opacity:0, delay: speed});
            }

            $('.piece').each(function(){
                var distX = getRandomArbitrary(-250, 250),
                    distY = getRandomArbitrary(-250, 250),
                    rotY  = getRandomArbitrary(-720, 720),
                    rotX  = getRandomArbitrary(-720, 720),
                    z = getRandomArbitrary(-500, 500);

                if(!from){
                    TweenLite.to($(this), speed, {x:distX, y:distY, rotationX:rotX, rotationY:rotY, opacity: 0, z: z});
                } else {
                    TweenLite.from($(this), speed, {x:distX, y:distY, rotationX:rotX, rotationY:rotY, opacity: 0, z: z});
                }
            });
        }

        function getRandomArbitrary(min, max) {
            return Math.random() * (max - min) + min;
        }


        $('.piece, h1').click(function(){
            breakGlass();
        });
        $('.reverse').click(function(){
            breakGlass('reverse');
        });

        breakGlass(true);


    </script>