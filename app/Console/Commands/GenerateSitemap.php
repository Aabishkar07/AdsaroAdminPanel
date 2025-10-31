<?php

namespace App\Console\Commands;

// ...existing code...

use Illuminate\Console\Command;
use App\Services\SitemapService;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate XML sitemap for the website';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating sitemap...');

        try {
            $sitemapService = new SitemapService();
            $sitemapPath = $sitemapService->generate();

            $this->info('Sitemap generated successfully!');
            $this->info('Sitemap location: ' . $sitemapPath);
            $this->info('Sitemap URL: ' . $sitemapService->getSitemapUrl());

            return 0;
        } catch (\Exception $e) {
            $this->error('Error generating sitemap: ' . $e->getMessage());
            return 1;
        }
    }
}
