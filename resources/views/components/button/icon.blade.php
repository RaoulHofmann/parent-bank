@php use function Termwind\style; @endphp
@props(['icon'])

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center border-transparent text-gray-500', 'style' => 'width: 14px; height 14px;']) }}>
    @svg($icon)
</button>
