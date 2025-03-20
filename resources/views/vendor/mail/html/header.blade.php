@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block; font-family: 'Dancing Script', cursive; font-size: 48px; color: #000000; text-decoration: none; font-weight: 700;">
{{ $slot }}
</a>
</td>
</tr>
