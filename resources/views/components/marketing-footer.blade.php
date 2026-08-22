<footer class="bg-nexa-navy-dark text-white/70">
    <!-- Service strip -->
    <div class="border-b border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 grid grid-cols-2 md:grid-cols-5 gap-6 text-center">
            <div>
                <p class="text-sm font-semibold text-white">Mining &amp; Industrial Supply</p>
            </div>
            <div>
                <p class="text-sm font-semibold text-white">Equipment &amp; Logistics</p>
            </div>
            <div>
                <p class="text-sm font-semibold text-white">Fuel &amp; Energy</p>
            </div>
            <div>
                <p class="text-sm font-semibold text-white">Technology &amp; General Supply</p>
            </div>
            <div class="col-span-2 md:col-span-1">
                <p class="text-sm font-semibold text-white">Training &amp; Safety Solutions</p>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 grid grid-cols-1 md:grid-cols-4 gap-10">
        <div class="md:col-span-2">
            <img src="{{ asset('images/nexa-logo.jpg') }}" alt="Nexa Mining and Engineering Services" class="h-12 w-auto bg-white rounded-md px-3 py-1.5 inline-block">
            <p class="mt-4 text-sm leading-relaxed max-w-md">
                Supporting mining. Empowering Africa. Nexa distributes quality mining, industrial and technical
                consumables while providing reliable support services to mining operations across the DRC,
                Central and Southern Africa.
            </p>
            <p class="mt-4 text-xs text-white/40 tracking-wide">DRC &middot; Zimbabwe &middot; Zambia &middot; South Africa</p>
        </div>

        <div>
            <p class="text-sm font-semibold text-white uppercase tracking-wide mb-4">Company</p>
            <ul class="space-y-2 text-sm">
                <li><a href="{{ route('home') }}#about" class="hover:text-white transition">About Nexa</a></li>
                <li><a href="{{ route('home') }}#services" class="hover:text-white transition">Our Services</a></li>
                <li><a href="{{ route('home') }}#contact" class="hover:text-white transition">Contact Us</a></li>
            </ul>
        </div>

        <div id="contact">
            <p class="text-sm font-semibold text-white uppercase tracking-wide mb-4">Head Office</p>
            <ul class="space-y-2 text-sm">
                <li>No. 32 Avenue Mwange, Golf Plateau,<br>Commune Annexe, Lubumbashi,<br>Haut-Katanga, DRC</li>
                <li><a href="mailto:info@nexaminingservices.com" class="hover:text-white transition">info@nexaminingservices.com</a></li>
                <li><a href="mailto:sales@nexaminingservices.com" class="hover:text-white transition">sales@nexaminingservices.com</a></li>
            </ul>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col sm:flex-row items-center justify-between gap-2 text-xs text-white/40">
            <p>&copy; {{ date('Y') }} Nexa Mining and Engineering Services (SARL). All rights reserved.</p>
            <p>OHADA compliant &middot; Built for reliability &amp; excellence</p>
        </div>
    </div>
</footer>
