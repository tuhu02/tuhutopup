<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitializeSortOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Update semua layanan yang belum memiliki sort_order
        $layanans = DB::table('layanans')
            ->whereNull('sort_order')
            ->orWhere('sort_order', 0)
            ->orderBy('created_at', 'asc')
            ->get();

        $sortOrder = 1;
        foreach ($layanans as $layanan) {
            DB::table('layanans')
                ->where('id', $layanan->id)
                ->update(['sort_order' => $sortOrder]);
            $sortOrder++;
        }

        $this->command->info("Berhasil menginisialisasi sort_order untuk {$layanans->count()} layanan.");
    }
}
