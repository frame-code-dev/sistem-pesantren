<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Nota</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .nota {
            width: 100%;
            max-width: 600px;
            margin: auto;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .nota-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .nota-header h1 {
            margin: 0;
            text-transform: capitalize;
            font-size: 24px;
        }

        .nota-body {
            margin-top: 20px;
        }

        .nota-body table {
            width: 100%;
            border-collapse: collapse;
        }

        .nota-body table,
        .nota-body th,
        .nota-body td {
            border: none;
            padding: 8px;
            text-align: left;
        }

        .nota-body td:first-child {
            font-weight: bold;
            width: 50%;
        }

        .nota-footer {
            text-align: center;
            margin-top: 20px;
            font-style: italic;
        }
    </style>
</head>

<body>
    <div class='nota'>
        <div class='nota-header'>
            <h1><?= $title ?></h1>
            <hr>
        </div>
        <div class='nota-body'>
            <table>
                <tr>
                    <td>Nama Santri</td>
                    <td>: <?= $nama ?></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>: <?= $tanggal ?></td>
                </tr>
                <tr>
                    <td>Nominal</td>
                    <td>: <?= $nominal ?></td>
                </tr>
            </table>
        </div>
        <!-- <div class='nota-footer'>
            <p>Terima kasih atas pembayaran Anda!</p>
        </div> -->
    </div>
</body>

</html>