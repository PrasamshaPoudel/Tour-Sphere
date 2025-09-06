<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    private string $apiKey;
    private string $baseUrl;
    private string $units;
    private string $lang;

    public function __construct()
    {
        $cfg = config('services.openweather');
        $this->apiKey = (string) ($cfg['key'] ?? '');
        $this->baseUrl = rtrim((string) ($cfg['base_url'] ?? ''), '/');
        $this->units = (string) ($cfg['units'] ?? 'metric');
        $this->lang = (string) ($cfg['lang'] ?? 'en');
    }

    public function getCurrentByCity(string $city): array
    {
        $response = Http::timeout(10)->get($this->baseUrl . '/weather', [
            'q' => $city,
            'appid' => $this->apiKey,
            'units' => $this->units,
            'lang' => $this->lang,
        ]);

        if ($response->failed()) {
            return [
                'ok' => false,
                'status' => $response->status(),
                'error' => $response->json('message') ?? 'Weather fetch failed',
            ];
        }

        return [
            'ok' => true,
            'data' => $response->json(),
        ];
    }

    public function getForecastByCity(string $city): array
    {
        $response = Http::timeout(10)->get($this->baseUrl . '/forecast', [
            'q' => $city,
            'appid' => $this->apiKey,
            'units' => $this->units,
            'lang' => $this->lang,
        ]);

        if ($response->failed()) {
            return [
                'ok' => false,
                'status' => $response->status(),
                'error' => $response->json('message') ?? 'Forecast fetch failed',
            ];
        }

        return [
            'ok' => true,
            'data' => $response->json(),
        ];
    }

    public function getCurrentAndForecastByCity(string $city): array
    {
        $current = $this->getCurrentByCity($city);
        $forecast = $this->getForecastByCity($city);
        
        return [
            'current' => $current,
            'forecast' => $forecast,
        ];
    }
}


