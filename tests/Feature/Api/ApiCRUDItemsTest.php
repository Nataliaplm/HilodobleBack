<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Item;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiCRUDItemsTest extends TestCase
{
    /**
     * @return void 
     */
    
    Use RefreshDatabase;
    
    public function test_ItemsListedInJson()
    {
        Item::factory(2)->create();

        $response = $this->get(route('itemsApi'));
        
        $response->assertStatus(200)
            ->assertJsonCount(2);
    }

    public function testAnItemCanBeShownInJson()
    {
        $item = Item::factory()->create();

        $response = $this->getJson("/api/showItem/{$item->id}");

        $response->assertOk()
            ->assertJson([
                'itemName'=> $item->itemName,
                'category'=> $item->category,
                'description'=> $item->description,
                'image'=> $item->image,
                'stockQuantity'=> $item->stockQuantity,
                'purchaseQuantity'=> $item->purchaseQuantity,
                'price'=> $item->price,
            ]);
    }
}