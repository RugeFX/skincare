<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class Progress extends Component
{
    public array $group = [
        [
            'name' => 'Tentang Diri',
            'question_count' => 3,
            'order' => 1,
            'active' => false,
            'complete' => false,
        ],
        [
            'name' => 'Kulit',
            'question_count' => 0,
            'order' => 2,
            'active' => false,
            'complete' => false,
        ],
        [
            'name' => 'Gaya Hidup',
            'question_count' => 0,
            'order' => 3,
            'active' => false,
            'complete' => false,
        ],
    ];

    /**
     * Create a new component instance.
     */
    public function __construct(public int $step)
    {
        $groupedQuestionsCount = Question::select('group', DB::raw('count(*) as total'))
            ->groupBy('group')
            ->orderByRaw('FIELD(`group`, "kulit", "gaya-hidup")')
            ->get();

        // Set status active dan complete berdasarkan langkah saat ini
        $previous_count = 0;
        $this->group = collect($this->group)->map(function ($category) use (&$previous_count, $groupedQuestionsCount) {
            if ($category['name'] == 'Kulit') {
                $category['question_count'] = $groupedQuestionsCount[0]->total ?? 0;
            }
            if ($category['name'] == 'Gaya Hidup') {
                $category['question_count'] = $groupedQuestionsCount[1]->total ?? 0;
            }

            $startRange = $previous_count + 1;
            $endRange = $previous_count + $category['question_count'];

            $category['active'] = $this->step >= $startRange && $this->step <= $endRange;
            $category['complete'] = $this->step > $endRange;

            $previous_count = $endRange;

            return $category;
        })
            ->filter(fn($category) => $category['question_count'] > 0)
            ->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // dd("wot");
        return view('components.progress', ['group' => $this->group, 'step' => $this->step]);
    }
}
