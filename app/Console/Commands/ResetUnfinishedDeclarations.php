<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Document;
use Illuminate\Console\Command;

class ResetUnfinishedDeclarations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reset-unfinished-declarations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset unfinished declarations that have not been processed for more than an hour.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $processedDeclarations = Document::query()->whereNull('finished_processing_at')
            ->where('started_processing_at', '<', now()->subHour())
            ->update([
                'started_processing_at' => null,
            ]);

        $this->info("Reset {$processedDeclarations} unfinished declarations.");
    }
}
