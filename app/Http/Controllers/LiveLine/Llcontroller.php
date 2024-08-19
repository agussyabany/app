<?php

namespace App\Http\Controllers\LiveLine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
class Llcontroller extends Controller
{
    function index (Request $request)
    {
        $client = new Client();
        $url = env('API_PELANGGAN_URL');
        $token = env('API_PELANGGAN_TOKEN');

        // Mendapatkan tanggal saat ini
        $now = Carbon::now()->format('Y-m-d');

        // Mendefinisikan tanggal otomatis
        $startOfYear = Carbon::now()->startOfYear()->format('Y-m-d'); // Awal tahun ini
        $startOfMonth = Carbon::now()->startOfMonth()->format('Y-m-d'); // Awal bulan ini

        // Mendefinisikan kunci cache
        $cacheKeys = [
            'tahun' => "pelunasan_data_{$startOfYear}_{$now}",
            'bulan' => "pelunasan_data_{$startOfMonth}_{$now}",
            'harian' => "pelunasan_data_{$now}_{$now}"
        ];

        // Mendapatkan data dari cache atau API
        $data = [
            'tahun' => Cache::remember($cacheKeys['tahun'], now()->addHours(1), function () use ($client, $url, $token, $startOfYear, $now) {
                return $this->fetchData($client, $url, $token, $startOfYear, $now);
            }),
            'bulan' => Cache::remember($cacheKeys['bulan'], now()->addHours(1), function () use ($client, $url, $token, $startOfMonth, $now) {
                return $this->fetchData($client, $url, $token, $startOfMonth, $now);
            }),
            'harian' => Cache::remember($cacheKeys['harian'], now()->addHours(1), function () use ($client, $url, $token, $now) {
                return $this->fetchData($client, $url, $token, $now, $now);
            })
        ];

        // Hitung total data untuk setiap periode
        $totals = [
            'tahun' => count($data['tahun']['pelunasan'] ?? []),
            'bulan' => count($data['bulan']['pelunasan'] ?? []),
            'harian' => count($data['harian']['pelunasan'] ?? [])
        ];

        // Kirim data ke view
        return view('Liveline.pages.index', [
            'data' => $data,
            'totals' => $totals,
            'today' => $now,
            'startOfMonth' => $startOfMonth
        ]);
    }

    private function fetchData(Client $client, $url, $token, $tglawal, $tglakhir)
    {
        try {
            $response = $client->request('GET', $url, [
                'query' => [
                    'token' => $token,
                    'tglawal' => $tglawal,
                    'tglakhir' => $tglakhir
                ]
            ]);
            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return ['pelunasan' => []]; // Kembalikan data kosong jika terjadi kesalahan
        }
    }

    public function donut(Request $request)
{
    $client = new Client();
    $url = env('API_PELANGGAN_URL');
    $token = env('API_PELANGGAN_TOKEN');

    // Mendapatkan tanggal saat ini
    $now = Carbon::now()->format('Y-m-d');

    // Mendefinisikan tanggal otomatis
    $startOfYear = Carbon::now()->startOfYear()->format('Y-m-d'); // Awal tahun ini

    // Mendefinisikan kunci cache
    $cacheKeys = [
        'tahun' => "pelunasan_data_{$startOfYear}_{$now}",
    ];

    // Mendapatkan data dari cache atau API
    $response = Cache::remember($cacheKeys['tahun'], now()->addHours(1), function () use ($client, $url, $token, $startOfYear, $now) {
        return $this->fetchData($client, $url, $token, $startOfYear, $now);
    });

    // Mengakses data yang relevan
    $data = $response['pelunasan'];

    // Mengelompokkan data berdasarkan 'jlw' dan menghitung jumlah setiap kelompok
    $groupedData = collect($data)->groupBy('jlw')->map(function ($items) {
        return $items->count();
    });

    // Daftar label yang diharapkan
    $labels = ['SS', 'D1', 'D2', 'D3', 'D4', 'P1', 'P2', 'P3', 'P4'];

    // Menyiapkan data untuk chart dengan menghitung jumlah untuk setiap label
    $result = array_map(function ($label) use ($groupedData) {
        return $groupedData->get($label, 0); // Mengambil jumlah atau 0 jika tidak ada
    }, $labels);

    return response()->json([
        'status' => 'true',
        'data' => $result
    ]);
}

public function tabel()
{
    // Mengatur tanggal hari ini, awal bulan ini, dan awal tahun 2024
    $today = now()->format('Y-m-d');
    $startOfMonth = now()->startOfMonth()->format('Y-m-d');
    $startOfYear = now()->year(2024)->startOfYear()->format('Y-m-d');

    // Mengambil data dari API dengan tanggal otomatis
    $data = Cache::remember('data_perubahan_pelanggan', now()->addHours(1), function () use ($startOfYear, $today) {
        return Http::get('http://36.91.188.154/webapi/Pelanggan/getDataPerubahanPelangganPilih', [
            'token' => '5d659eef91487eb4d4c4181d51911api',
            'tglawal' => $startOfYear,
            'tglakhir' => $today,
        ])->json();
    });

    $pelunasan = $data['pelunasan'] ?? [];

    // Mengelompokkan data berdasarkan golongan 'jlw'
    $result = $this->groupByGolongan($pelunasan);

    return response()->json($result);
}

private function groupByGolongan($data)
{
    $result = [];

    foreach ($data as $item) {
        $golongan = $item['jlw'];

        // Inisialisasi jika golongan belum ada
        if (!isset($result[$golongan])) {
            $result[$golongan] = [
                'tahun' => 0,
                'bulan' => 0,
                'hari' => 0,
            ];
        }

        // Jumlahkan entri berdasarkan periode waktu
        $result[$golongan]['tahun']++;
        $result[$golongan]['bulan']++;
        $result[$golongan]['hari']++;
    }

    return $result;
}


}
