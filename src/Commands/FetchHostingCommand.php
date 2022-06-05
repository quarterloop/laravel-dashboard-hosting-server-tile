<?php

namespace Quarterloop\HostingTile\Commands;

use Illuminate\Console\Command;
use Quarterloop\HostingTile\Services\HostingAPI;
use Quarterloop\HostingTile\HostingStore;
use Session;

class FetchHostingCommand extends Command
{
    protected $signature = 'dashboard:fetch-hosting-data';

    protected $description = 'Fetch hosting data';

    public function handle(HostingAPI $hosting_api)
    {

        $this->info('Fetching hosting data ...');

        $hosting = $hosting_api::getHosting(
            Session::get('website'),
        );

        HostingStore::make()->setData($hosting);

        $this->info('Stored data ...');

        $this->info('All done!');
    }
}
