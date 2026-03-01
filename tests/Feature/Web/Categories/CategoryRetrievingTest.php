<?php

namespace Tests\Feature\Web\Categories;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;

class CategoryRetrievingTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_check_if_categories_page_open_successfully(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('categories.index'));
        $response->assertStatus(200);
        $response->assertViewIs('categories.index');
        $response->assertSeeText('Add New Category');
    }
    public function test_check_if_categories_contains_categories(): void
    {
        $categories = Category::factory()->count(4)->create();
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('categories.index'));
        $response->assertStatus(200);
        $response->assertViewHas('categories',function($items) use ($categories){
            return $items->count() === $categories->count();
        });
        $response->assertSeeText('Add New Category');
    }
}
