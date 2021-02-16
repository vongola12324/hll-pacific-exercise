<form action="{{ $formUrl }}" method="POST" class="w-full">
    @csrf
    @method($formMethod)
    <t-input-group label="Name" class="mb-3">
        <t-input value="{{ $map->name ?? '' }}" type="text" name="name" placeholder="Your map name."></t-input>
    </t-input-group>
    <t-button type="submit">Save</t-button>
</form>
