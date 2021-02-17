<template>
    <div class="flex flex-wrap">
        <h1>Hi</h1>
        <div class="w-full">
            <t-button :href="links.index">Link to index page</t-button>
            <t-button :href="links.history">Link to all battle page</t-button>
        </div>
        <div class="w-full">
            Your battle is here: {{ battle.name }}
        </div>
    </div>
</template>

<script>
export default {
  name: 'NextPage',
  props: {
    battle: {
      type: Object,
      required: true,
    },
    links: {
      type: Object,
      required: true,
    },
  },
  methods: {
    createSquad() {
      axios.post(this.links.joinApi, {
        division_id: 0, // Division Id
        name: 'Test Squad', // Squad Name
        amount: 3, // How many people in this squad
        steam_id: 'xxxxxx', // Steam_id of the leader
      }).then((response) => {
        if (response.status === 200) {
          console.log('Success!');
          console.log(`Squad: ${response.data.result}`);
        } else {
          console.log('Failed!');
        }
      });
    },
  },
};
</script>

<style scoped>

</style>
