<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ContactsController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'index', 'create', 'store', 'show', 'edit', 'update', 'detail', 'destroy'
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            $contacts = Contacts::all();
            return view('auth.index', compact('contacts'));
        }

        return redirect()->route('login')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }

    public function create()
    {
        if (Auth::check()) {
            return view('auth.create');
        }

        return redirect()->route('login')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5',
            'email' => 'required|email|unique:contacts',
            'number' => 'required|max:9'
        ]);

        Contacts::create([
            'name' => $request->name,
            'number' => $request->number,
            'email' => $request->email
        ]);

        return redirect()->route('index')
            ->withSuccess('You have successfully registered!');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        if (Auth::check()) {
            $contacts = Contacts::all();
            return view('auth.show_all', compact('contacts'));
        }

        return redirect()->route('login')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Auth::check()) {
            $request->validate([
                'name' => 'required|string|min:5',
                'email' => 'required|email|unique:contacts',
                'number' => 'required|max:9|unique:contacts'
            ]);

            $contact = Contacts::find($id);
            $contact->update($request->all());

            return redirect()->route('index')
                ->withSuccess('Contact updated successfully.');
        }
        return redirect()->route('login')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }

    public function edit($id)
    {
        if (Auth::check()) {
            $contact = Contacts::find($id);
            return view('auth.edit', compact('contact'));
        }

        return redirect()->route('login')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }

    public function detail($id)
    {
        if (Auth::check()) {
            $contact = Contacts::find($id);
            return view('auth.detail', compact('contact'));
        }

        return redirect()->route('login')
            ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contact = Contacts::find($id);
        $contact->delete();

        return redirect()->route('index')
            ->withSuccess('You have successfully Deleted!');
    }
}
