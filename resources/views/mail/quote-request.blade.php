<x-mail::message>
# New quote request

Reply to this email to answer {{ $request['name'] }} directly.

<x-mail::table>
| | |
|:--|:--|
| **Name** | {{ $request['name'] }} |
| **Company** | {{ $request['company'] ?: '—' }} |
| **Email** | {{ $request['email'] }} |
| **Phone** | {{ $request['phone'] ?: '—' }} |
| **Service** | {{ $request['service_interest'] ?: '—' }} |
</x-mail::table>

@if (! empty($request['items']))
## Quote list

<x-mail::table>
| Product | SKU | Qty |
|:--|:--|--:|
@foreach ($request['items'] as $item)
| {{ $item['name'] }} | {{ $item['sku'] }} | {{ $item['qty'] }} |
@endforeach
</x-mail::table>
@endif

@if (! empty($request['message']))
## Message

{{ $request['message'] }}
@endif

Sent from the quote form on {{ config('app.url') }}
</x-mail::message>
