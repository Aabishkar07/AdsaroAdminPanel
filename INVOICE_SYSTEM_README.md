# Invoice Generator System for IT Company

A comprehensive invoice generation system built with Laravel for IT companies to create digital VAT bills and export them as PDF.

## Features

### 🎯 Core Features
- **Complete Invoice Management**: Create, edit, view, and delete invoices
- **VAT Billing Support**: Automatic VAT calculation with customizable rates (default 13% for Nepal)
- **PDF Export**: Generate professional PDF invoices
- **Dynamic Line Items**: Add/remove multiple items with automatic calculations
- **Status Management**: Track invoice status (draft, sent, paid, overdue, cancelled)
- **Client Integration**: Seamless integration with existing client system
- **Payment Tracking**: Record payment methods and dates

### 📊 Invoice Features
- **Auto-generated Invoice Numbers**: Sequential numbering (INV000001, INV000002, etc.)
- **Multiple Currency Support**: Default NPR (Nepalese Rupees)
- **Due Date Tracking**: Automatic overdue detection
- **Notes & Terms**: Add custom notes and terms & conditions
- **Professional PDF Layout**: Clean, professional invoice design

### 🔧 Technical Features
- **Laravel 12 Compatible**: Built with latest Laravel framework
- **Database Migrations**: Proper database structure with relationships
- **Model Relationships**: Proper Eloquent relationships between Invoice, InvoiceItem, and Client
- **Validation**: Comprehensive form validation
- **Error Handling**: Proper error handling and user feedback

## Installation & Setup

### 1. Database Migrations
The system includes the following migrations:
- `create_invoices_table.php` - Main invoice table
- `create_invoice_items_table.php` - Invoice line items table

Run migrations:
```bash
php artisan migrate
```

### 2. PDF Package Installation
The system uses `barryvdh/laravel-dompdf` for PDF generation:
```bash
composer require barryvdh/laravel-dompdf
```

### 3. Sample Data
Run the seeder to create sample data:
```bash
php artisan db:seed --class=InvoiceSeeder
```

## Usage

### Admin Panel Access
1. Navigate to the admin panel
2. Click on "Invoices" in the sidebar menu
3. Manage all invoices from the dashboard

### Creating Invoices
1. Click "Create Invoice" button
2. Select a client from the dropdown
3. Set invoice date and due date
4. Configure VAT rate (default 13%)
5. Add invoice items:
   - Description
   - Quantity
   - Unit Price
   - Total is calculated automatically
6. Add notes and terms (optional)
7. Save the invoice

### Managing Invoices
- **View**: Click the eye icon to view invoice details
- **Edit**: Click the edit icon to modify invoice
- **Download PDF**: Click the download icon to get PDF
- **Preview PDF**: Click the preview icon to view PDF in browser
- **Delete**: Click the trash icon to delete invoice

### Status Management
- **Draft**: Initial state when created
- **Sent**: When invoice is sent to client
- **Paid**: When payment is received
- **Overdue**: When due date has passed
- **Cancelled**: When invoice is cancelled

## Database Structure

### Invoices Table
```sql
- id (Primary Key)
- invoice_number (Unique)
- client_id (Foreign Key)
- invoice_date
- due_date
- subtotal
- vat_rate
- vat_amount
- total_amount
- notes
- terms_conditions
- status (enum)
- payment_method
- paid_date
- currency
- timestamps
```

### Invoice Items Table
```sql
- id (Primary Key)
- invoice_id (Foreign Key)
- description
- quantity
- unit_price
- total
- timestamps
```

## API Endpoints

### Invoice Routes
```php
// Resource routes
Route::resource('invoices', InvoiceController::class);

// Additional routes
Route::put('/invoices/{invoice}/status', [InvoiceController::class, 'updateStatus']);
Route::get('/invoices/{invoice}/pdf', [InvoiceController::class, 'generatePdf']);
Route::get('/invoices/{invoice}/preview', [InvoiceController::class, 'previewPdf']);
```

