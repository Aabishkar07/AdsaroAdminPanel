<?php

namespace App\Services;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use App\Models\Blog;
use App\Models\Service;
use App\Models\Store;

class SitemapService
{
    protected $baseUrl;
    protected $sitemapPath;

    public function __construct()
    {
        $this->baseUrl = 'http://127.0.0.1:8000';
        $this->sitemapPath = public_path('sitemap.xml');
    }

    public function generate()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // Add static routes
        $this->addStaticRoutes($xml);

        // Add dynamic routes from models
        $this->addDynamicRoutes($xml);

        $xml .= '</urlset>';

        // Save the sitemap
        File::put($this->sitemapPath, $xml);

        return $this->sitemapPath;
    }

    protected function addStaticRoutes(&$xml)
    {
        $staticRoutes = [
            '/' => '1.0',
            '/portfolio' => '0.8',
            '/termsandcondition' => '0.5',
            '/privacypolicy' => '0.5',
            '/aboutus' => '0.8',
            '/services' => '0.9',
            '/teams' => '0.7',
            '/contact' => '0.8',
            '/store' => '0.9',
            '/blogs' => '0.8',
            '/enquire' => '0.6',
        ];

        foreach ($staticRoutes as $route => $priority) {
            $xml .= $this->createUrlElement($route, $priority);
        }
    }

    protected function addDynamicRoutes(&$xml)
    {
        // Add blog posts (Blog has status column)
        $blogs = Blog::where('status', 1)->get();
        foreach ($blogs as $blog) {
            $xml .= $this->createUrlElement("/blog/{$blog->slug}", '0.7', $blog->updated_at);
        }

        // Add services (Service doesn't have status column)
        $services = Service::all();
        foreach ($services as $service) {
            $xml .= $this->createUrlElement("/service/{$service->slug}", '0.8', $service->updated_at);
        }

        // Add store products (Store doesn't have status column)
        $stores = Store::all();
        foreach ($stores as $store) {
            $xml .= $this->createUrlElement("/store/{$store->slug}", '0.7', $store->updated_at);
        }
    }

    protected function createUrlElement($path, $priority = '0.5', $lastmod = null)
    {
        $url = $this->baseUrl . $path;
        $lastmod = $lastmod ? $lastmod->toISOString() : now()->toISOString();

        return "  <url>\n" .
               "    <loc>{$url}</loc>\n" .
               "    <lastmod>{$lastmod}</lastmod>\n" .
               "    <changefreq>weekly</changefreq>\n" .
               "    <priority>{$priority}</priority>\n" .
               "  </url>\n";
    }

    public function getSitemapUrl()
    {
        return $this->baseUrl . '/sitemap.xml';
    }

    public function sitemapExists()
    {
        return File::exists($this->sitemapPath);
    }
}
