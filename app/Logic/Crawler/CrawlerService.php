<?php

namespace App\Logic\Crawler;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class CrawlerService
{
    /** @var Client */
    private $client;
    private $baseUri = 'https://astro.click108.com.tw/daily_0.php?iAstro=';

    public function __construct()
    {
        $this->client = new Client([
            'curl' => [
                CURLOPT_SSL_CIPHER_LIST => 'DEFAULT@SECLEVEL=1'
            ]
        ]);
    }

    /**
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function crawl(): array
    {
        $data = [];
        for ($i = 0; $i < 12; ++$i) {
            $url = $this->baseUri . $i;
            $content = $this->client->get($url)->getBody()->getContents();
            $crawler = new Crawler($content);
            $crawler = $crawler->filter('.TODAY_CONTENT')->children();

            $data []= [
                'url' => $url,
                'name' => mb_substr($crawler->eq(0)->text(''), 2, 3, 'UTF-8'),
                'overall_score' => $this->getScore($crawler->eq(1)->text('')),
                'overall_description' => $crawler->eq(2)->text(''),
                'romance_score' => $this->getScore($crawler->eq(3)->text('')),
                'romance_description' => $crawler->eq(4)->text(''),
                'career_score' => $this->getScore($crawler->eq(5)->text('')),
                'career_description' => $crawler->eq(6)->text(''),
                'wealth_score' => $this->getScore($crawler->eq(7)->text('')),
                'wealth_description' => $crawler->eq(8)->text(''),
            ];
        }
        return $data;
    }

    /**
     * @param $str
     * @return int
     */
    private function getScore($str): int
    {
        return substr_count($str, '★');
    }
}