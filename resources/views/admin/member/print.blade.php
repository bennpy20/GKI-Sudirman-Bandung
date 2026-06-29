<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">

<style>

body {
    font-family: DejaVu Sans, sans-serif;
    font-size: 11px;
}

.header {
    text-align: center;
    margin-bottom: 20px;
}

.header h2 {
    margin: 0;
}

.header h3 {
    margin: 5px 0;
}

.info {
    margin: 15px 0;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th,
table td {
    border: 1px solid #444;
    padding: 7px;
}

table th {
    background: #ececec;
}

.footer {
    margin-top: 25px;
    text-align: center;
    color: #666;
    font-size: 10px;
}

</style>

</head>

<body>

<div class="header">

    <h2>GKI SUDIRMAN BANDUNG</h2>

    <hr>

    <h3>LAPORAN DATA JEMAAT</h3>

    <table>

    <thead>

    <tr>

    <th>No</th>
    <th>Nama</th>
    <th>Tanggal Lahir</th>
    <th>Alamat</th>
    <th>Kontak</th>
    <th>Status Keanggotaan</th>
    <th>Jabatan</th>

    </tr>

    </thead>

    <tbody>

    @foreach($members as $member)

    <tr>

    <td align="center">{{ $loop->iteration }}</td>

    <td>{{ $member->name }}</td>

    <td>{{ $member->birth_date_formatted }}</td>

    <td>{{ $member->address }}</td>

    <td>{{ $member->phone_number }}</td>

    <td>{{ $member->memberMembership }}</td>

    <td>{{ $member->memberStatus }}</td>

    </tr>

    @endforeach

    </tbody>

    </table>

</div>

<div class="info">

<strong>Tanggal Cetak:</strong>

{{ $date }}

<br>

<strong>Jumlah Jemaat:</strong>

{{ $members->count() }}

</div>