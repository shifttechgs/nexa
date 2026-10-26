<?php

namespace App\Models;

use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * Sample product catalog for this demo site — hardcoded, no database table.
 * Replace the rows in rows() with the real catalogue. Product photos live in
 * public/images/products/ (sources in CREDITS.md there); a product without
 * `image` falls back to its category photo.
 */
class Product implements UrlRoutable
{
    /** Category photo, used when a product has no photo of its own. */
    public const CATEGORY_IMAGES = [
        'Explosives' => 'photos/rock-strata.jpg',
        'Mining Chemicals' => 'photos/chemical-drums.jpg',
        'Crushing Equipment' => 'photos/crusher-machine.jpg',
        'Mining Safety Gear' => 'photos/safety-ppe.jpg',
        'Plant & Equipment Spares' => 'photos/drill-bits.jpg',
        'Conveyor Mechanical Spares' => 'photos/conveyor-aerial.jpg',
    ];

    public function __construct(
        public string $name,
        public string $slug,
        public string $sku,
        public string $category,
        public string $summary,
        public ?string $description = null,
        public ?string $image = null,
        public bool $featured = false,
        public array $specs = [],
    ) {
    }

    public static function all(): Collection
    {
        return collect(static::rows())->map(fn (array $row) => new self(
            name: $row[0],
            slug: Str::slug($row[0]),
            sku: $row[1],
            category: $row[2],
            summary: $row[3],
            image: $row['image'] ?? null,
            featured: $row['featured'] ?? false,
            specs: $row['specs'] ?? [],
        ));
    }

    public static function featured(): Collection
    {
        return static::all()->where('featured', true)->values();
    }

    public static function findBySlug(string $slug): ?self
    {
        return static::all()->firstWhere('slug', $slug);
    }

    /** Public URL of the product photo, or its category photo. */
    public function imageUrl(): string
    {
        return asset('images/'.($this->image ?? static::CATEGORY_IMAGES[$this->category] ?? 'photos/rock-strata.jpg'));
    }

