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
            'website'         => config('dashboard.tiles.hosting.url'),
            'server'          => $hostingStore->getData(),
            'anbieter'        => $hostingStore->getData()['org'],
            'ip'              => $hostingStore->getData()['query'],
            'serverName'      => $hostingStore->getData()['reverse'],
            'lastUpdateTime'  => date('H:i:s', strtotime($hostingStore->getLastUpdateTime())),
            'lastUpdateDate'  => date('d.m.Y', strtotime($hostingStore->getLastUpdateDate())),
        ]);
    }
}
