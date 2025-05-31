<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Carbon\Carbon;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Genera el archivo sitemap.xml';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $baseUrl = config('app.url');

        $sitemap = Sitemap::create()
            ->add(Url::create($baseUrl . '/')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(1.0))
            ->add(Url::create($baseUrl . '/obras')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8))
            ->add(Url::create($baseUrl . '/contacto')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                ->setPriority(0.5));

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generado correctamente.');
    }
}
