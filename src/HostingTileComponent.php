<?php

namespace Quarterloop\HostingTile;

use Livewire\Component;

class HostingTileComponent extends Component
{

    public $position;

    public function mount(string $position)
    {
        $this->position = $position;
    }


    public function render()
    {

        $hostingStore = HostingStore::make();

        return view('dashboard-hosting-tile::tile', [
            'website' => config('dashboard.tiles.hosting.url'),
            'server' => $hostingStore->getData(),
        ]);
    }
}
