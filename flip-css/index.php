<style type="text/css">

    /* entire container, keeps perspective */
    .flip-container {
        perspective: 1000px;
    }
    /* flip the pane when hovered */
    .flip-container:hover .flipper, .flip-container.hover .flipper {
        transform: rotateY(180deg);
    }

    .flip-container, .front, .back {
        width: 320px;
        height: 480px;
    }

    /* flip speed goes here */
    .flipper {
        transition: 0.6s;
        transform-style: preserve-3d;

        position: relative;
    }

    /* hide back of pane during swap */
    .front, .back {
        backface-visibility: hidden;

        position: absolute;
        top: 0;
        left: 0;
    }

    /* front pane, placed above back */
    .front {
        z-index: 2;
        /* for firefox 31 */
        transform: rotateY(0deg);
    }

    /* back, initially hidden pane */
    .back {
        transform: rotateY(180deg);
    }

    .flip-container:hover .flipper, .flip-container.hover .flipper, .flip-container.flip .flipper {
        transform: rotateY(180deg);
    }

</style>

<div class="flip-container" ontouchstart="this.classList.toggle('hover');">
    <div class="flipper">
        <div class="front" style="background-color: #ccc;">
           Front
        </div>
        <div class="back">
           Back
        </div>
    </div>
</div>
<script
    src="https://code.jquery.com/jquery-3.1.0.min.js"
    integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="
    crossorigin="anonymous"></script>

<script type="application/javascript">
    alert(1);
    document.querySelector("#myCard").classList.toggle("flip")
</script>