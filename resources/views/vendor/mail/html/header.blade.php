@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Monica Vieira Psicologia')
<img src='http://hmljgs.com.br/img/logo.jpg' class="logo" alt="Monica Vieira Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
