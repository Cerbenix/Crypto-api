<?php declare(strict_types=1);

namespace App\Controllers;

use App\Models\CryptoApiClient;
use App\View\CryptoView;

class CryptoController
{
  private CryptoApiClient $cryptoApiClient;
  private CryptoView $cryptoApiView;

  public function __construct()
  {
    $this->cryptoApiClient = new CryptoApiClient();
    $this->cryptoApiView = new CryptoView();
  }

  public function run(): void
  {
    while (true) {
      $input = $this->cryptoApiView->printIntro();
      switch ($input) {
        case 0:
          $this->cryptoApiView->die();
          die;
        case 1:
          $this->handleTop10();
          break;
        case 2:
          $symbol = $this->cryptoApiView->inquire();
          $this->handleBySymbol($symbol);
          break;
        default:
          $this->cryptoApiView->invalidInput();
      }
    }
  }

  private function handleTop10(): void
  {
    $cryptoArray = $this->cryptoApiClient->fetchTop10();
    $this->cryptoApiView->printAll($cryptoArray);
  }

  private function handleBySymbol(string $symbol): void
  {
    $crypto = $this->cryptoApiClient->fetchBySymbol($symbol);
    if ($crypto == null) {
      $this->cryptoApiView->invalidInput();
      return;
    }
    $this->cryptoApiView->printCryptoInfo($crypto);
  }

}