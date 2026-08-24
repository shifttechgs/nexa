<?php

namespace App\Models;

use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Support\Collection;

/**
 * Sample product catalog for this demo site — hardcoded, no database table.
 */
class Product implements UrlRoutable
{
    public function __construct(
        public string $name,
        public string $slug,
        public string $sku,
        public string $category,
        public string $summary,
        public ?string $description = null,
    ) {
    }

    public static function all(): Collection
    {
        return collect([
            new self(
                name: 'Surface Bulk Emulsion',
                slug: 'surface-bulk-emulsion',
                sku: 'EXP-001',
                category: 'Explosives',
                summary: 'Bulk-manufactured emulsion explosive for large-scale surface blasting operations.',
            ),
            new self(
                name: 'Flotation Reagents',
                slug: 'flotation-reagents',
                sku: 'CHM-001',
                category: 'Mining Chemicals',
                summary: 'Reagents supporting froth flotation for copper and cobalt ore processing.',
            ),
            new self(
                name: 'Jaw Crusher Wear Parts',
                slug: 'jaw-crusher-wear-parts',
                sku: 'CRS-001',
                category: 'Crushing Equipment',
                summary: 'Manganese wear liners and jaw plates for primary crushing circuits.',
            ),
            new self(
                name: 'Standard PPE Kits',
                slug: 'standard-ppe-kits',
                sku: 'PPE-001',
                category: 'Mining Safety Gear',
                summary: 'Site PPE: helmets, boots, gloves, eye and hearing protection.',
            ),
        ]);
    }

    public static function findBySlug(string $slug): ?self
    {
        return static::all()->firstWhere('slug', $slug);
    }

    public function getRouteKey(): string
    {
        return $this->slug;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function resolveRouteBinding($value, $field = null): ?self
    {
        return static::findBySlug($value);
    }

    public function resolveChildRouteBinding($childType, $value, $field): ?self
    {
        return $this->resolveRouteBinding($value, $field);
    }
}
