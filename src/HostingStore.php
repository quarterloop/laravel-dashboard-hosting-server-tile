<?php

namespace Quarterloop\HostingTile;

use Spatie\Dashboard\Models\Tile;

class HostingStore
{
    private Tile $tile;

    public static function make()
    {
        return new static();
    }

    public function __construct()
    {
        $this->tile = Tile::firstOrCreateForName("server");
    }

    public function setData(array $data): self
    {
        $this->tile->putData('server', $data);

        return $this;
    }

    public function getData(): array
    {
        return$this->tile->getData('server') ?? [];
    }
}
