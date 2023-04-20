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

  public function getChange(): float
  {
    return $this->change;
  }

  public function getPrice(): float
  {
    return $this->price;
  }

  public function getSymbol(): string
  {
    return $this->symbol;
  }

  public function getVolume(): float
  {
    return $this->volume;
  }
}