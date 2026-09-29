<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
        public function create()
    {
        return view('admin.questions.create');
    }

      public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => ['required', 'string'],
            'type' => ['required', 'in:multiple_choice,open'],
            'answer_a' => ['nullable', 'string'],
            'answer_b' => ['nullable', 'string'],
            'answer_c' => ['nullable', 'string'],
            'correct_answer' => ['nullable', 'string'],
            'points' => ['required', 'integer', 'min:1'],
            'feedback' => ['nullable', 'string'],
        ]);

        Question::create($validated);

        return redirect()
            ->route('admin.questions.create')
            ->with('success', 'Vraag succesvol opgeslagen.');
    }

}
