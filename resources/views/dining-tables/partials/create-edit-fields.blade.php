<div class="space-y-1">
    <x-input.label for="name" value="Name" :mandatory="true" />
    <x-input.field-text id="name" placeholder="Household Table" value="{{ old('name', $diningTable) }}" required autofocus />
    <x-input.error :messages="$errors->get('name')" />
</div>