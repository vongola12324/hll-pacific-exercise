<form action="{{ $formUrl }}" method="POST" class="w-full">
    @csrf
    @method($formMethod)
    <t-input-group label="Map" class="mb-3">
        <t-select :options="{{ json_encode($maps) }}" value-attribute="id" text-attribute="text" name="map_id" placeholder="Please select one map." :hide-search-box="true" value="{{ !is_null($battle) ? $battle->map_id : '' }}"></t-select>
    </t-input-group>
    <t-input-group label="Name" class="mb-3">
        <t-input value="{{ $battle->name ?? '' }}" type="text" name="name" placeholder="Your battle name."></t-input>
    </t-input-group>
    <t-input-group label="Mode" class="mb-3">
        <t-radio-group :options="{{ json_encode($modes) }}" value-attribute="key" text-attribute="description" name="mode"></t-radio-group>
    </t-input-group>
    <t-input-group label="Meeting At" class="mb-3">
        <datetime-picker name="meeting_at" value="{{ !is_null($battle) ? $battle->meeting_at : '' }}"></datetime-picker>
    </t-input-group>
    <t-input-group label="Match Start At" class="mb-3">
        <datetime-picker name="match_at" value="{{ !is_null($battle) ? $battle->match_at : '' }}" ></datetime-picker>
    </t-input-group>
    <t-input-group label="Max People" class="mb-3">
        <t-input value="{{ $battle->max_people ?? 0 }}" type="number" name="max_people" min="0"></t-input>
    </t-input-group>
    @empty($battle)
        <t-input-group label="Generate Force&Division" class="mb-3">
            <label class="flex items-center ml-2">
                <t-checkbox name="use_template" value="1" wrapped class="-ml-2">
                    <span class="pl-3 text-white">Yes (Suggest)</span>
                </t-checkbox>
            </label>
        </t-input-group>
    @endempty
    <t-button type="submit">Save</t-button>
</form>
