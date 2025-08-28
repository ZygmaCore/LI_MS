<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Barang;
use App\Models\Lab;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BarangTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function bisa_melihat_daftar_barang()
    {
        $lab = Lab::factory()->create();
        Barang::factory()->count(3)->create(['lab_id' => $lab->id]);

        $response = $this->getJson('/api/barangs');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    /** @test */
    public function bisa_menambah_barang()
    {
        $lab = Lab::factory()->create();

        $data = [
            'nama_barang' => 'Mikroskop',
            'kode_barang' => 'BRG001',
            'jumlah_total' => 5,
            'lab_id' => $lab->id,
        ];

        $response = $this->postJson('/api/barangs', $data);

        $response->assertStatus(201)
            ->assertJsonFragment(['nama_barang' => 'Mikroskop']);

        $this->assertDatabaseHas('barangs', ['kode_barang' => 'BRG001']);
    }

    /** @test */
    public function bisa_melihat_detail_barang()
    {
        $lab = Lab::factory()->create();
        $barang = Barang::factory()->create(['lab_id' => $lab->id]);

        $response = $this->getJson("/api/barangs/{$barang->id}");

        $response->assertStatus(200)
            ->assertJsonFragment(['id' => $barang->id]);
    }

    /** @test */
    public function bisa_update_barang()
    {
        $lab = Lab::factory()->create();
        $barang = Barang::factory()->create([
            'nama_barang' => 'Laptop',
            'kode_barang' => 'BRG123',
            'jumlah_total' => 10,
            'lab_id' => $lab->id,
        ]);

        $data = ['nama_barang' => 'Laptop Gaming'];

        $response = $this->putJson("/api/barangs/{$barang->id}", $data);

        $response->assertStatus(200)
            ->assertJsonFragment(['nama_barang' => 'Laptop Gaming']);

        $this->assertDatabaseHas('barangs', ['nama_barang' => 'Laptop Gaming']);
    }

    /** @test */
    public function bisa_delete_barang()
    {
        $lab = Lab::factory()->create();
        $barang = Barang::factory()->create(['lab_id' => $lab->id]);

        $response = $this->deleteJson("/api/barangs/{$barang->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('barangs', ['id' => $barang->id]);
    }
}