### Available Methods
- `GET /admin/invoices` - List all invoices
- `GET /admin/invoices/create` - Create new invoice form
- `POST /admin/invoices` - Store new invoice
- `GET /admin/invoices/{id}` - View invoice details
- `GET /admin/invoices/{id}/edit` - Edit invoice form
- `PUT /admin/invoices/{id}` - Update invoice
- `DELETE /admin/invoices/{id}` - Delete invoice
- `PUT /admin/invoices/{id}/status` - Update invoice status
- `GET /admin/invoices/{id}/pdf` - Download PDF
- `GET /admin/invoices/{id}/preview` - Preview PDF

## Models

### Invoice Model
```php
class Invoice extends Model
{
    // Relationships
    public function client(): BelongsTo
    public function items(): HasMany
    
    // Methods
    public function calculateTotals(): void
    public function generateInvoiceNumber(): string
    public function isOverdue(): bool
    public function getStatusBadgeClass(): string
}
```

### InvoiceItem Model
```php
class InvoiceItem extends Model
{
    // Relationships
    public function invoice(): BelongsTo
    
    // Auto-calculate total on save
    protected static function boot()
}
```

## PDF Generation

### Features
- Professional invoice layout
- Company branding support
- Client information display
- Itemized list with totals
- VAT calculation display
- Payment information
- Terms and conditions

### Customization
Edit `resources/views/admin/invoices/pdf.blade.php` to customize:
- Company information
- Logo placement
- Color scheme
- Layout structure
- Payment details

## Commands

### Generate Invoice Number
```bash
php artisan invoice:generate-number
```
Returns the next available invoice number.

## Configuration

### VAT Rate
Default VAT rate is set to 13% (Nepal standard). Can be customized per invoice.

### Currency
Default currency is NPR (Nepalese Rupees). Can be changed in the invoice model.

### Invoice Number Format
Current format: `INV` + 6-digit number (e.g., INV000001)
Customize in `Invoice::generateInvoiceNumber()` method.

## Security Features

- **Admin Middleware**: All routes protected by admin middleware
- **Form Validation**: Comprehensive input validation
- **CSRF Protection**: All forms include CSRF tokens
- **SQL Injection Protection**: Using Eloquent ORM
- **XSS Protection**: Blade templating with automatic escaping

## Error Handling

- **Database Transactions**: Ensures data integrity
- **Validation Errors**: User-friendly error messages
- **PDF Generation Errors**: Graceful fallback
- **File Permission Errors**: Proper error handling

## Browser Compatibility

- **Modern Browsers**: Chrome, Firefox, Safari, Edge
- **Responsive Design**: Works on desktop and mobile
- **JavaScript Required**: For dynamic calculations

## Performance Optimizations

- **Eager Loading**: Relationships loaded efficiently
- **Database Indexing**: Proper indexes on foreign keys
- **Caching**: PDF generation can be cached
- **Pagination**: Large invoice lists are paginated

## Troubleshooting

### Common Issues

1. **PDF Not Generating**
   - Check if DomPDF package is installed
   - Verify file permissions
   - Check server memory limits

2. **Invoice Numbers Not Sequential**
   - Check database for gaps
   - Verify invoice number generation logic

3. **Calculations Not Working**
   - Check JavaScript console for errors
   - Verify form validation

### Debug Commands
```bash
# Check invoice count
php artisan tinker
>>> App\Models\Invoice::count()

# Generate test invoice number
php artisan invoice:generate-number

# Clear cache if needed
php artisan cache:clear
```

## Future Enhancements

- **Email Integration**: Send invoices via email
- **Payment Gateway**: Online payment processing
- **Invoice Templates**: Multiple template options
- **Bulk Operations**: Mass invoice operations
- **Reporting**: Invoice analytics and reports
- **Multi-language**: Support for multiple languages
- **API Integration**: RESTful API for external systems

## Support

For technical support or feature requests, please contact the development team.

---

**Version**: 1.0.0  
**Last Updated**: January 2025  
**Compatibility**: Laravel 12.x, PHP 8.2+ 
