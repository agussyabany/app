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

        //Kirim data ke view
        return view('Liveline.pages.index', [
            'data' => $data,
            'totals' => $totals,
            'today' => $now,
            'startOfMonth' => $startOfMonth
        ]);
        
        //return $totals;
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

public function bar()
{
    $client = new Client();
    $url = env('API_PELANGGAN_URL');
    $token = env('API_PELANGGAN_TOKEN');

    // Tanggal 1 Januari 2024
    $tglAwal = '2024-01-01';
    // Tanggal saat ini
    $tglAkhir = Carbon::now()->format('Y-m-d');

    // Mengambil data dari API
    $response = $client->request('GET', $url, [
        'query' => [
            'token' => $token,
            'tglawal' => $tglAwal,
            'tglakhir' => $tglAkhir,
        ]
    ]);

    $data = json_decode($response->getBody()->getContents(), true);

    $unitCounts = [
        'UNIT I' => 0,
        'UNIT II' => 0,
        'UNIT III' => 0,
        'UNIT IV' => 0
    ];

    // Mengelompokkan dan menghitung berdasarkan unit
    foreach ($data['pelunasan'] as $item) {
        $unit = $item['unit'];

        switch ($unit) {
            case '1':
                $unitCounts['UNIT I']++;
                break;
            case '2':
                $unitCounts['UNIT II']++;
                break;
            case '3':
                $unitCounts['UNIT III']++;
                break;
            case '4':
                $unitCounts['UNIT IV']++;
                break;
        }
    }

    return response()->json($unitCounts);
}





public function test(Request $request)
    {
        $client = new Client();
        
        // Mengambil URL API dan token dari file .env
        $url = env('API_PELANGGAN_URL');
        $token = env('API_PELANGGAN_TOKEN');

        // Mendapatkan tglawal dan tglakhir dari request atau menggunakan default
        $tglawal = $request->input('tglawal', '2024-01-01'); // default tglawal
        $tglakhir = $request->input('tglakhir', '2024-08-05'); // default tglakhir

        try {
            // Membuat request ke API dengan query parameters
            $response = $client->request('GET', $url, [
                'query' => [
                    'token' => $token,
                    'tglawal' => $tglawal,
                    'tglakhir' => $tglakhir
                ]
            ]);

            $data = json_decode($response->getBody(), true);

            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


}
