<?php

namespace Quarterloop\HostingTile\Services;

use Illuminate\Support\Facades\Http;

class HostingAPI
{
  public static function getHosting(string $url): array
  {
      $apiCall = "http://ip-api.com/json/{$url}?fields=status,message,continent,continentCode,country,countryCode,region,regionName,city,district,zip,lat,lon,timezone,offset,currency,isp,org,as,asname,reverse,mobile,proxy,hosting,query";

      $response = Http::get($apiCall)->json();

      return $response;
  }
}
