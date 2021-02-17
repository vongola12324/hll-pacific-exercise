<template>
    <div class="flex flex-wrap">
        <h1>Hi</h1>
        <div class="w-full">
            <t-button :href="links.next">Link to last battle page</t-button>
            <t-button :href="links.history">Link to all battle page</t-button>
        </div>
    </div>
</template>

<script>
export default {
  name: 'WelcomePage',
  props: {
    links: {
      type: Object,
      required: true,
    },
  },
};
</script>

<style scoped>

</style>
