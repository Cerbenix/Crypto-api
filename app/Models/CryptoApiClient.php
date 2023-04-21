<?php declare(strict_types=1);

namespace App\Models;

use GuzzleHttp\Client;

require_once 'config/api.php';

class CryptoApiClient
{
  private Client $apiClient;

  public function __construct()
  {
    $this->apiClient = new Client([
      'base_uri' => 'https://pro-api.coinmarketcap.com',
      'headers' => [
        'Accepts' => 'application/json',
        'X-CMC_PRO_API_KEY' => API_KEY,
      ],
    ]);
  }

  public function fetchTop10(): array
  {
    $response = $this->apiClient->get('v1/cryptocurrency/listings/latest?limit=10');
    $report = json_decode($response->getBody()->getContents());
    $cryptoCollection = [];
    foreach ($report->data as $record) {
      $cryptoCollection[] = new Crypto(
        $record->name,
        $record->symbol,
        $record->quote->USD->price,
        $record->quote->USD->volume_24h,
        $record->quote->USD->percent_change_24h
      );
    }
    return $cryptoCollection;
  }

  public function fetchBySymbol(string $symbol): ?Crypto
  {
    $response = $this->apiClient->get("v1/cryptocurrency/quotes/latest?symbol=$symbol");
    $report = json_decode($response->getBody()->getContents());
    if (!isset($report->data->$symbol)) {
      return null;
    }
    return new Crypto(
      $report->data->$symbol->name,
      $report->data->$symbol->symbol,
      $report->data->$symbol->quote->USD->price,
      $report->data->$symbol->quote->USD->volume_24h,
      $report->data->$symbol->quote->USD->percent_change_24h
    );
  }

}

