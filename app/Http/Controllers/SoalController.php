<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Soal;

class SoalController extends Controller
{
    public function index(Request $request)
    {
        $query = Soal::query();

        // Filter by category (untuk dropdown "All Category")
        if ($request->filled('category')) {
            $query->where('kategori', $request->category);
        }

        if ($request->filled('search')) {
            $query->where('isiSoal', 'LIKE', '%' . $request->search . '%');
        }

        $soal = $query->paginate(10); // 10 per halaman
        $total = Soal::count();

        return view('questions.index', compact('soal', 'total'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori'      => 'required',
            'isiSoal'    => 'required',
            'opsiA'     => 'required',
            'opsiB'     => 'required',
            'opsiC'     => 'required',
            'opsiD'     => 'required',
            'jawabanBenar' => 'required',
        ]);

        Soal::create([
            'isiSoal'    => $request->isiSoal,
            'opsiA'     => $request->opsiA,
            'opsiB'     => $request->opsiB,
            'opsiC'     => $request->opsiC,
            'opsiD'     => $request->opsiD,
            'jawabanBenar' => $request->jawabanBenar,
            'kategori'      => $request->kategori,
        ]);

        return redirect()->route('questions.index')->with('success', 'Successfully added a question!');
    }

    public function edit($id)
    {
        $question = Soal::findOrFail($id);
        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori'     => 'required',
            'jawabanBenar' => 'required',
            'isiSoal'      => 'required',
            'opsiA'        => 'required',
            'opsiB'        => 'required',
            'opsiC'        => 'required',
            'opsiD'        => 'required',
        ]);

        $question = Soal::findOrFail($id);
        $question->update([
            'kategori'     => $request->kategori,
            'jawabanBenar' => $request->jawabanBenar,
            'isiSoal'      => $request->isiSoal,
            'opsiA'        => $request->opsiA,
            'opsiB'        => $request->opsiB,
            'opsiC'        => $request->opsiC,
            'opsiD'        => $request->opsiD,
        ]);

        return redirect()->route('questions.index')->with('success', 'Question updated successfully.');
    }

    public function destroy($id)
    {
        $question = Soal::findOrFail($id);
        $question->delete();

        return redirect()->route('questions.index')->with('success', 'Question deleted successfully.');
    }
}
