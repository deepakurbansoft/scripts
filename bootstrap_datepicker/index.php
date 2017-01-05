<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">



<div class="container">
    <div class="col-sm-6" style="height:130px;">
        <div class="form-group">
            <div class='input-group date' id='datetimepicker9'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                </span>
            </div>
        </div>
    </div>

    <script   src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>

    <script src="js/bootstrap-datetimepicker.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $('#datetimepicker9').datetimepicker({
                viewMode: 'years'
            });
        });
    </script>
</div>