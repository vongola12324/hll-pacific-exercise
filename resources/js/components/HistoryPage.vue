<template>
    <div class="flex flex-wrap">
        <h1>Hi</h1>
        <div class="w-full">
            <t-button :href="links.index">Link to index page</t-button>
            <t-button :href="links.next">Link to last battle page</t-button>
        </div>
        <div class="w-full">
            Here are the battles:
            <ul>
                <li v-for="(battle, index) in battles.data" :key="index">{{ battle.name }}</li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
  name: 'HistoryPage',
  props: {
    battles: {
      type: Object,
      required: true,
    },
    links: {
      type: Object,
      required: true,
    },
  },
};
</script>

<style scoped>

</style>
