<?php

namespace App\Console\Commands;

use App\Logic\Astro\AstroRepository;
use App\Logic\Crawler\CrawlerService;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;

class FetchAstroData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:fetchAstroData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'fetch astro data from website';

    /**
     * Execute the console command.
     *
     * @param CrawlerService $service
     * @param AstroRepository $repository
     * @return void
     */
    public function handle(CrawlerService $service, AstroRepository $repository): void
    {
        $this->info($this->signature . ' START');
        try {
            $data = $service->crawl();
            $rs = $repository->saveAstros($data);
            if ($rs['success'] !== true) {
                $this->error(json_encode($rs['error']));
            }
        } catch (GuzzleException $e) {
            $this->error($e->getTraceAsString());
        } catch (Exception $e) {
            $this->error($e->getTraceAsString());
        }
        $this->info($this->signature . 'DONE');
    }
}
