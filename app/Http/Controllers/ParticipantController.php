<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

/**
 * Controller Participants
 *
 * Mengatur:
 * - Index (list semua peserta)
 * - Create (form tambah peserta)
 * - Store (simpan peserta baru)
 * - Edit (form edit peserta)
 * - Update (update data peserta)
 * - Destroy (hapus peserta)
 */
class ParticipantController extends Controller
{
    // =====================================================
    // INDEX — tampilkan daftar peserta
    // =====================================================

    public function index(Request $request)
    {
        $query = Participant::with('user');

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search by nama / email / kode
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('participant_code', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($u) use ($search) {
                      $u->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                  });
            });
        }

        $participants = $query->latest()->paginate(10)->withQueryString();

        return view('participants.index', compact('participants'));
    }

    // =====================================================
    // CREATE — form tambah peserta baru
    // =====================================================

    public function create()
    {
        return view('participants.create');
    }

    // =====================================================
    // STORE — simpan peserta baru ke database
    // =====================================================

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'username'    => ['required', 'string', 'max:50', 'unique:users,username'],
            'email'       => ['required', 'email', 'unique:users,email'],
            'password'    => ['required', 'confirmed', Password::min(8)],
            'phone'       => ['nullable', 'string', 'max:20'],
            'address'     => ['nullable', 'string'],
            'birth_date'  => ['nullable', 'date'],
            'gender'      => ['nullable', 'in:male,female'],
            'institution' => ['nullable', 'string', 'max:255'],
            'status'      => ['required', 'in:active,inactive,banned'],
        ]);

        // Buat akun User terlebih dahulu
        $user = User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user',
        ]);

        // Buat data Participant
        Participant::create([
            'user_id'          => $user->id,
            'participant_code' => Participant::generateCode(),
            'phone'            => $request->phone,
            'address'          => $request->address,
            'birth_date'       => $request->birth_date,
            'gender'           => $request->gender,
            'institution'      => $request->institution,
            'status'           => $request->status,
        ]);

        return redirect()
            ->route('participants.index')
            ->with('success', 'Participant added successfully.');
    }

    // =====================================================
    // EDIT — form edit peserta
    // =====================================================

    public function edit(Participant $participant)
    {
        return view('participants.edit', compact('participant'));
    }

    // =====================================================
    // UPDATE — simpan perubahan data peserta
    // =====================================================

    public function update(Request $request, Participant $participant)
    {
        $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'email'       => ['required', 'email', 'unique:users,email,' . $participant->user_id],
            'phone'       => ['nullable', 'string', 'max:20'],
            'address'     => ['nullable', 'string'],
            'birth_date'  => ['nullable', 'date'],
            'gender'      => ['nullable', 'in:male,female'],
            'institution' => ['nullable', 'string', 'max:255'],
            'status'      => ['required', 'in:active,inactive,banned'],
        ]);

        // Update akun User
        $participant->user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        // Update data Participant
        $participant->update([
            'phone'       => $request->phone,
            'address'     => $request->address,
            'birth_date'  => $request->birth_date,
            'gender'      => $request->gender,
            'institution' => $request->institution,
            'status'      => $request->status,
        ]);

        return redirect()
            ->route('participants.index')
            ->with('success', 'Participant updated successfully.');
    }

    // =====================================================
    // DESTROY — hapus peserta
    // =====================================================

    public function destroy(Participant $participant)
    {
        // Hapus user juga (karena cascade)
        $participant->user->delete();

        return redirect()
            ->route('participants.index')
            ->with('success', 'Participant deleted successfully.');
    }
}
