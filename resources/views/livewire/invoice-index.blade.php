<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">ID</th>
            <th class="border px-4 py-2 text-left">User</th>
            <th class="border px-4 py-2 text-left">Due Date</th>
            <th class="border px-4 py-2">Amount</th>
            <th class="border px-4 py-2">Paid</th>
            <th class="border px-4 py-2">Due</th>
            <th class="border px-4 py-2">Action</th>
        </tr>
        @foreach($invoices as $invoice)
            <tr>
                <td class="border px-4 py-2">{{ $invoice->id }}</td>
                <td class="border px-4 py-2">{{ $invoice->user->name }}</td>
                <td class="border px-4 py-2">{{ date('F j, Y', strtotime($invoice->due_date))}}</td>
                <td class="border px-4 py- text-center">${{ $invoice->amount()['total']}}</td>
                <td class="border px-4 py- text-center">${{ $invoice->amount()['paid']}}</td>
                <td class="border px-4 py- text-center">${{ $invoice->amount()['due']}}</td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-center">
                        <a href="">@include('components.icons.edit')</a>
                        <a class="px-2" href="">@include('components.icons.view')</a>
                        <form onsubmit="return confirm('Are you Sure?');" wire:submit.prevent="invoiceDelete({{$invoice->id}})">
                            @csrf
                            @method('DELETE')
                            <button type="submit" >@include('components.icons.delete')</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="mt-4">
        {{ $invoices->links() }}
    </div>
</div>

