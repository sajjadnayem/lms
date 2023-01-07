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

        $item = [];
        foreach ($DBinvoice->items as $item) {
            $items[] = (new InvoiceItem())->title($item->name)->pricePerUnit($item->price)->quantity($item->quantity);
        }

        // payments
        foreach($DBinvoice->payments as $payment) {
            $items[] = (new InvoiceItem())->title('Payment')->pricePerUnit(-$payment->amount)->quantity(1);
        }



        $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);

        $invoice = Invoice::make()
            ->buyer($customer)
            ->addItems($items)
            ->currencySymbol('$')
            ->currencyCode('USD')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',');

        return $invoice->stream();
    }
}
