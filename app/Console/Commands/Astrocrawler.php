<?php

namespace App\Console\Commands;

use Goutte;
use App\Models\Astro;
use Illuminate\Console\Command;

class Astrocrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'astro:starCrawl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Astro crawling...';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = [];
        for ($i = 0; $i <= 11; $i++) {
            $crawler = Goutte::request('GET', 'https://astro.click108.com.tw/daily_0.php?iAstro=' . $i);

            // 當天日期
            $date = $crawler->filter('#iAcDay option[selected="selected"]')->each(function ($node) {
                // dump($node->text());

                return $node->text();
            });

            // 星座名稱
            $name = $crawler->filter('.ROOT a:nth-child(2)')->each(function ($node) {
                // dump(explode("－", $node->text())[1]);
                // $astroName = explode("－", $node->text())[1];
                return explode("－", $node->text())[1];
            });

            $data[$i]['name'] = $name;
            $data[$i]['date'] = $date;

            // 相關運勢及評分
            for ($i2 = 3; $i2 <= 9; $i2 += 2) {
                $c = $i2 - 1;

                switch ($i2) {
                    case '3':
                    $fortuneAllNum = $crawler->filter('.TODAY_CONTENT p:nth-child(' . $c . ')')->each(function ($node) {
                            // dump($node->text());
                            return $node->text();
                        });

                        $fortuneAll = $crawler->filter('.TODAY_CONTENT p:nth-child(' . $i2 . ')')->each(function ($node) {
                            // dump($node->text());
                            return $node->text();
                        });

                        $data[$i]['fortuneAllNum'] = $fortuneAllNum;
                        $data[$i]['fortuneAll'] = $fortuneAll;
                        break;
                    case '5':
                        $fortuneLoveNum = $crawler->filter('.TODAY_CONTENT p:nth-child(' . $c . ')')->each(function ($node) {
                            // dump($node->text());
                            return $node->text();
                        });

                        $fortuneLove = $crawler->filter('.TODAY_CONTENT p:nth-child(' . $i2 . ')')->each(function ($node) {
                            // dump($node->text());
                            return $node->text();
                        });

                        $data[$i]['fortuneLoveNum'] = $fortuneLoveNum;
                        $data[$i]['fortuneLove'] = $fortuneLove;
                        break;
                    case '7':
                        $fortuneMoneyNum = $crawler->filter('.TODAY_CONTENT p:nth-child(' . $c . ')')->each(function ($node) {
                            // dump($node->text());
                            return $node->text();
                        });

                        $fortuneMoney = $crawler->filter('.TODAY_CONTENT p:nth-child(' . $i2 . ')')->each(function ($node) {
                            // dump($node->text());
                            return $node->text();
                        });
                        $data[$i]['fortuneMoneyNum'] = $fortuneMoneyNum;
                        $data[$i]['fortuneMoney'] = $fortuneMoney;
                        break;
                    case '9':
                        $fortuneBussWorkNum = $crawler->filter('.TODAY_CONTENT p:nth-child(' . $c . ')')->each(function ($node) {
                            // dump($node->text());
                            return $node->text();
                        });

                        $fortuneBussWork = $crawler->filter('.TODAY_CONTENT p:nth-child(' . $i2 . ')')->each(function ($node) {
                            // dump($node->text());
                            return $node->text();
                        });
                        $data[$i]['fortuneBussWorkNum'] = $fortuneBussWorkNum;
                        $data[$i]['fortuneBussWork'] = $fortuneBussWork;
                        break;

                }

            }
        }
        for ($i = 0; $i <= 11; $i++) {
            $astro = new Astro;
            $astro->Name = $data[$i]['name'][0];
            $astro->Date = $data[$i]['date'][0];
            $astro->fortuneAllNum = $data[$i]['fortuneAllNum'][0];
            $astro->fortuneAll = $data[$i]['fortuneAll'][0];
            $astro->fortuneLove = $data[$i]['fortuneLove'][0];
            $astro->fortuneLoveNum = $data[$i]['fortuneLoveNum'][0];
            $astro->fortuneMoney = $data[$i]['fortuneMoney'][0];
            $astro->fortuneMoneyNum = $data[$i]['fortuneMoneyNum'][0];
            $astro->fortuneBussWork = $data[$i]['fortuneBussWork'][0];
            $astro->fortuneBussWorkNum = $data[$i]['fortuneBussWorkNum'][0];
            $astro->save();
        }
    }
}
