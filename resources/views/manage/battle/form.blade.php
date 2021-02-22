<form action="{{ $formUrl }}" method="POST" class="w-full">
    @csrf
    @method($formMethod)
    <t-input-group label="Map" class="mb-3">
        <t-select :options="{{ json_encode($maps) }}" value-attribute="id" text-attribute="text" name="map_id" placeholder="Please select one map." :hide-search-box="true" @isset($battle) :value="{{ $battle->map_id }}" @endisset></t-select>
    </t-input-group>
    <t-input-group label="Name" class="mb-3">
        <t-input value="{{ $battle->name ?? '' }}" type="text" name="name" placeholder="Your battle name."></t-input>
    </t-input-group>
    <t-input-group label="Mode" class="mb-3">
        <t-radio-group :options="{{ json_encode($modes) }}" @isset($battle) :value="{{ $battle->mode }}" @endisset value-attribute="key" text-attribute="description" name="mode"></t-radio-group>
    </t-input-group>
    <t-input-group label="Meeting At" class="mb-3">
        <datetime-picker name="meeting_at" value="{{ !is_null($battle) ? $battle->meeting_at : '' }}"></datetime-picker>
    </t-input-group>
    <t-input-group label="Match Start After (Minutes)" class="mb-3">
        <t-input @isset($battle) :value="{{ $battle->match_at->diffInMinutes($battle->meeting_at)  }}" @endisset type="number" min="10" max="180" name="match_start_after"></t-input>
    </t-input-group>
    <t-input-group label="Max People" class="mb-3">
        <t-input value="{{ $battle->max_people ?? 100 }}" type="number" name="max_people" min="2"></t-input>
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
