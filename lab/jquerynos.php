<script
    src="https://code.jquery.com/jquery-3.1.0.min.js"
    integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="
    crossorigin="anonymous"></script>

<script type="application/javascript">

    function multiply(x,y) {
        return (x * y);
    }

    function addZeroes( num ) {
        var value = Number(num);
        var res = num.split(".");
        if(num.indexOf('.') === -1) {
            value = value.toFixed(2);
            num = value.toString();
        } else if (res[1].length < 3) {
            value = value.toFixed(2);
            num = value.toString();
        }
        return num
    }

    var ww = '1'
    var xx = '2.3'
    var yy = '3.45'
    var zz = '4.567'



    $(document).ready(function () {



        alert(addZeroes(xx));

        Number.prototype.round = function(p) {
            p = p || 10;
            return parseFloat( this.toFixed(p) );
        };
        var n = 22 / 7; // 3.142857142857143
        n.round(3); // 3.143
//        alert(n);

        var num1 = "2.10";
//       alert(parseFloat(Math.round(num1)).toFixed(2));

    });
</script>