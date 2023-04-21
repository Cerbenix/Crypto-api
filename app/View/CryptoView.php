<?php declare(strict_types=1);

namespace App\View;

use App\Models\Crypto;

class CryptoView
{
  public function printIntro(): int
  {
    echo "==========================================\n";
    echo "##########CRYPTOCURRENCY LOOKUP###########\n";
    echo "==========================================\n";
    echo "Choose the operation you want to perform \n";
    echo "Choose 0 for EXIT\n";
    echo "Choose 1 to see Top 10 cryptocurrencies\n";
    echo "Choose 2 to find cryptocurrency by symbol\n";
    return (int)readline('Input: ');
  }

  public function die(): void
  {
    echo 'Bye Bye';
  }

  public function printAll(array $cryptoArray): void
  {
    foreach ($cryptoArray as $crypto) {
      $this->printCryptoInfo($crypto);
    }
  }

  public function inquire(): string
  {
    return strtoupper(readline('Please input the cryptocurrencies symbol: '));
  }

  public function invalidInput(): void
  {
    echo "!!!!!!!!!!!!!!Invalid input!!!!!!!!!!!!!!!\n";
  }

  public function printCryptoInfo(Crypto $crypto): void
  {
    echo "==========================================\n";
    echo "Name: {$crypto->getName()}\n";
    echo "Symbol: {$crypto->getSymbol()}\n";
    echo "Price: \${$crypto->getPrice()}\n";
    echo "Volume in 24h: {$crypto->getVolume()}\n";
    echo "Percent change in 24h: {$crypto->getChange()}%\n";
  }
}