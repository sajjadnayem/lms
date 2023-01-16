<form action="" wire:submit.prevent="formSubmit">
    <div class="mb-4">
        @include('components.form-field', [
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'placeholder' => 'Question name',
            'required' => 'required',
        ])
    </div>

   @foreach($answers as $answer)
        <div class="mb-4">
            @include('components.form-field', [
                'name' => 'answer_' . $answer,
                'label' => 'Answer ' . ucfirst($answer),
                'type' => 'text',
                'placeholder' => 'Type answer ' . ucfirst($answer),
                'required' => 'required',
            ])
        </div>
   @endforeach

    <div class="mb-4">
        <label class="lms-level" for="correct_answer">Correct Answer</label>
        <select class="lms-input" wire:model.prevent="correct_answer" id="">
            @foreach($answers as $answer)
                <option value="{{$answer}}">{{ucfirst($answer)}}</option>
            @endforeach
        </select>
    </div>
    @include('components.wire-loading-btn')
</form>
