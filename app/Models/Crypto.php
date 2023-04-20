<?php declare(strict_types=1);

namespace App\Models;

class Crypto
{
  private string $name;
  private string $symbol;
  private float $price;
  private float $volume;
  private float $change;

  public function __construct(
    string $name,
    string $symbol,
    float  $price,
    float  $volume,
    float  $change)
  {

    $this->name = $name;
    $this->symbol = $symbol;
    $this->price = $price;
    $this->volume = $volume;
    $this->change = $change;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getChange(): string
  {
    return number_format($this->change, 2);
  }

  public function getPrice(): string
  {
    if($this->price < 1){
      return number_format($this->price, 5);
    } else {
      return number_format($this->price, 2);
    }
  }

  public function getSymbol(): string
  {
    return $this->symbol;
  }

  public function getVolume(): string
  {
   return number_format($this->volume);
  }
}