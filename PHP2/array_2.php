<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Dosen</title>
    <style>
        table {
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Informasi Dosen</h2>
    <table>
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <?php     
            $Dosen = [
                'nama' => 'Ahmad Hayyin Baihaki',
                'domisili' => 'Malang',
                'jenis kelamin' => 'Laki-laki'
            ];

            foreach ($Dosen as $field => $value) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($field) . "</td>";
                echo "<td>" . htmlspecialchars($value) . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body> 
</html>
