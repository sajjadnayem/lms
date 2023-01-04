<div>
   <table class="w-full table-auto">
       <tr>
           <th class="border px-4 py-2 text-left">Name</th>
           <th class="border px-4 py-2 text-left">Email</th>
           <th class="border px-4 py-2 text-left">Phone</th>
           <th class="border px-4 py-2">Registered</th>
           <th class="border px-4 py-2">Action</th>
       </tr>
       @foreach($leads as $lead)
           <tr>
                <td class="border px-4 py-2">{{ $lead->name }}</td>
                <td class="border px-4 py-2">{{ $lead->email }}</td>
                <td class="border px-4 py-2">{{ $lead->phone }}</td>
                <td class="border px-4 py- text-center">{{ date('F j, Y', strtotime($lead->created_at)) }}</td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-center">
                        <a href="{{ route('lead.edit', $lead->id) }}" >@include('components.icons.edit')</a>
                        <a class="px-2" href="{{route('lead.show', $lead->id)}}">@include('components.icons.view')</a>
                        <form onsubmit="return confirm('Are you Sure?');" wire:submit.prevent="leadDelete({{$lead->id}})">
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
        {{ $leads->links() }}
    </div>
</div>
