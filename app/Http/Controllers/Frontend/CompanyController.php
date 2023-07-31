<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function index()
    {
        return redirect()->route('company.dashboard');
    }

    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        try {
            $this->authorize('viewAny', Company::class);
        } catch (AuthorizationException $e) {
            return redirect()->route('company.create')->with('warning', "You don't have agency account yet, please create!");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $this->authorize('create', Company::class);
        } catch (AuthorizationException $e) {
            return redirect()->route('company.dashboard')->with('warning', "You don't have agency account yet, please create!");
        }

        return view('frontend.company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        try {
            $this->authorize('store', Company::class);
            return 'store';
        } catch (AuthorizationException $e) {
            return $e->getMessage();
            //return redirect()->route('company.create')->with('warning', "You don't have agency account yet, please create!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
