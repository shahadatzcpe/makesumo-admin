<?php

namespace App\Console\Commands;

use App\Models\Tag;
use Illuminate\Console\Command;

class IndexTagToAlgolia extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'index:tags';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $tags = Tag::select(['id', 'name'])->get();

        $bar = $this->output->createProgressBar(count($tags));

        $bar->start();

        foreach($tags as $tag) {
            $tag->save();
            $bar->advance();
        };

        $bar->finish();

        return 0;
    }
}
