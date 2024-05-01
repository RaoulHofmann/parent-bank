@props(['disabled' => false, 'items' => [], 'id' => '', 'text' => ''])

<select  {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}>
    <option disabled value="">Please select</option>
@foreach($items as $item)
    <option value="{{ $item[$id] }}">{{ $item[$text] }}</option>
@endforeach
</select>
