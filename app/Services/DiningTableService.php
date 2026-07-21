<?php

namespace App\Services;

use App\DTOs\DiningTable\CreateDiningTableDTO;
use App\DTOs\DiningTable\UpdateDiningTableDTO;
use App\Models\DiningTable;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DiningTableService
{
    /** @return Collection<int, DiningTable> */
    public function getDiningTablesForUser(User $user): Collection
    {
        return $user->diningTables()->with('users')->orderBy('name')->get();
    }

    public function create(CreateDiningTableDTO $diningTableData): DiningTable
    {
        return DB::transaction(function () use ($diningTableData) {
            $diningTable = DiningTable::create(['name' => $diningTableData->name]);

            $diningTable->users()->attach($diningTableData->ownerId, [
                'is_owner' => true,
                'is_guest' => false,
            ]);

            return $diningTable;
        });
    }

    public function update(DiningTable $diningTable, UpdateDiningTableDTO $diningTableData): DiningTable
    {
        $diningTable->update(['name' => $diningTableData->name]);

        return $diningTable;
    }

    public function delete(DiningTable $diningTable): ?bool
    {
        return $diningTable->delete();
    }
}
