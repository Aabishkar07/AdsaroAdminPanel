<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('client')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.invoices.index', compact('invoices'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('admin.invoices.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date|after:invoice_date',
            'vat_rate' => 'required|numeric|min:0|max:100',
            'notes' => 'nullable|string',
            'terms_conditions' => 'nullable|string',
            'items' => 'required|array|min:1',
            'items.*.description' => 'required|string',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();
        try {
            $invoice = Invoice::create([
                'invoice_number' => (new Invoice())->generateInvoiceNumber(),
                'client_id' => $request->client_id,
                'invoice_date' => $request->invoice_date,
                'due_date' => $request->due_date,
                'vat_rate' => $request->vat_rate,
                'notes' => $request->notes,
                'terms_conditions' => $request->terms_conditions,
                'subtotal' => 0,
                'vat_amount' => 0,
                'total_amount' => 0,
            ]);

            foreach ($request->items as $item) {
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'description' => $item['description'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                ]);
            }

            $invoice->calculateTotals();

            DB::commit();

            return redirect()->route('admin.invoices.index')
                ->with('success', 'Invoice created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error creating invoice: ' . $e->getMessage());
        }
    }

    public function show(Invoice $invoice)
    {
        $invoice->load(['client', 'items']);
        return view('admin.invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        $clients = Client::all();
        $invoice->load('items');
        return view('admin.invoices.edit', compact('invoice', 'clients'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date|after:invoice_date',
            'vat_rate' => 'required|numeric|min:0|max:100',
            'notes' => 'nullable|string',
            'terms_conditions' => 'nullable|string',
            'items' => 'required|array|min:1',
            'items.*.description' => 'required|string',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();
        try {
            $invoice->update([
                'client_id' => $request->client_id,
                'invoice_date' => $request->invoice_date,
                'due_date' => $request->due_date,
                'vat_rate' => $request->vat_rate,
                'notes' => $request->notes,
                'terms_conditions' => $request->terms_conditions,
            ]);

            // Delete existing items
            $invoice->items()->delete();

            // Create new items
            foreach ($request->items as $item) {
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'description' => $item['description'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                ]);
            }

            $invoice->calculateTotals();

            DB::commit();

            return redirect()->route('admin.invoices.index')
                ->with('success', 'Invoice updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error updating invoice: ' . $e->getMessage());
        }
    }

    public function destroy(Invoice $invoice)
    {
        try {
            $invoice->delete();
            return redirect()->route('admin.invoices.index')
                ->with('success', 'Invoice deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting invoice: ' . $e->getMessage());
        }
    }

    public function updateStatus(Request $request, Invoice $invoice)
    {
        $request->validate([
            'status' => 'required|in:draft,sent,paid,overdue,cancelled',
            'payment_method' => 'nullable|string',
            'paid_date' => 'nullable|date',
        ]);

        $data = ['status' => $request->status];

        if ($request->status === 'paid') {
            $data['payment_method'] = $request->payment_method;
            $data['paid_date'] = $request->paid_date ?? now();
        }

        $invoice->update($data);

        return redirect()->route('admin.invoices.index')
            ->with('success', 'Invoice status updated successfully!');
    }

    public function generatePdf(Invoice $invoice)
    {
        $invoice->load(['client', 'items']);

        $pdf = PDF::loadView('admin.invoices.pdf', compact('invoice'));

        return $pdf->download("invoice-{$invoice->invoice_number}.pdf");
    }

    public function previewPdf(Invoice $invoice)
    {
        $invoice->load(['client', 'items']);

        $pdf = PDF::loadView('admin.invoices.pdf', compact('invoice'));

        return $pdf->stream("invoice-{$invoice->invoice_number}.pdf");
    }
}
