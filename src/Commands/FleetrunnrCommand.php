<?php

namespace Jit\Fleetrunnr\Commands;

use Illuminate\Console\Command;

class FleetrunnrCommand extends Command
{
    public $signature = 'fleetrunnr';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