    /** [name, sku, category, summary, optional image / featured / key specs shown on cards] */
    protected static function rows(): array
    {
        return [
            ['Surface Bulk Emulsion', 'EXP-001', 'Explosives', 'Bulk-manufactured emulsion explosive for large-scale surface blasting.', 'image' => 'products/surface-bulk-emulsion.jpg', 'featured' => true, 'specs' => ['Density' => '1.10–1.25 g/cc', 'Hole diameter' => '89 mm and up']],
            ['Packaged Emulsion Cartridges', 'EXP-002', 'Explosives', 'Cartridged emulsion for underground development and small-diameter holes.', 'image' => 'products/packaged-emulsion-cartridges.jpg', 'specs' => ['Diameter' => '25–65 mm', 'Water resistance' => 'Excellent']],
            ['ANFO', 'EXP-003', 'Explosives', 'Ammonium nitrate fuel oil blasting agent for dry surface holes.', 'image' => 'products/anfo.jpg', 'specs' => ['Density' => '0.80–0.85 g/cc', 'Conditions' => 'Dry holes']],
            ['Shock Tube Detonators', 'EXP-004', 'Explosives', 'Non-electric detonators in a range of in-hole and surface delays.', 'image' => 'products/shock-tube-detonators.jpg', 'specs' => ['In-hole delays' => '25–9,000 ms', 'Lead length' => '4.8–30 m']],
            ['Cast Boosters', 'EXP-005', 'Explosives', 'Pentolite boosters for reliable initiation of bulk explosives.', 'image' => 'products/cast-boosters.jpg', 'specs' => ['Weights' => '150 g, 400 g', 'Type' => 'Pentolite']],

            ['Flotation Reagents', 'CHM-001', 'Mining Chemicals', 'Collectors and frothers for copper and cobalt froth flotation.', 'image' => 'products/flotation-reagents.jpg', 'featured' => true, 'specs' => ['Ores' => 'Copper, cobalt', 'Supply' => 'IBC, drums']],
            ['Flocculants', 'CHM-002', 'Mining Chemicals', 'Polyacrylamide flocculants for thickening and tailings settling.', 'image' => 'products/flocculants.jpg', 'specs' => ['Type' => 'Anionic, cationic', 'Supply' => '25 kg bags']],
            ['Sulphuric Acid', 'CHM-003', 'Mining Chemicals', 'Bulk sulphuric acid for leaching circuits, delivered in ISO tanks.', 'image' => 'products/sulphuric-acid.jpg', 'specs' => ['Concentration' => '98%', 'Supply' => 'ISO tank']],
            ['Lime', 'CHM-004', 'Mining Chemicals', 'Quick and hydrated lime for pH control and neutralisation.', 'image' => 'products/lime.jpg', 'specs' => ['Grades' => 'Quick, hydrated', 'Supply' => 'Bulk, 1 t bags']],
            ['Sodium Cyanide', 'CHM-005', 'Mining Chemicals', 'Briquettes for gold leaching, supplied with handling documentation.', 'image' => 'products/sodium-cyanide.jpg', 'specs' => ['Purity' => '98% min', 'Supply' => '1 t boxes']],

            ['Jaw Crusher Wear Parts', 'CRS-001', 'Crushing Equipment', 'Manganese jaw plates and cheek plates for primary crushing.', 'image' => 'products/jaw-crusher-wear-parts.jpg', 'featured' => true, 'specs' => ['Material' => 'Mn14, Mn18, Mn22', 'Fits' => 'Major OEM jaws']],
            ['Cone Crusher Liners', 'CRS-002', 'Crushing Equipment', 'Mantles and concaves matched to common cone crusher models.', 'image' => 'products/cone-crusher-liners.jpg', 'specs' => ['Material' => 'Mn18, Mn22', 'Profiles' => 'Fine to coarse']],
            ['Screen Panels', 'CRS-003', 'Crushing Equipment', 'Polyurethane and rubber screen panels in standard apertures.', 'image' => 'products/screen-panels.jpg', 'specs' => ['Material' => 'Polyurethane, rubber', 'Panel size' => '305 × 305 mm']],
            ['Impact Crusher Blow Bars', 'CRS-004', 'Crushing Equipment', 'Chrome and martensitic blow bars for horizontal shaft impactors.', 'image' => 'products/impact-crusher-blow-bars.jpg', 'specs' => ['Material' => 'Chrome, martensitic', 'Fits' => 'HSI crushers']],

            ['Standard PPE Kits', 'PPE-001', 'Mining Safety Gear', 'Helmets, boots, gloves, eye and hearing protection in one kit.', 'image' => 'products/standard-ppe-kits.jpg', 'featured' => true, 'specs' => ['Contents' => '5 items', 'Standard' => 'SANS / EN rated']],
            ['Self-Rescuers', 'PPE-002', 'Mining Safety Gear', 'Oxygen self-rescuers for underground escape.', 'image' => 'products/self-rescuers.jpg', 'specs' => ['Duration' => '30–60 min', 'Type' => 'Chemical oxygen']],
            ['Cap Lamps', 'PPE-003', 'Mining Safety Gear', 'Rechargeable LED cap lamps with charging racks.', 'image' => 'products/cap-lamps.jpg', 'specs' => ['Run time' => '14 h+', 'Battery' => 'Li-ion']],
            ['Fall Protection Harnesses', 'PPE-004', 'Mining Safety Gear', 'Full-body harnesses and lanyards for work at height.', 'image' => 'products/fall-protection-harnesses.jpg', 'specs' => ['Rating' => '140 kg', 'Attachment' => 'Dorsal, sternal']],
            ['Gas Detectors', 'PPE-005', 'Mining Safety Gear', 'Portable multi-gas detectors with calibration support.', 'image' => 'products/gas-detectors.jpg', 'specs' => ['Gases' => 'O₂, CO, H₂S, LEL', 'Run time' => '18 h']],

            ['Drill Bits', 'SPR-001', 'Plant & Equipment Spares', 'Button and cross bits for top-hammer and DTH drilling.', 'image' => 'products/drill-bits.jpg', 'specs' => ['Diameter' => '38–152 mm', 'Thread' => 'R32 to T51']],
            ['Hydraulic Hoses & Fittings', 'SPR-002', 'Plant & Equipment Spares', 'Made-up hydraulic hoses and fittings for mobile plant.', 'image' => 'products/hydraulic-hoses-fittings.jpg', 'specs' => ['Pressure' => 'Up to 420 bar', 'Lead time' => 'Made up locally']],
            ['Filters', 'SPR-003', 'Plant & Equipment Spares', 'Oil, fuel and air filters for haul trucks and loaders.', 'image' => 'products/filters.jpg', 'specs' => ['Types' => 'Oil, fuel, air', 'Fits' => 'Haul trucks, loaders']],
            ['Ground Engaging Tools', 'SPR-004', 'Plant & Equipment Spares', 'Bucket teeth, adaptors and cutting edges.', 'image' => 'products/ground-engaging-tools.jpg', 'specs' => ['Parts' => 'Teeth, adaptors, edges', 'Fits' => 'Loaders, excavators']],

            ['Conveyor Belting', 'CNV-001', 'Conveyor Mechanical Spares', 'Fabric and steel cord belting, cut to length.', 'image' => 'products/conveyor-belting.jpg', 'specs' => ['Widths' => '600–2,200 mm', 'Types' => 'Fabric, steel cord']],
            ['Idlers & Rollers', 'CNV-002', 'Conveyor Mechanical Spares', 'Carry, return and impact idlers in standard widths.', 'image' => 'products/idlers-rollers.jpg', 'specs' => ['Widths' => '600–2,200 mm', 'Types' => 'Carry, return, impact']],
            ['Belt Scrapers', 'CNV-003', 'Conveyor Mechanical Spares', 'Primary and secondary belt cleaners to cut carry-back.', 'image' => 'products/belt-scrapers.jpg', 'specs' => ['Position' => 'Primary, secondary', 'Belt width' => 'Up to 2,200 mm']],
            ['Pulley Lagging', 'CNV-004', 'Conveyor Mechanical Spares', 'Ceramic and rubber lagging for drive and bend pulleys.', 'image' => 'products/pulley-lagging.jpg', 'specs' => ['Types' => 'Ceramic, rubber', 'Use' => 'Drive, bend pulleys']],
        ];
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
