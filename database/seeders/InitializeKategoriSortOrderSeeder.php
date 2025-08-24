<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class InitializeKategoriSortOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua kategori yang belum memiliki sort_order
        $kategoris = Kategori::whereNull('sort_order')
            ->orWhere('sort_order', 0)
            ->orderBy('created_at', 'asc')
            ->get();

        // Set sort_order berdasarkan urutan created_at
        foreach ($kategoris as $index => $kategori) {
            $kategori->update(['sort_order' => $index + 1]);
        }

        $this->command->info('Kategori sort order berhasil diinisialisasi!');
    }
}
