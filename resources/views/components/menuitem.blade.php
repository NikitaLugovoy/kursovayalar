@props([
	'href',
	'text',
	'icon'
])

<a href="{{ $href }}">
	{{ $icon }}
	<span>{{ $text }}</span>
</a>
