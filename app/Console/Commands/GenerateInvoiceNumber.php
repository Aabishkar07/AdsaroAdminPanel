<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Invoice;

class GenerateInvoiceNumber extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invoice:generate-number';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the next invoice number';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $invoice = new Invoice();
        $nextNumber = $invoice->generateInvoiceNumber();

        $this->info("Next invoice number: {$nextNumber}");

        return Command::SUCCESS;
    }
}
