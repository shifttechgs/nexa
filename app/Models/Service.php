<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * Nexa's six service lines — hardcoded, no database table. Used by the home page
 * services section and the /services page.
 */
class Service
{
    public function __construct(
        public string $title,
        public string $slug,
        public string $summary,
        public string $image,
        public string $alt,
        public array $tags,
        public array $includes,
        public ?string $productCategory = null,
    ) {
    }

    public static function all(): Collection
    {
        return collect(static::rows())->map(fn (array $row) => new self(
            title: $row['title'],
            slug: Str::slug($row['title']),
            summary: $row['summary'],
            image: $row['image'],
            alt: $row['alt'],
            tags: $row['tags'],
            includes: $row['includes'],
            productCategory: $row['productCategory'] ?? null,
        ));
    }

    public function imageUrl(): string
    {
        return asset('images/photos/'.$this->image);
    }

    protected static function rows(): array
    {
        return [
            [
                'title' => 'Mining & Industrial Supply',
                'summary' => 'Explosives, mining chemicals, crushing equipment, safety gear, plant spares and conveyor mechanical spares for gold, copper, cobalt, PGM, diamond, chrome, lithium and tantalite mines.',
                'image' => 'rock-strata.jpg',
                'alt' => 'Rock face at an open-pit mine',
                'tags' => ['Explosives', 'Consumables'],
                'includes' => ['Explosives and initiating systems', 'Mining chemicals and reagents', 'Crushing equipment and wear parts', 'Mining safety gear and PPE', 'Plant and equipment spares', 'Conveyor mechanical spares'],
                'productCategory' => 'All',
            ],
            [
                'title' => 'Mining Operations Consulting',
                'summary' => 'Drilling and blasting, ground support, loading and hauling, and mine dewatering services.',
                'image' => 'hero-excavator.jpg',
                'alt' => 'Heavy excavator at an open-pit mining operation',
                'tags' => ['Drill & Blast', 'Load & Haul'],
                'includes' => ['Drilling and blasting', 'Ground support', 'Loading and hauling', 'Mine dewatering'],
            ],
            [
                'title' => 'Equipment & Logistics',
                'summary' => 'Rental and sale of mining equipment and machinery, with after-sales service, maintenance and spare parts.',
                'image' => 'crusher-machine.jpg',
                'alt' => 'Mobile crusher processing rock at a quarry site',
                'tags' => ['Rental & Sale', 'After-sales'],
                'includes' => ['Equipment and machinery rental', 'Equipment and machinery sales', 'After-sales service and maintenance', 'Spare parts'],
                'productCategory' => 'Plant & Equipment Spares',
            ],
            [
                'title' => 'Fuel & Energy',
                'summary' => 'Bulk fuel export, transportation, delivery and fuel management through Nexa Petroleum: diesel, petrol, jet fuel and LPG.',
                'image' => 'chemical-drums.jpg',
                'alt' => 'Industrial drums used for bulk liquid handling',
                'tags' => ['Bulk Fuel', 'Nexa Petroleum'],
                'includes' => ['Bulk fuel export and transportation', 'Delivery to site', 'Fuel management', 'Diesel, petrol, jet fuel and LPG'],
            ],
            [
                'title' => 'Technology & General Supply',
                'summary' => 'IT consumables and hardware, electrical and electronic consumables, and general trade of goods and services.',
                'image' => 'drill-bits.jpg',
                'alt' => 'Technical hardware and spare components',
                'tags' => ['IT Hardware', 'General Trade'],
                'includes' => ['IT consumables and hardware', 'Electrical and electronic consumables', 'General trade of goods and services'],
            ],
            [
                'title' => 'Training',
                'summary' => 'Machinery operation, safe operating procedures, HSE and occupational risk management, PPE, and site induction training.',
                'image' => 'safety-ppe.jpg',
                'alt' => 'Safety equipment and PPE used on site',
                'tags' => ['HSE', 'Site Induction'],
                'includes' => ['Machinery operation', 'Safe operating procedures', 'HSE and occupational risk management', 'PPE training', 'Site induction'],
            ],
        ];
    }
}
