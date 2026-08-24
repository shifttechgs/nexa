<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            'Explosives' => [
                ['Surface Bulk Emulsion', 'EXP-001', 'Bulk-manufactured emulsion explosive for large-scale surface blasting operations.'],
                ['Packaged Emulsion', 'EXP-002', 'Cartridged emulsion explosives for controlled, small-diameter blast holes.'],
                ['Watergel Explosives', 'EXP-003', 'Water-resistant watergel formulation for wet blast-hole conditions.'],
                ['Drygel Explosives', 'EXP-004', 'Drygel explosive for dry-hole applications requiring high detonation velocity.'],
            ],
            'Mining Chemicals' => [
                ['Flotation Reagents', 'CHM-001', 'Reagents supporting froth flotation for copper and cobalt ore processing.'],
                ['Leaching Chemicals', 'CHM-002', 'Chemical solutions for heap and tank leaching operations.'],
            ],
            'Crushing Equipment' => [
                ['Jaw Crusher Wear Parts', 'CRS-001', 'Manganese wear liners and jaw plates for primary crushing circuits.'],
                ['Cone Crusher Components', 'CRS-002', 'Mantles, concaves and bowl liners for secondary crushing.'],
            ],
            'Mining Safety Gear' => [
                ['Standard PPE Kits', 'PPE-001', 'Site PPE: helmets, boots, gloves, eye and hearing protection.'],
                ['Gas Detection Equipment', 'PPE-002', 'Portable gas detectors for underground and confined-space monitoring.'],
            ],
            'Plant & Equipment Spares' => [
                ['Drill Bits', 'SPR-001', 'Tungsten carbide drill bits for rotary and percussion drilling.'],
                ['Hammer Mill Beaters & Blades', 'SPR-002', 'Replacement beaters and blades for hammer mill crushing circuits.'],
                ['Steel Rods', 'SPR-003', 'Grinding and reinforcement steel rods for mill and structural use.'],
            ],
            'Conveyor Mechanical Spares' => [
                ['Conveyor Bearings', 'CNV-001', 'Heavy-duty bearings for conveyor idlers and pulleys.'],
                ['Conveyor Brushes', 'CNV-002', 'Belt-cleaning brushes for material carryback control.'],
                ['Conveyor Flanges', 'CNV-003', 'Flange bearing units for conveyor drive and take-up assemblies.'],
            ],
            'Fuel & Energy' => [
                ['Diesel', 'FUE-001', 'Bulk diesel supply with delivery and fuel management support.'],
                ['Petrol', 'FUE-002', 'Bulk petrol supply for site vehicles and light equipment.'],
                ['Jet Fuel', 'FUE-003', 'Aviation jet fuel supply and logistics.'],
                ['LPG', 'FUE-004', 'Bulk and cylinder LPG supply for site and industrial use.'],
            ],
            'Technology & General Supply' => [
                ['IT Hardware & Consumables', 'TEC-001', 'Computers, networking equipment and IT consumables for site offices.'],
                ['Electrical & Electronic Consumables', 'TEC-002', 'Cabling, switchgear and electronic components for site operations.'],
            ],
        ];

        $sort = 0;

        foreach ($products as $category => $items) {
            foreach ($items as [$name, $sku, $summary]) {
                Product::updateOrCreate(
                    ['sku' => $sku],
                    [
                        'name' => $name,
                        'slug' => Str::slug($name),
                        'category' => $category,
                        'summary' => $summary,
                        'sort' => $sort++,
                    ]
                );
            }
        }
    }
}
