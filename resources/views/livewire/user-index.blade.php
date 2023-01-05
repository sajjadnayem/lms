<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Email</th>
            <th class="border px-4 py-2">Registered</th>
            <th class="border px-4 py-2">Action</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td class="border px-4 py-2">{{ $user->name }}</td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
                <td class="border px-4 py- text-center">{{ date('F j, Y', strtotime($user->created_at)) }}</td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-center">
                        <a href="{{ route('lead.edit', $user->id) }}" >@include('components.icons.edit')</a>
                        <a class="px-2" href="{{route('lead.show', $user->id)}}">@include('components.icons.view')</a>
                        <form onsubmit="return confirm('Are you Sure?');" wire:submit.prevent="leadDelete({{$user->id}})">
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
        {{ $users->links() }}
    </div>
</div>
