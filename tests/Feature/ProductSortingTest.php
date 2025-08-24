<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Layanan;
use App\Models\Kategori;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductSortingTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_update_product_sort_order()
    {
        // Create test data
        $kategori = Kategori::factory()->create();

        $layanan1 = Layanan::factory()->create([
            'kategori_id' => $kategori->id,
            'sort_order' => 1
        ]);

        $layanan2 = Layanan::factory()->create([
            'kategori_id' => $kategori->id,
            'sort_order' => 2
        ]);

        $layanan3 = Layanan::factory()->create([
            'kategori_id' => $kategori->id,
            'sort_order' => 3
        ]);

        // Test updating sort order
        $response = $this->post('/layanan/sort', [
            'layanan_ids' => [$layanan3->id, $layanan1->id, $layanan2->id]
        ]);

        $response->assertStatus(200);
        $response->assertJson(['success' => true]);

        // Verify the order was updated
        $this->assertEquals(1, Layanan::find($layanan3->id)->sort_order);
        $this->assertEquals(2, Layanan::find($layanan1->id)->sort_order);
        $this->assertEquals(3, Layanan::find($layanan2->id)->sort_order);
    }

    public function test_sort_order_validation()
    {
        $response = $this->post('/layanan/sort', [
            'layanan_ids' => []
        ]);

        $response->assertStatus(422);
    }

    public function test_products_are_ordered_by_sort_order()
    {
        // Create test data
        $kategori = Kategori::factory()->create();

        $layanan1 = Layanan::factory()->create([
            'kategori_id' => $kategori->id,
            'sort_order' => 3
        ]);

        $layanan2 = Layanan::factory()->create([
            'kategori_id' => $kategori->id,
            'sort_order' => 1
        ]);

        $layanan3 = Layanan::factory()->create([
            'kategori_id' => $kategori->id,
            'sort_order' => 2
        ]);

        // Get layanan ordered by sort_order
        $orderedLayanan = Layanan::where('kategori_id', $kategori->id)
            ->orderBy('sort_order', 'asc')
            ->get();

        // Verify order
        $this->assertEquals($layanan2->id, $orderedLayanan[0]->id);
        $this->assertEquals($layanan3->id, $orderedLayanan[1]->id);
        $this->assertEquals($layanan1->id, $orderedLayanan[2]->id);
    }
}
