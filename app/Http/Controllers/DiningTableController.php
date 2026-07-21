<?php

namespace App\Http\Controllers;

use App\DTOs\DiningTable\CreateDiningTableDTO;
use App\DTOs\DiningTable\UpdateDiningTableDTO;
use App\Http\Requests\DiningTableRequest;
use App\Models\DiningTable;
use App\Models\User;
use App\Services\DiningTableService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DiningTableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, DiningTableService $diningTableService): View
    {
        /** @var User $user */
        $user = $request->user();

        $diningTables = $diningTableService->getDiningTablesForUser($user);

        return view('dining-tables.index', compact('diningTables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $diningTable = new DiningTable;

        return view('dining-tables.create', compact('diningTable'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiningTableRequest $request, DiningTableService $diningTableService): RedirectResponse
    {
        $diningTableDTO = CreateDiningTableDTO::fromRequest($request);

        $diningTable = $diningTableService->create($diningTableDTO);

        return redirect()->route('dining-tables.show', [$diningTable]);
    }

    /**
     * Display the specified resource.
     */
    public function show(DiningTable $diningTable): View
    {
        return view('dining-tables.show', compact('diningTable'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DiningTable $diningTable): View
    {
        return view('dining-tables.edit', compact('diningTable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiningTableRequest $request, DiningTable $diningTable, DiningTableService $diningTableService): RedirectResponse
    {
        $diningTableDTO = UpdateDiningTableDTO::fromRequest($request);

        $diningTable = $diningTableService->update($diningTable, $diningTableDTO);

        return redirect()->route('dining-tables.show', [$diningTable]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DiningTable $diningTable, DiningTableService $diningTableService): RedirectResponse
    {
        $diningTableService->delete($diningTable);

        return redirect()->route('dining-tables.index');
    }
}
