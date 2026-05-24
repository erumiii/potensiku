<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soal;

class QuestionController extends Controller
{
    public function edit($id)
    {
        $question = Soal::findOrFail($id);

        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, $id)
    {
        $question = Soal::findOrFail($id);

        $question->question = $request->question;
        $question->category = $request->category;

        $question->save();

        return redirect('/questions');
    }
}