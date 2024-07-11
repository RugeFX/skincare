<div class="flex flex-col gap-y-12 items-stretch justify-center mx-auto">
    <div class="flex max-md:flex-col items-center gap-4">
        @if ($question->icon)
            <img src="{{ $question->icon_link }}" alt="icon" class="aspect-square w-24">
        @endif
        <div class="flex flex-col gap-y-2">
            <h2 class="text-4xl font-bold">{{ $question->question }}</h2>
            @if ($question->description)
                <p class="text-gray-600">{{ $question->description }}</p>
            @endif
        </div>
    </div>
    <span>
        <ul @class([
    'grid sm:grid-cols-3 justify-stretch gap-4',
    "md:grid-cols-{$question->options_count}" => $question->options_count <= 5,
])>
            @foreach ($question->options as $questionOption)
                        @php
                            $type = $question->answer_type == 'single' ? 'radio' : 'checkbox';
                            $inputName = $question->answer_type == 'single' ? $question->label : "{$question->label}[]";
                            // dd($question->answer_type);
                            $isChecked =
                                $question->answer_type == 'single'
                                ? session($question->label) == $questionOption->label
                                : in_array($questionOption->label, Request::session()->get($question->label, []));
                        @endphp
                        <li>
                            <input type="{{ $type }}" name="{{ $inputName }}" id="{{ $loop->iteration }}"
                                value="{{ $questionOption->label }}" class="hidden peer" @checked($isChecked)>
                            <label for="{{ $loop->iteration }}"
                                class="inline-flex cursor-pointer w-full h-full p-4 bg-white text-gray-600 border-2 border-white rounded-xl hover:border-light-coral peer-checked:bg-light-coral peer-checked:text-white">
                                <div @class([
                    'flex flex-col justify-stretch gap-y-4 flex-1',
                    'items-center' => !$questionOption->description,
                ])>
                                    @if ($questionOption->icon)
                                        <img src="{{ $questionOption->icon_link }}" alt="icon" class="aspect-square w-20">
                                    @endif
                                    <p class="font-semibold">{{ $questionOption->label }}</p>
                                    @if ($questionOption->description)
                                        <p>{{ $questionOption->description }}</p>
                                    @endif
                                </div>
                            </label>
                        </li>
            @endforeach
        </ul>
        @error($question->label)
            <div class="text-sm text-red-500 mt-2 text-center">{{ $message }}</div>
        @enderror
    </span>
    <input type="hidden" name="label" value="{{ $question->label }}" class="hidden">
    <span class="hidden md:grid-cols-3"></span>
    <span class="hidden md:grid-cols-4"></span>
    <span class="hidden md:grid-cols-5"></span>
</div>