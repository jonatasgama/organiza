<x-mail::message>
# {{ $emailData['title'] }}

{{ $emailData['body'] }}

@if($emailData['assunto'] != 'Consulta cancelada')
<x-mail::button :url="'http://crm.com/cancela-consulta/'.$emailData['id']">
Cancelar consulta
</x-mail::button>
@endif

Até breve,<br>
{{ config('app.name') }}
</x-mail::message>
