<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Contact Us</h1>
        @if(session('success'))
            <p>{{ session('success') }}</p>
        @endif

        <form action="{{ route('contact.form') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>
            
            <label for="summary">Summary:</label>
            <textarea id="summary" name="summary" required></textarea>
            
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
            
            <label for="file">Upload File:</label>
            <input type="file" id="file" name="file">
            
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
