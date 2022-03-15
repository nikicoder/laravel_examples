<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Examples</title>
        <style>
            table td {
                border: 1px solid #000;
                padding: 5px;
                text-align: center;
            }
            table {
                border-collapse: collapse;
            }
        </style>
    </head>
    <body>
        <table>
            <tr>
                <td>Наименование хранилища</td>
                <td>Наименование товара</td>
                <td>Объем хранилища (м3)</td>
                <td>Текущая загрузка (м3)</td>
                <td>Текущая загрузка (кг)</td>
            </tr>
            @foreach ($balance as $item)
                <tr>
                    <td>{{ $item['storage_name'] }}</td>
                    <td>{{ $item['food_name'] }}</td>
                    <td>{{ $item['storage_volume'] }}</td>
                    <td>{{ $item['storage_loaded_m3'] }}</td>
                    <td>{{ $item['storage_loaded_kg'] }}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
