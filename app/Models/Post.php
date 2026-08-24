<?php

namespace App\Models;

use Illuminate\Contracts\Routing\UrlRoutable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

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
                body: "Operating across multiple jurisdictions in Central and Southern Africa means navigating a patchwork of commercial law — unless your business falls under the OHADA framework. The Organisation for the Harmonisation of Business Law in Africa (OHADA) gives member states, including the DRC, a single, predictable set of commercial rules covering contracts, company governance, and dispute resolution.\n\nFor mining suppliers, this matters in three practical ways. First, contracts written under OHADA rules are enforceable in the same way across every member state, which reduces legal friction when a supply agreement spans several countries. Second, OHADA's corporate governance requirements push suppliers toward more transparent ownership and reporting structures — the kind of due diligence major mining operators already expect from their vendors. Third, dispute resolution under the OHADA Common Court of Justice and Arbitration gives both suppliers and operators a shared, neutral forum instead of relying solely on domestic courts.\n\nFor a mining operation choosing between suppliers, OHADA compliance is a useful proxy for operational maturity: a supplier that has organised itself around a harmonised legal framework is generally one that can be held to consistent delivery, safety, and after-sales commitments — not just on paper, but in practice.",
                published_at: now()->subDays(14),
            ),
            new self(
                title: 'Bulk Fuel Delivery: What to Look for in a Fuel and Energy Partner',
                slug: 'bulk-fuel-delivery-choosing-a-partner',
                category: 'Fuel & Energy',
                excerpt: 'Diesel, petrol, jet fuel or LPG — the difference between a good fuel supplier and a great one usually comes down to logistics, not price alone.',
                body: "Fuel reliability is an operational risk, not just a procurement line item. A mine site that runs out of diesel doesn't just lose a delivery — it can lose a full production day. When evaluating a bulk fuel and energy partner, four factors matter more than headline pricing.\n\nFirst, transport capability: does the supplier own or control its own transport and export logistics, or does it depend on subcontracted hauliers with variable reliability? Second, product range: a partner who can supply diesel, petrol, jet fuel and LPG from the same relationship simplifies procurement and reduces the number of vendor relationships a site has to manage. Third, fuel management support: the best partners help forecast consumption and manage on-site storage and handling, not just deliver and leave. Fourth, regional reach: a supplier active across the DRC, Zimbabwe, Zambia and South Africa can support multi-site operations without renegotiating terms in every country.\n\nUltimately, fuel and energy supply is a trust relationship built on consistency of delivery under pressure — during rainy seasons, border delays, or demand spikes — more than it is a spot-price transaction.",
                published_at: now()->subDays(28),
            ),
            new self(
                title: 'Site Safety Training: Building a Culture, Not Just a Checklist',
                slug: 'site-safety-training-culture-not-checklist',
                category: 'Training & Safety',
                excerpt: 'PPE, induction and equipment training reduce incident rates only when they are treated as an ongoing practice rather than a one-time compliance exercise.',
                body: "Mining safety statistics consistently show the same pattern: incident rates drop sharply in the weeks after a training programme and then drift back upward over the following months. The reason isn't that the training was bad — it's that safety training is often treated as a compliance event rather than an operating habit.\n\nA more durable approach combines a few practical elements: site-specific induction that reflects the actual hazards of that operation rather than a generic template; refresher sessions tied to equipment changes, not just an annual calendar date; and supervisor-level reinforcement, since crews take their cues more from daily supervisor behaviour than from a training slide deck delivered months earlier.\n\nPPE and emergency response training matter, but they work best as part of a broader occupational risk management approach — one that treats safety as a continuous operating standard covering machinery operation, preventative maintenance awareness, and task-specific procedures, not a box to tick before a site audit.",
                published_at: now()->subDays(45),
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
