<template>
    <div class="flex flex-wrap">
        <t-input-group label="Date">
            <t-datepicker
                :value="date"
                :clearable="false"
                @change="handleDateTimeChange"
            />
        </t-input-group>
        <t-input-group label="Time" class="px-3">
            <t-select v-model="hour" :options="$_.range(0, 24)"></t-select>
            <span class="text-white text-xl mr-3">:</span>
            <t-select v-model="minute" :options="$_.range(0, 60)"></t-select>
        </t-input-group>
        <t-input :name="name" :value="isoString" class="hidden"></t-input>
    </div>
</template>

<script>
export default {
  name: 'DateTimePickerComponent',
  props: {
    name: {
      type: String,
      required: true,
    },
    value: {
      type: String,
      required: false,
    },
  },
  data() {
    return {
      date: 0,
      hour: 0,
      minute: 0,
      isoString: '',
    };
  },
  mounted() {
    if (this.value) {
      this.date = new Date(this.value);
    } else {
      this.date = new Date(Date.now());
    }
    this.hour = this.date.getHours();
    this.minute = this.date.getMinutes();
    this.getDateTimeIsoString();
  },
  methods: {
    handleDateTimeChange(str) {
      this.date = new Date(str);
      this.getDateTimeIsoString();
    },
    getDateTimeIsoString() {
      this.date.setHours(this.hour);
      this.date.setMinutes(this.minute);
      this.isoString = this.date.toISOString();
    },
  },
  watch: {
    hour() {
      this.getDateTimeIsoString();
    },
    minute() {
      this.getDateTimeIsoString();
    },
  },
};
</script>

<style scoped>

</style>
