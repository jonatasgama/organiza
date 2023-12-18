@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Monica Vieira Psicologia')
<img src='https://monicavieira.jgssistemas.com.br/img/logo.png' class="logo" alt="Monica Vieira Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
