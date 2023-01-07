<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Invoice;


class InvoiceController extends Controller
{
    public function index()
    {
        return view('invoice.index');
    }

    /**
     * @throws BindingResolutionException
     */
    public function show( $id)
    {
        $DBinvoice = \App\Models\Invoice::findOrFail($id);
        $customer = new Buyer([
            'name'          => $DBinvoice->user->name,
            'custom_fields' => [
                'email' => $DBinvoice->user->email,
            ],
        ]);

        $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);

        $invoice = Invoice::make()
            ->buyer($customer)
            ->discountByPercent(10)
            ->taxRate(15)
            ->shipping(1.99)
            ->addItem($item);

        return $invoice->stream();
    }
}
