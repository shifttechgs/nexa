<x-marketing-layout
    :title="'Home'"
    :description="'Nexa Mining and Engineering Services — mining and industrial supply, equipment and logistics, fuel and energy, and training across the DRC, Zimbabwe, Zambia and South Africa.'"
>
    <!-- Hero -->
    <section class="relative bg-nexa-navy overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_top_right,white,transparent_55%)]"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 sm:py-32">
            <p class="text-nexa-gold font-semibold tracking-widest uppercase text-sm mb-4">Supporting Mining. Empowering Africa.</p>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white max-w-3xl leading-tight">
                Mining supply, equipment &amp; logistics built for the field.
            </h1>
            <p class="mt-6 text-lg text-white/70 max-w-2xl leading-relaxed">
                Nexa distributes quality mining, industrial and technical consumables while providing reliable
                support services to mining operations across the DRC, Central and Southern Africa &mdash;
                headquartered in Lubumbashi, with operations in Zimbabwe, Zambia and South Africa.
            </p>
            <div class="mt-10 flex flex-wrap gap-4">
                <a href="#contact" class="inline-flex items-center px-6 py-3 rounded-md text-sm font-semibold text-nexa-navy bg-nexa-gold hover:bg-white transition">
                    Get in touch
                </a>
                <a href="#services" class="inline-flex items-center px-6 py-3 rounded-md text-sm font-semibold text-white border border-white/30 hover:border-white hover:bg-white/5 transition">
                    Explore services
                </a>
            </div>
        </div>
        <div class="border-t border-white/10 bg-black/20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 grid grid-cols-2 sm:grid-cols-4 gap-6 text-center">
                <div>
                    <p class="text-2xl font-bold text-white">4</p>
                    <p class="text-xs uppercase tracking-wide text-white/50 mt-1">Countries served</p>
                </div>
                <div>
                    <p class="text-2xl font-bold text-white">6</p>
                    <p class="text-xs uppercase tracking-wide text-white/50 mt-1">Core service lines</p>
                </div>
                <div>
                    <p class="text-2xl font-bold text-white">OHADA</p>
                    <p class="text-xs uppercase tracking-wide text-white/50 mt-1">Compliant governance</p>
                </div>
                <div>
                    <p class="text-2xl font-bold text-white">Top 10</p>
                    <p class="text-xs uppercase tracking-wide text-white/50 mt-1">Regional ambition</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About / Executive Summary -->
    <section id="about" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-12 items-start">
            <div>
                <p class="text-nexa-green font-semibold tracking-widest uppercase text-sm mb-3">Our Company</p>
                <h2 class="text-3xl sm:text-4xl font-bold text-nexa-navy">Executive Summary</h2>
                <p class="mt-6 text-gray-600 leading-relaxed">
                    Nexa Mining Supply and Services is a subsidiary of Nexa Holding, a privately owned corporation
                    operating across mining supplies, fuel, and energy. We are committed to sustainability, OHADA
                    compliance, customer care, and service delivery defined by precision, reliability and excellence.
                </p>
                <p class="mt-4 text-gray-600 leading-relaxed">
                    Our vision is to be a leading force in mining supply, equipment, and logistics in the region,
                    and to rank among the top 10 companies in our market through innovation and service excellence.
                </p>
            </div>

            <div class="bg-gray-50 border border-gray-100 rounded-2xl p-8">
                <p class="text-nexa-green font-semibold tracking-widest uppercase text-sm mb-4">Why Choose Nexa</p>
                <ul class="space-y-4">
                    @foreach ([
                        ['OHADA Compliant', 'Statutory operations governed by the OHADA Uniform Act, supporting sound corporate governance.'],
                        ['Customer Focused', 'Practical solutions designed around client requirements and operational priorities.'],
                        ['Quality & Safety', 'Products tested for performance under harsh mining conditions.'],
                        ['Reliability', 'End-to-end service from supply through to after-sales support.'],
                        ['Regional Reach', 'DRC headquarters with a footprint in Zimbabwe, Zambia, and South Africa.'],
                    ] as [$title, $body])
                        <li class="flex gap-3">
                            <span class="mt-1 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-nexa-green text-white text-xs">&check;</span>
                            <span>
                                <span class="block font-semibold text-nexa-navy">{{ $title }}</span>
                                <span class="text-sm text-gray-600">{{ $body }}</span>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section id="services" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <p class="text-nexa-green font-semibold tracking-widest uppercase text-sm mb-3">Core Services</p>
                <h2 class="text-3xl sm:text-4xl font-bold text-nexa-navy">Everything a mine site needs, from one partner.</h2>
            </div>

            <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ([
                    ['A', 'Mining & Industrial Supply', 'Explosives, mining chemicals, crushing equipment, safety gear, plant spares and conveyor mechanical spares for gold, copper, cobalt, PGM, diamond, chrome, lithium and tantalite mines.'],
                    ['B', 'Mining Operations Consulting', 'Drilling and blasting, ground support, loading and hauling, and mine dewatering services.'],
                    ['C', 'Equipment & Logistics', 'Rental and sale of mining equipment and machinery, with after-sales service, maintenance and spare parts.'],
                    ['D', 'Fuel & Energy', 'Bulk fuel export, transportation, delivery and fuel management through Nexa Petroleum: diesel, petrol, jet fuel and LPG.'],
                    ['E', 'Technology & General Supply', 'IT consumables and hardware, electrical and electronic consumables, and general trade of goods and services.'],
                    ['F', 'Training', 'Machinery operation, safe operating procedures, HSE and occupational risk management, PPE, and site induction training.'],
                ] as [$letter, $title, $body])
                    <div class="bg-white rounded-2xl p-8 border border-gray-100 hover:shadow-lg hover:-translate-y-0.5 transition">
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-lg bg-nexa-navy text-nexa-gold font-bold">{{ $letter }}</span>
                        <h3 class="mt-5 text-lg font-semibold text-nexa-navy">{{ $title }}</h3>
                        <p class="mt-2 text-sm text-gray-600 leading-relaxed">{{ $body }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-20 bg-nexa-green">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-6">
            <div>
                <h2 class="text-2xl sm:text-3xl font-bold text-white">Ready to work with Nexa?</h2>
                <p class="mt-2 text-white/80">Reach our sales team for supply, equipment and fuel enquiries.</p>
            </div>
            <a href="mailto:sales@nexaminingservices.com" class="inline-flex items-center px-6 py-3 rounded-md text-sm font-semibold text-nexa-green bg-white hover:bg-nexa-gold hover:text-nexa-navy transition">
                sales@nexaminingservices.com
            </a>
        </div>
    </section>
</x-marketing-layout>
