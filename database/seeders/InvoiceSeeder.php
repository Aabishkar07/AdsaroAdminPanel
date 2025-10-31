<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceItem;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a sample client if none exists
        $client = Client::firstOrCreate([
            'email' => 'test@example.com'
        ], [
            'name' => 'Test Client',
            'phone' => '+977-1-1234567',
            'project_name' => 'Website Development',
            'start_date' => now(),
            'due_date' => now()->addDays(30),
            'status' => 'In Progress',
            'priority' => 'High'
        ]);

        // Create a sample invoice
        $invoice = Invoice::create([
            'invoice_number' => 'INV000001',
            'client_id' => $client->id,
            'invoice_date' => now(),
            'due_date' => now()->addDays(30),
            'vat_rate' => 13.00,
            'subtotal' => 50000.00,
            'vat_amount' => 6500.00,
            'total_amount' => 56500.00,
            'notes' => 'Website development and hosting services',
            'terms_conditions' => 'Payment due within 30 days. Late payments may incur additional charges.',
            'status' => 'draft',
            'currency' => 'NPR'
        ]);

        // Create invoice items
        InvoiceItem::create([
            'invoice_id' => $invoice->id,
            'description' => 'Website Design & Development',
            'quantity' => 1,
            'unit_price' => 30000.00,
            'total' => 30000.00
        ]);

        InvoiceItem::create([
            'invoice_id' => $invoice->id,
            'description' => 'Domain Registration (1 year)',
            'quantity' => 1,
            'unit_price' => 2000.00,
            'total' => 2000.00
        ]);

        InvoiceItem::create([
            'invoice_id' => $invoice->id,
            'description' => 'Web Hosting (1 year)',
            'quantity' => 1,
            'unit_price' => 18000.00,
            'total' => 18000.00
        ]);
    }
} 