<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmed Members</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4 text-center">Confirmed Members</h1>
        
        <div class="col-sm" style="margin-bottom: 20px;">
            <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."/>
        </div>

        <!-- Display confirmed members -->
        <div class="table-responsive">
            <table class="table " id="myTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>GC Code</th>
                        <th>Name</th>
                        <th>Telephone</th>
                        <!-- Add other columns as needed -->
                    </tr>
                </thead>
                <tbody id="tableBody">
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

       
        
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function fetchMembers() {
            $.ajax({
                url: '{{ route("members.fetchConfirmed") }}',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var tableBody = $("#tableBody");
                    tableBody.empty();
                    if(data.length > 0) {
                        $.each(data, function(index, member) {
                            tableBody.append(
                                "<tr>" +
                                    "<td>" + member.id + "</td>" +
                                    "<td>" + member.GCcode + "</td>" +
                                    "<td>" + member.Dealername + "</td>" +
                                    "<td>" + member.Telephone + "</td>" +
                                "</tr>"
                            );
                        });
                    } else {
                        tableBody.append("<tr><td colspan='4' class='text-center'>No confirmed members found.</td></tr>");
                    }
                }
            });
        }

        $(document).ready(function() {
            // Fetch members every 5 seconds
            setInterval(fetchMembers, 5000);
        });
    </script>
</body>
</html>
