{{-- Organization structured data, on every page: who Nexa is, where its offices are and which countries it serves. --}}
@php
    $orgName = 'Nexa Mining and Engineering Services';
    $office = fn (string $city, string $street, ?string $postcode, string $country) => array_filter([
        '@type' => 'LocalBusiness',
        'name' => "{$orgName} ({$city})",
        'parentOrganization' => ['@id' => url('/').'#organization'],
        'email' => 'sales@nexaminingservices.com',
        'address' => array_filter([
            '@type' => 'PostalAddress',
            'streetAddress' => $street,
            'addressLocality' => $city,
            'postalCode' => $postcode,
            'addressCountry' => $country,
        ]),
    ]);

    $organization = array_filter([
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        '@id' => url('/').'#organization',
        'name' => $orgName,
        'legalName' => 'Nexa Mining & Engineering Services SARL',
        'url' => url('/'),
        'logo' => asset('images/nexa-logo.png'),
        'description' => 'Supplier of explosives, mining chemicals, equipment, spares, bulk fuel and training to mines in the DRC, Zambia, Zimbabwe and South Africa.',
        'email' => 'sales@nexaminingservices.com',
        'telephone' => config('services.whatsapp.number') ? '+'.config('services.whatsapp.number') : null,
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'No. 32 Avenue Mwange, Golf Plateau, Commune Annexe',
            'addressLocality' => 'Lubumbashi',
            'addressRegion' => 'Haut-Katanga',
            'addressCountry' => 'CD',
        ],
        'areaServed' => collect(['Democratic Republic of the Congo', 'Zambia', 'Zimbabwe', 'South Africa'])
            ->map(fn ($country) => ['@type' => 'Country', 'name' => $country])->all(),
        'department' => [
            $office('Johannesburg', '16 Caithness Road, Blairgowrie', '2194', 'ZA'),
            $office('Harare', '393 Diamond Drive, Adylinn, Westgate', null, 'ZW'),
        ],
        'knowsAbout' => ['Mining explosives', 'Mining chemicals', 'Crushing equipment', 'Mining safety equipment', 'Conveyor spares', 'Bulk fuel supply', 'Mining training'],
        'sameAs' => array_values(array_filter(config('services.social', []))) ?: null,
    ]);
@endphp
<script type="application/ld+json">{!! json_encode($organization, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) !!}</script>
