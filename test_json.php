<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 01-12-2016
 * Time: PM 12:18
 */

?>
<a href="javascript:;" onclick="findFriends()">Click</a>
<a href="javascript:;" onclick="get_item()">Get</a>
<script
    src="https://code.jquery.com/jquery-3.1.0.min.js"
    integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="
    crossorigin="anonymous"></script>

<script type="application/javascript">

    function findFriends() {
        var ArrayData = [5, 6, 9];


        var dataToStore = JSON.stringify(ArrayData);
        localStorage.setItem('result', dataToStore);

        var ArrayData2 = [5, 6, 9, 10];


        var dataToStore2 = JSON.stringify(ArrayData2);
        localStorage.setItem('result2', dataToStore2);


    }

    function get_item(){
        var localData = JSON.parse(localStorage.getItem('result'));

        var localData2 = JSON.parse(localStorage.getItem('result2'));

        alert(localData);

//        $.each(localData, function(key, value){
//            console.log(key + ' = ' + value);
//        });
    }
</script>
