<?php

namespace App\Models;

use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * Sample blog content for this demo site — hardcoded, no database table.
 */
class Post implements UrlRoutable
{
    public function __construct(
        public string $title,
        public string $slug,
        public string $excerpt,
        public string $body,
        public ?string $category,
        public Carbon $published_at,
    ) {
    }

    public static function all(): Collection
    {
        return collect([
            new self(
                title: 'Understanding OHADA Compliance for Regional Mining Suppliers',
                slug: 'ohada-compliance-regional-mining-suppliers',
                category: 'Compliance',
                excerpt: 'What the OHADA Uniform Act means for suppliers and operators working across DRC, Zambia, Zimbabwe and South Africa, and why governance matters as much as product quality.',
                body: <<<'MD'
Operating across multiple jurisdictions in Central and Southern Africa means navigating a patchwork of commercial law, unless your business falls under the OHADA framework. The Organisation for the Harmonisation of Business Law in Africa (OHADA) gives member states, including the DRC, a single, predictable set of commercial rules covering contracts, company governance, and dispute resolution.

## Why it matters to mining suppliers

For mining suppliers, this matters in three practical ways:

- **Contracts travel.** Contracts written under OHADA rules are enforceable in the same way across every member state, which reduces legal friction when a supply agreement spans several countries.
- **Governance is visible.** OHADA's corporate governance requirements push suppliers toward more transparent ownership and reporting structures. That is the kind of due diligence major mining operators already expect from their vendors.
- **Disputes have a neutral forum.** The OHADA Common Court of Justice and Arbitration gives both suppliers and operators a shared, neutral forum instead of relying solely on domestic courts.

## What to look for when choosing a supplier

For a mining operation choosing between suppliers, OHADA compliance is a useful proxy for operational maturity. A supplier that has organised itself around a harmonised legal framework is generally one that can be held to consistent delivery, safety, and after-sales commitments, in practice as well as on paper.
MD,
                published_at: now()->subDays(14),
            ),
            new self(
                title: 'Bulk Fuel Delivery: What to Look for in a Fuel and Energy Partner',
                slug: 'bulk-fuel-delivery-choosing-a-partner',
                category: 'Fuel & Energy',
                excerpt: 'Diesel, petrol, jet fuel or LPG: the difference between a good fuel supplier and a great one usually comes down to logistics, not price alone.',
                body: <<<'MD'
Fuel reliability is an operational risk, not just a procurement line item. A mine site that runs out of diesel doesn't just lose a delivery. It can lose a full production day.

## Four things that matter more than price

When evaluating a bulk fuel and energy partner, four factors matter more than headline pricing:

1. **Transport capability.** Does the supplier own or control its own transport and export logistics, or does it depend on subcontracted hauliers with variable reliability?
2. **Product range.** A partner who can supply diesel, petrol, jet fuel and LPG from the same relationship simplifies procurement and reduces the number of vendor relationships a site has to manage.
3. **Fuel management support.** The best partners help forecast consumption and manage on-site storage and handling, not just deliver and leave.
4. **Regional reach.** A supplier active across the DRC, Zimbabwe, Zambia and South Africa can support multi-site operations without renegotiating terms in every country.

## Consistency under pressure

Ultimately, fuel and energy supply is a trust relationship built on consistency of delivery under pressure (rainy seasons, border delays, demand spikes) more than it is a spot-price transaction.
MD,
                published_at: now()->subDays(28),
            ),
            new self(
                title: 'Site Safety Training: Building a Culture, Not Just a Checklist',
                slug: 'site-safety-training-culture-not-checklist',
                category: 'Training & Safety',
                excerpt: 'PPE, induction and equipment training reduce incident rates only when they are treated as an ongoing practice rather than a one-time compliance exercise.',
                body: <<<'MD'
Mining safety statistics consistently show the same pattern: incident rates drop sharply in the weeks after a training programme and then drift back upward over the following months. The training usually isn't the problem. Safety training is often treated as a compliance event rather than an operating habit.

## What makes training stick

A more durable approach combines a few practical elements:

- **Site-specific induction** that reflects the actual hazards of that operation rather than a generic template.
- **Refresher sessions tied to equipment changes**, not just an annual calendar date.
- **Supervisor-level reinforcement**, since crews take their cues more from daily supervisor behaviour than from a training slide deck delivered months earlier.

## Safety as an operating standard

PPE and emergency response training matter, but they work best as part of a broader occupational risk management approach. That means treating safety as a continuous operating standard covering machinery operation, preventative maintenance awareness, and task-specific procedures, not a box to tick before a site audit.
MD,
                published_at: now()->subDays(45),
            ),
        ]);
    }

    public static function findBySlug(string $slug): ?self
    {
        return static::all()->firstWhere('slug', $slug);
    }

    /** Category photo for the article card and header. */
    public function imageUrl(): string
    {
        return asset('images/photos/'.match ($this->category) {
            'Compliance' => 'rock-strata.jpg',
            'Fuel & Energy' => 'chemical-drums.jpg',
            'Training & Safety' => 'safety-ppe.jpg',
            default => 'hero-excavator.jpg',
        });
    }

    /** Body rendered from Markdown (raw HTML escaped), with an id on each h2 so sections can be linked to. */
    public function bodyHtml(): string
    {
        $html = Str::markdown($this->body, [
            'html_input' => 'escape',
            'allow_unsafe_links' => false,
        ]);

        return preg_replace_callback(
            '/<h2>(.*?)<\/h2>/',
            fn (array $m) => '<h2 id="'.Str::slug(strip_tags($m[1])).'">'.$m[1].'</h2>',
            $html,
        );
    }

    /** Estimated reading time in minutes, at ~200 words a minute. */
    public function readingMinutes(): int
    {
        return max(1, (int) ceil(str_word_count($this->body) / 200));
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
