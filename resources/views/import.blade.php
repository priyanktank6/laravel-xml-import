<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Contacts</title>
</head>
<body>
    <h1>Import Contacts from XML</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="/import" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" accept=".xml" required>
        <button type="submit">Upload XML</button>
    </form>
</body>
</html>
