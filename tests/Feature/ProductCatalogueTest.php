<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductCatalogueTest extends TestCase
{
    public function test_catalogue_lists_products_and_categories(): void
    {
        $this->get('/products')
            ->assertOk()
            ->assertSee('Surface Bulk Emulsion')
            ->assertSee('Conveyor Belting')
            ->assertSee('Mining Safety Gear');
    }

    public function test_catalogue_ignores_unknown_category(): void
    {
        $this->get('/products?category=Nope')->assertOk();
    }

    public function test_product_page_shows_specs_and_related_products(): void
    {
        $this->get('/products/surface-bulk-emulsion')
            ->assertOk()
            ->assertSee('EXP-001')
            ->assertSee('Hole diameter')
            ->assertSee('More in Explosives');
    }

    public function test_unknown_product_is_404(): void
    {
        $this->get('/products/not-a-product')->assertNotFound();
    }

    public function test_home_page_links_to_full_catalogue(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('View all products');
    }

    public function test_quote_request_accepts_a_quote_list_without_a_message(): void
    {
        $this->post('/quote-requests', [
            'name' => 'Test Buyer',
            'email' => 'buyer@example.com',
            'items' => [
                ['sku' => 'EXP-001', 'name' => 'Surface Bulk Emulsion', 'qty' => 20],
            ],
        ])->assertSessionHasNoErrors()->assertSessionHas('status', 'quote-request-sent');
    }

    public function test_quote_request_needs_a_message_or_items(): void
    {
        $this->post('/quote-requests', [
            'name' => 'Test Buyer',
            'email' => 'buyer@example.com',
        ])->assertSessionHasErrors('message');
    }

    public function test_quote_request_rejects_bad_quantities(): void
    {
        $this->post('/quote-requests', [
            'name' => 'Test Buyer',
            'email' => 'buyer@example.com',
            'items' => [
                ['sku' => 'EXP-001', 'name' => 'Surface Bulk Emulsion', 'qty' => 0],
            ],
        ])->assertSessionHasErrors('items.0.qty');
    }
}
