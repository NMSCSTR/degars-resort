$(document).ready(function() {
    $('#dataTable').DataTable({
        "paging": true, // Enable pagination
        "ordering": true, // Enable sorting
        "searching": true, // Enable search bar
        "info": true, // Enable info box
        "autoWidth": false, // Disable auto width
        "responsive": true, // Enable responsive layout
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
    });
});

// Function to print the table
function printTable() {
    alert('Click ok to proceed');
    var printWindow = window.open('', '_blank');
    printWindow.document.write('<html><head>');
    printWindow.document.write('<title>Print Reservations</title>');
    // Add any additional CSS for styling the print-friendly version
    printWindow.document.write(
        '<style>body{font-family: Poppins, sans-serif;} table{border-collapse: collapse;} th, td{border: 1px solid #ddd; padding: 8px;} th{background-color: #f2f2f2;}</style>'
        );
    printWindow.document.write('</head><body>');
    printWindow.document.write('<h5>Recent Reservations</h5>');
    printWindow.document.write('<table>');
    var dataTable = $('#dataTable').DataTable();
    dataTable.columns().visible(true); // Make all columns visible for printing
    printWindow.document.write(dataTable.table().node().outerHTML);
    dataTable.columns().visible(false); // Restore column visibility to original state
    printWindow.document.write('</table>');
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}