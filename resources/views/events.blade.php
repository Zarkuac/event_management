<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table id="event-table"
                       class="min-w-full text-center text-sm font-light text-surface dark:text-white">
                    <thead
                        class="border-b border-neutral-200 bg-[#332D2D] font-medium text-white dark:border-white/10">
                    <tr>
                        <th onclick="sortTable(0)" scope="col" class=" px-6 py-4">Name</th>
                        <th onclick="sortTable(1)" scope="col" class=" px-6 py-4">Description</th>
                        <th onclick="sortTable(2)" scope="col" class=" px-6 py-4">Date</th>
                        <th onclick="sortTable(3)" scope="col" class=" px-6 py-4">Location</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('/api/events')
            .then(response => response.json())
            .then(data => {
                const tableBody = document.querySelector('#event-table tbody');
                data.forEach(event => {
                    const row = `<tr>
                            <td>${event.name}</td>
                            <td>${event.description}</td>
                            <td>${event.date}</td>
                            <td>${event.location}</td>
                        </tr>`;
                    tableBody.innerHTML += row;
                });
            })
            .catch(error => console.error('Error fetching events:', error));
    });

    function sortTable(columnIndex) {
        const table = document.getElementById("event-table");
        const rows = Array.from(table.rows).slice(1);
        const sortedRows = rows.sort((a, b) => {
            const cellA = a.cells[columnIndex].innerText.toLowerCase();
            const cellB = b.cells[columnIndex].innerText.toLowerCase();
            return cellA.localeCompare(cellB);
        });

        const tbody = table.querySelector('tbody');
        tbody.innerHTML = '';
        sortedRows.forEach(row => tbody.appendChild(row));
    }
</script>
</html>
