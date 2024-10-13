@props(['for', 'stand'])
<div>
  <fieldset>
    <legend class="sr-only">Checkboxes</legend>

    <div class="space-y-2">
      <label for="{{ $for }}"
        class="flex cursor-pointer items-start gap-4 rounded-lg border border-gray-200 p-2 transition hover:bg-gray-50 has-[:checked]:bg-blue-50">
        <div class="flex items-center">
          &#8203;
          <input {!! $attributes->merge(['class' => 'size-4 rounded border-gray-300']) !!} type="checkbox" {{ $stand ? 'checked' : '' }} id="{{ $for }}" />
        </div>

        <div>
          <strong class="font-medium text-gray-900"> {{ $slot }} </strong>
        </div>
      </label>
    </div>
  </fieldset>
</div>
