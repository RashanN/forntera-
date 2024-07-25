<!-- resources/views/import.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Members</title>
    <!-- Include any CSS or JS files here -->
</head>
<body>
    <h1>Import Members</h1>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('members.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" accept=".xlsx,.csv">
        <button type="submit">Import Members</button>
    </form>
</body>
</html>
