<header class="bg-white py-8">
    <div class="container px-4">
        <div class="flex items-start justify-center">
            @foreach ($group as $category)
                        <div @class([
                    'step-item',
                    'active' => $category['active'],
                    'complete' => $category['complete'],
                ])>
                            <div class="number">
                                @if ($category['complete'])
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" class="size-7">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                @else
                                    {{ $category['order'] }}
                                @endif
                            </div>
                            <p @class(['text-center'])>{{ $category['name'] }}</p>
                        </div>
            @endforeach
            <div @class(['step-item', 'active' => $step == session('totalStep')])>
                <div class="number">
                    {{ count($group) + 1 }}
                </div>
                <p @class(['text-center'])>Hasil Skin Test</p>
            </div>
        </div>
    </div>
</header>