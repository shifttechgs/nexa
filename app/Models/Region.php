<?php

namespace App\Models;

use Illuminate\Support\Collection;

/**
 * The four countries Nexa supplies — hardcoded, no database table. Used by the home page
 * regions table, the footer and the /regions/{slug} pages. `code` is the ISO id of the
 * country's path in partials/africa-map.
 */
class Region
{
    public function __construct(
        public string $name,
        public string $slug,
        public string $code,
        public string $presence,
        public ?string $city,
        public ?array $address,
        public string $intro,
        public array $areas,
    ) {
    }

    public static function all(): Collection
    {
        return collect(static::rows())->map(fn (array $row) => new self(...$row));
    }

    public static function findBySlug(string $slug): ?self
    {
        return static::all()->firstWhere('slug', $slug);
    }

    /** Name as it reads mid-sentence: "in the DRC", "in Zambia". */
    public function inSentence(): string
    {
        return $this->name === 'DRC' ? 'the DRC' : $this->name;
    }

    public function isHeadOffice(): bool
    {
        return $this->presence === 'Headquarters';
    }

    /** `areas` maps each main mining area to what is mined there. */
    protected static function rows(): array
    {
        return [
            [
                'name' => 'DRC',
                'slug' => 'drc',
                'code' => 'cd',
                'presence' => 'Headquarters',
                'city' => 'Lubumbashi',
                'address' => ['No. 32 Avenue Mwange, Golf Plateau', 'Commune Annexe, Lubumbashi', 'Haut-Katanga, DRC'],
                'intro' => 'Our head office and sales team are in Lubumbashi, within driving distance of the copper and cobalt mines of Haut-Katanga and Lualaba. Our statutory operations are governed by the OHADA Uniform Act.',
                'areas' => [
                    'Haut-Katanga' => 'Copper, cobalt',
                    'Lualaba (Kolwezi)' => 'Copper, cobalt',
                    'Kasai' => 'Diamonds',
                    'Eastern provinces' => 'Gold, tantalite',
                ],
            ],
            [
                'name' => 'Zambia',
                'slug' => 'zambia',
                'code' => 'zm',
                'presence' => 'Deliveries',
                'city' => null,
                'address' => null,
                'intro' => 'Zambian sites are supplied from Lubumbashi and billed on the same terms as our DRC accounts, so operators with mines on both sides of the Copperbelt deal with one supplier.',
                'areas' => [
                    'Copperbelt Province' => 'Copper, cobalt',
                    'North-Western Province' => 'Copper, gold',
                    'Central Province' => 'Lead, zinc, manganese',
                ],
            ],
            [
                'name' => 'Zimbabwe',
                'slug' => 'zimbabwe',
                'code' => 'zw',
                'presence' => 'Deliveries',
                'city' => null,
                'address' => null,
                'intro' => 'We deliver to sites across Zimbabwe on the same supply and pricing terms as the rest of the region, from PGM and chrome operations on the Great Dyke to gold and lithium mines.',
                'areas' => [
                    'Great Dyke' => 'Platinum group metals, chrome',
                    'Midlands and Mashonaland' => 'Gold',
                    'Masvingo and Goromonzi' => 'Lithium',
                    'Manicaland' => 'Diamonds',
                ],
            ],
            [
                'name' => 'South Africa',
                'slug' => 'south-africa',
                'code' => 'za',
                'presence' => 'Office',
                'city' => 'Johannesburg',
                'address' => ['16 Caithness Road', 'Blairgowrie, 2194', 'RSA'],
                'intro' => 'Our Johannesburg office looks after South African accounts and works alongside the Lubumbashi team on orders for sites further north.',
                'areas' => [
                    'Bushveld Complex' => 'Platinum group metals, chrome',
                    'Witwatersrand' => 'Gold',
                    'Northern Cape' => 'Iron ore, manganese, diamonds',
                ],
            ],
        ];
    }
}
