@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Monica Vieira Psicologia')
<img src='http://hmljgs.com.br/img/logo.png' class="logo" alt="Monica Vieira Logo" style="width:612px;">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
