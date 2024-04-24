<?php

namespace App\Jobs;

use App\Models\Screenshot;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CleanOldScreenshots implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        // Calculate the date 4 days ago
        $fourDaysAgo = Carbon::now()->subDays(4)->toDateString();

        // Get old screenshots
        $oldScreenshots = Screenshot::whereDate('created_at', '<', $fourDaysAgo)->get();

        // Delete old screenshots
        foreach ($oldScreenshots as $screenshot) {
            $screenshot->delete();
        }
    }
}