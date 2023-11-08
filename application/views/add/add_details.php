<!DOCTYPE html>
<html>
<body>

<form action="" method="post" id="uploadForm" enctype="multipart/form-data">
  Select file to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
   $(document).ready(function() {
            $('#uploadForm').submit(function(event) {
                var fileName = $('#fileToUpload').val();
                if (fileName.length > 0) {
                    var ext = fileName.split('.').pop().toLowerCase();
                    if (ext !== 'csv') {
                        alert("Please select a CSV file.");
                        event.preventDefault();
                    }
                }
            });
        });
</script>