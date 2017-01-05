<style type="text/css">
    .flip_div {
        height: 200px;
        -webkit-animation: flip 1s;
        animation: flip 1s;
    }
    @-webkit-keyframes flip {
        from {
            transform: rotateX(90deg)
        }
        to {
            transform: rotateX(0deg)
        }
    }
    @keyframes flip {
        from {
            transform: rotateX(90deg)
        }
        to {
            transform: rotateX(0deg)
        }
    }
</style>

<div style="width: 500px; background-color: #ccc;" class="flip_div"></div>