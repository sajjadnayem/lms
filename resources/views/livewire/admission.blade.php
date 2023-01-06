<div>
    <form wire:submit.prevent="search" class="flex items-center mb-4">
        <input wire:model.lazy="search" type="text"  class="lms-input" placeholder="Search here" required>
        <div class="ml-4">
            <button type="submit" class="lms-btn">Search</button>
        </div>
    </form>

    @if(count($leads) > 0)
       <form wire:submit.prevent="admit">
           <div class="mb-4">
               <select class="lms-input" wire:model.lazy="lead_id">
                   <option value="">Select Leads</option>
                   @foreach($leads as $lead)
                       <option value="{{ $lead->id }}">Name: {{ $lead->name }} - {{ $lead->phone }}</option>
                   @endforeach
               </select>
           </div>

           @if(!empty($lead_id))
               <div class="mb-4">
                   <select class="lms-input" wire:change="courseSelected" wire:model.lazy="course_id"  >
                       <option value="">Select course</option>
                       @foreach($courses as $course)
                           <option value="{{ $course->id }}">{{ $course->name }}</option>
                       @endforeach
                   </select>
               </div>
           @endif
           @if(!empty($selectedCourse))
               <p class="mb-4">Price: ${{number_format($selectedCourse->price, 2)}}</p>

              <div class="mb-4">
                  <input wire:model.lazy="payment" type="number" step=".01" max="{{$selectedCourse->price, 2}}" class="lms-input" placeholder="Payment now">
              </div>
               @include('components.wire-loading-btn')
           @endif
       </form>
    @endif

{{--    <h2>Found {{count($leads)}} items</h2>--}}
</div>
