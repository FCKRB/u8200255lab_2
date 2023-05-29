<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;

class ArticlesWithTagId extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tag:count {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get number of articles with tag id';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $inputID = $this->argument('id');
        $tagID = Tag::where('id','=',$inputID);
        if ($tagID->first()) {
            $numberOfArticles = DB::table('article_tag')->where('tag_id', '=', $inputID)->count();
            $this->info('Number of articles with id '.$inputID.' is '.$numberOfArticles);
        } else {
            $this->error('Something went wrong!');
        }
    }
}
