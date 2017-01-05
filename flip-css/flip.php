<!--<style type="text/css">-->
<!---->
<!--    /* Set-up */-->
<!--    body {-->
<!--        color: rgb(6, 106, 117);-->
<!--        text-transform: uppercase;-->
<!--        font-family: sans-serif;-->
<!--        font-size: 100%;-->
<!--        background: #F4F6F8;-->
<!--        padding: 3em 0 0 0;-->
<!--        line-height: 62px;-->
<!--        -webkit-perspective: 1000px; /* <-NB */-->
<!--    }-->
<!---->
<!--    /* Container box to set the sides relative to */-->
<!--    .cube {-->
<!--        width: 30%;-->
<!--        text-align: center;-->
<!--        margin: 0 auto;-->
<!--        height: 100px;-->
<!---->
<!--        -webkit-transition: -webkit-transform .33s;-->
<!--        transition: transform .33s; /* Animate the transform properties */-->
<!---->
<!--        -webkit-transform-style: preserve-3d;-->
<!--        transform-style: preserve-3d; /* <-NB */-->
<!--    }-->
<!---->
<!--    /* The two faces of the cube */-->
<!--    .flippety,.flop {-->
<!--        background: rgb(247, 247, 247);-->
<!--        border: 1px solid rgba(147, 184, 189, .8);-->
<!---->
<!--        -webkit-border-radius: 5px;-->
<!--        border-radius: 5px;-->
<!---->
<!--        -webkit-box-shadow: 0 5px 20px rgba(105, 108, 109, .3), 0 0 8px 5px rgba(208, 223, 226, .4) inset;-->
<!--        box-shadow: 0 5px 20px rgba(105, 108, 109, .3), 0 0 8px 5px rgba(208, 223, 226, .4) inset;-->
<!--        height: 100px;-->
<!--    }-->
<!---->
<!--    /* Position the faces */-->
<!--    .flippety {-->
<!--        -webkit-transform: translateZ(50px);-->
<!--        transform: translateZ(50px);-->
<!--    }-->
<!---->
<!--    .flop {-->
<!--        -webkit-transform: rotateX(-90deg) translateZ(-50px);-->
<!--        transform: rotateX(-90deg) translateZ(-50px);-->
<!--    }-->
<!---->
<!--    /* Rotate the cube */-->
<!--    .cube:hover {-->
<!--        -webkit-transform: rotateX(89deg);-->
<!--        transform: rotateX(89deg); /* Text bleed at 90º */-->
<!--    }-->
<!---->
<!--    -->
<!--</style>-->
<!---->
<!--<div class="cube">-->
<!--    <div class="flippety">-->
<!--        <h1>Flippity</h1>-->
<!--    </div>-->
<!--    <div class="flop">-->
<!--        <h2>Flop</h2>-->
<!--    </div>-->
<!--</div>-->

<!DOCTYPE html>
<html>
<head>
    <style>
        .flip3D{ width:240px; height:200px; margin:10px; float:left; }
        .flip3D > .front{
            position:absolute;
            -webkit-transform: perspective( 600px ) rotateY( 0deg );
            transform: perspective( 600px ) rotateY( 0deg );
            background:#FC0; width:240px; height:200px; border-radius: 7px;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            transition: -webkit-transform .5s linear 0s;
            transition: transform .5s linear 0s;
        }
        .flip3D > .back{
            position:absolute;
            -webkit-transform: perspective( 600px ) rotateY( 180deg );
            transform: perspective( 600px ) rotateY( 180deg );
            background: #80BFFF; width:240px; height:200px; border-radius: 7px;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            transition: -webkit-transform .5s linear 0s;
            transition: transform .5s linear 0s;
        }
        .flip3D:hover > .front{
            -webkit-transform: perspective( 600px ) rotateY( -180deg );
            transform: perspective( 600px ) rotateY( -180deg );
        }
        .flip3D:hover > .back{
            -webkit-transform: perspective( 600px ) rotateY( 0deg );
            transform: perspective( 600px ) rotateY( 0deg );
        }
    </style>
</head>
<body>
<div class="flip3D">
    <div class="back">Box 1 - Back</div>
    <div class="front">Box 1 - Front</div>
</div>
<div class="flip3D">
    <div class="back">Box 2 - Back</div>
    <div class="front">Box 2 - Front</div>
</div>
<div class="flip3D">
    <div class="back">Box 3 - Back</div>
    <div class="front">Box 3 - Front</div>
</div>
</body>
</html>