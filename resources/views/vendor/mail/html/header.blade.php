@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Mônica Vieira Psicologia')
<img src={{ config('app.name').'/img/logo.png' }} class="logo" alt="Monica Vieira Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
