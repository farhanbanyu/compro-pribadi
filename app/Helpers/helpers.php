<?php
function boxDashboard($data)
{
    return [
        'class' => $data[0],
        'count' => $data[1],
        'title' => $data[2],
        'icon' => $data[3],
        'url' => $data[4],
    ];
}

function strtolink($data)
{
    return strtolower(str_replace('--', '-', str_replace('---', '-', str_replace('?', '-', str_replace(' ', '-', str_replace('|', '-', str_replace(',', '', str_replace('.', '', str_replace('$', '-', str_replace('&', '-', str_replace('?', '', str_replace('!', '', str_replace('(', '', str_replace(')', '', str_replace('"', '', str_replace("'", "", $data))))))))))))))));
}
function pricetoint($data)
{
    $ex = explode(',', $data);
    return str_replace('Rp', '', str_replace('.', '', $ex[0]));
}

function hari($data)
{
    $data = date('D', strtotime($data));
    if ($data == 'Mon') {
        return 'Senin';
    } elseif ($data == 'Tue') {
        return 'Selasa';
    } elseif ($data == 'Wed') {
        return 'Rabu';
    } elseif ($data == 'Thu') {
        return 'Kamis';
    } elseif ($data == 'Fri') {
        return "Jum'at";
    } elseif ($data == 'Sat') {
        return 'Sabtu';
    } elseif ($data == 'Sun') {
        return 'Minggu';
    }
}

function bulan($data)
{
    $bulan = date('m', strtotime($data));
    if ($bulan == '01') {
        return 'Januari';
    } elseif ($bulan == '02') {
        return 'Februari';
    } elseif ($bulan == '03') {
        return 'Maret';
    } elseif ($bulan == '04') {
        return 'April';
    } elseif ($bulan == '05') {
        return 'Mei';
    } elseif ($bulan == '06') {
        return 'Juni';
    } elseif ($bulan == '07') {
        return 'Juli';
    } elseif ($bulan == '08') {
        return 'Agustus';
    } elseif ($bulan == '09') {
        return 'September';
    } elseif ($bulan == '10') {
        return 'Oktober';
    } elseif ($bulan == '11') {
        return 'November';
    } elseif ($bulan == '12') {
        return 'Desember';
    }
}

# cara pakai di view {{tgl(TANGGAL)}}
function tgl($data)
{
    return  bulan($data) . ' ' . date('d', strtotime($data)) . ', ' . date('Y', strtotime($data));
}

function search_tgl()
{
    return date('Y-m-d', strtotime('- 3 years')) . '_-_' . date('Y-m-d');
}

function opacity($data)
{
    if ($data == 'yes') {
        return null;
    }
    return ' style="opacity: .3"';
}

function active($data)
{
    if ($data == 'yes') {
        return '<span class="btn btn-sm btn-success"><i class="fas fa-eye"></i></span>';
    }
    return '<span class="btn btn-sm btn-danger"><i class="fas fa-eye-slash"></i></span>';
}

function no($key, $limit = "")
{
    return (!empty($_GET['page'])) ? ((int) $_GET['page'] * (int) $limit ?? 100) + $key + 1 : $key + 1;
}

function errors($th, $message = null)
{
    return [
        'code' => 500,
        'success' => false,
        'message' => $message ?? $th->getMessage(),
        'line' => $th->getLine(),
        'file' => $th->getFile()
    ];
}

function timeCalculate($date)
{
    $d1 = strtotime($date);
    $d2 = strtotime(date('Y-m-d H:i:s'));
    $totalSecondsDiff = abs($d1 - $d2); //42600225
    $totalMinutesDiff = round($totalSecondsDiff / 60); //710003.75
    $totalHoursDiff   = round($totalSecondsDiff / 60 / 60); //11833.39
    $totalDaysDiff    = round($totalSecondsDiff / 60 / 60 / 24); //493.05
    $totalMonthsDiff  = round($totalSecondsDiff / 60 / 60 / 24 / 30); //16.43
    $totalYearsDiff   = round($totalSecondsDiff / 60 / 60 / 24 / 365); //1.35

    if ($totalSecondsDiff <= 60) {
        return $totalSecondsDiff . ' Detik lalu';
    } elseif ($totalMinutesDiff <= 60) {
        return $totalMinutesDiff . ' Menit lalu';
    } elseif ($totalHoursDiff <= 60) {
        return $totalHoursDiff . ' Jam lalu';
    } elseif ($totalDaysDiff <= 60) {
        return $totalDaysDiff . ' Hari lalu';
    } elseif ($totalMonthsDiff <= 60) {
        return $totalMonthsDiff . ' Bulan lalu';
    } else {
        return $totalYearsDiff . ' Tahun lalu';
    }
}
