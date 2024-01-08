<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<body>
    <form action="script.php" method="post" id="testTest">
        <input type="text" name="message" id="">
        <button type="submit">Test</button>
    </form>

    <!-- Add this table to your HTML -->
<table class="table" border="1">
    <thead>
        <tr>
            <th>Status</th>
            <th>Message</th>
            <th>Content</th>
        </tr>
    </thead>
    <tbody id="responseTableBody">

    </tbody>
</table>

<script>
    $(document).ready(function () {
        $('#testTest').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function (response) {
                    updateTable(response);
                    console.log(response);
                },
                error: function (error) {
                    console.log(error.responseText);
                }
            });
        });

        function updateTable(response) {
            var newRow = '<tr><td>' + response.status + '</td><td>' + response.message + '</td><td>' + response.content + '</td></tr>';
            $('#responseTableBody').append(newRow);
        }
    });
</script>
</body>
</html>