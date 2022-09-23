<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Buku;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_render_home_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_render_buku_page()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user);
        $response->get('/buku')
        ->assertSeeText('DATA BUKU')
        ->assertSeeText('ID Buku')
        ->assertSeeText('Judul')
        ->assertSeeText('Penerbit')
        ->assertSeeText('Pengarang')
        ->assertSeeText('Jenis')
        ->assertSeeText('Stok')
        ->assertSeeText('Action')
        ->assertStatus(200);
    }

    public function test_store_buku()
    {
        Buku::create([
            'judul' => 'apalah',
            'penerbit' => 'clover',
            'pengarang' => 'sujiwo tejo',
            'jenis' => 'buku',
            'stok' => 1,
        ]);

        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get('/buku/create');
        $response->assertStatus(200);
    }

    public function test_edit_buku()
    {
        $buku = Buku::create([
            'judul' => 'apalah',
            'penerbit' => 'clover',
            'pengarang' => 'sujiwo tejo',
            'jenis' => 'buku',
            'stok' => 1,
        ]);

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/buku/'.$buku->id.'/edit');
        $response->assertStatus(200);
        Buku::where('judul', 'apalah')->update(['judul' => 'yaitu']);

        $response = $this->actingAs($user)->get('/buku');

        $response->assertSeeText('yaitu');

    }

    public function test_delete_buku()
    {
        Buku::where('judul', 'yaitu')->delete();

        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/buku');

        $response->assertDontSee('yaitu');
    }
}
