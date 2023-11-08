<style type="text/css">
	p{
		width: 107%;
    height: 40%;
    vertical-align: bottom;
    padding-left: 60px;
    padding-bottom: 40px;
    color: #ffffff;
	}  
 .datetime-picker {
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 5px;
            font-size: 16px;
        }

        /* Style for the clock icon */
        .clock-icon {
            margin-left: 10px;
            cursor: pointer;
        }
</style>
<!DOCTYPE html>
<html>

<head>
    <title>Add Campaign</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.css" rel="stylesheet">
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <div class="form-group">
                <label for="campaign_name">Campaign Name:</label>
                <input type="text" id="campaign_name" name="campaign_name" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject">
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <select name="tags[]" id="tags" class="form-group" multiple="multiple">
                 <?php foreach ($tags as $key => $value):?>
                    <option value="<?php echo $value['id'];?>"><?php echo $value['tag_name'];?></option>
                    <?php endforeach;?>
                 </select>

                   <label for="schedule_date">Select a date and time:</label>
    <div class="schedule_date-picker">
        <input type="datetime-local" id="schedule_date" name="schedule_date">
        <span class="clock-icon">&#x23F2</span>
    </div>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" class="summernote"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="Add">
            </div>
        </form>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

    <!-- Include Summernote JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

    <!-- Initialize Summernote -->
    <script>
         ClassicEditor
        .create(document.querySelector('#message'))
        .catch(error => {
            console.error(error);
        });

        document.querySelector(".clock-icon").addEventListener("click", function () {
            // Get the datetime input element
            const datetimeInput = document.getElementById("datetime");

            // Trigger a click event on the datetime input to open the clock selection
            datetimeInput.click();
        });
    </script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .form-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            color: #333;
        }

        p {
            font-size: 16px;
            color: #666;
        }

        .form-group {
            margin: 10px 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</body>
</html>
