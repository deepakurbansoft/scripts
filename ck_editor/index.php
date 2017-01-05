<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>A Simple Page with CKEditor</title>
    <!-- Make sure the path to CKEditor is correct. -->
    <script src="js/ckeditor.js"></script>
    <script src="js/sample.js"></script>
</head>
<body>
<form>
            <textarea name="editor1" id="editor1" rows="10" cols="80">
                This is my textarea to be replaced with CKEditor.
            </textarea>

    <div class="adjoined-bottom">
        <div class="grid-container">
            <div class="grid-width-100">
                <div id="editor">
                    <h1>Hello world!</h1>
                    <p>I'm an instance of <a href="http://ckeditor.com">CKEditor</a>.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        initSample();
    </script>
</form>
</body>
</html>