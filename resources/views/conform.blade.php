<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search GC Code</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Set fixed resolution and background image */
        body {
            margin: 0;
            padding: 0;
            background-image: url('images/bgimage.png'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            width: 1080px;
            height: auto; /* Adjust to fit content */
            max-height: 1920px; /* Ensure container doesn't exceed 1920px */
            background: rgba(255, 255, 255, 0.8); /* White background with slight transparency */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Center container vertically within the viewport */
            margin-top: 20px; /* Adjust as needed */
            position: relative;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4 text-center">Search GC Code</h1>
        
        <!-- Display success or error messages -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Search Form -->
        <form action="{{ route('members.results') }}" method="GET">
            @csrf
            <div class="form-group">
                <label for="gc_code">Enter GC Code:</label>
                <input type="text" id="gc_code" name="gc_code" class="form-control" placeholder="Enter GC Code" value="{{ request('gc_code') }}">
            </div>
            <button type="submit" class="btn btn-primary" style="display: block; margin: 0 auto;">Search</button>
        </form>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
