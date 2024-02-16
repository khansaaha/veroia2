<!-- resources/views/upload-form.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload Form</title>
</head>
<body>

<form action="/remove-background" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" accept="image/*" required>
    <button type="submit">Submit</button>
</form>

</body>
</html>
