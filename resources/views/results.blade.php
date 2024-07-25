<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
            max-height: 1920px;
            background: rgba(255, 255, 255, 0.8); /* White background with slight transparency */
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow-y: auto; /* Allows scrolling if content overflows */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4 text-center">Search Results</h1>

        <!-- Display search results -->
        @if(isset($members) && $members->count() > 0)
            <h2 class="text-center">Results for GC Code: {{ $gc_code }}</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>GC Code</th>
                            <th>Name</th>
                            <th>Telephone</th>
                            <!-- Add other columns as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $member)
                            <tr>
                                <td>{{ $member->id }}</td>
                                <td>{{ $member->GCcode }}</td>
                                <td>{{ $member->Dealername }}</td>
                                <td>{{ $member->Telephone }}</td>
                                <!-- Add other columns as needed -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Display the conform button if results are found -->
            <a href="{{ route('members.conform', $member->id) }}" class="btn btn-primary d-block mx-auto mt-4">Conform</a>
        @else
            <!-- Display a message if no results are found -->
            <p class="text-center">No results found for GC Code: {{ $gc_code }}.</p>
            <!-- Display the back button if no results are found -->
            <a href="{{ route('conform.form') }}" class="btn btn-secondary d-block mx-auto mt-4">Back to Search</a>
        @endif
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
