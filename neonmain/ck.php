<html>

<head>
    <!-- ckeditor refference -->
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js%22%3E"></script>
</head>

<textarea id="editor" name='content'></textarea>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>

</html>
