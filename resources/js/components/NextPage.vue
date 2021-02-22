<template>
  <div class="flex items-top justify-center h-full font-mono font-semibold">
    <div class="flex flex-col w-9/12 md:w-10/12 bg-gradient-to-br from-gray-50 opacity-70 min-h-3/4 rounded-3xl items-center my-5">
      <div class="h-10 w-full rounded-3xl bg-gray-50 bg-opacity-50 items-center justify-center text-center">
        <h1 class="text-4xl">HLL RIMPAC</h1>
      </div>
      <div class="flex flex-col bg-gray-100 bg-opacity-90 w-11/12 rounded-3xl mt-5 p-2">
        <p class="text-2xl text-center">{{ battleInfo.battleName }} </p>
        <p class="text-3xl text-center">{{ battleInfo.mapName }}</p>
        <p class="text-3xl text-center">{{ battleInfo.mode }}</p>
        <p class="text-2xl text-center">Meeting at : {{ battleInfo.meetingTime }}</p>
        <p class="text-2xl text-center">Start at : {{ battleInfo.startTime }}</p>
        <span class="text-xl text-center">
          <a class="inline" :href="links.index">rules</a> / <a class="inline" href="https://discord.gg/77D9Te7S3H ">discord</a>
        </span>
      </div>

      <div class="flex flex-wrap bg-gray-100 bg-opacity-90 w-11/12 rounded-3xl mt-5 p-2 justify-evenly text-lg">
        <div class="bg-gray-800 text-white rounded-xl w-5/12 text-center p-1 font-semibold" v-for="(force,fIndex) in battle.forces" :key="'Force_'+fIndex">
          {{ force.name }} Forces <br>
          <div class="bg-gray-50 text-black w-full font-semibold rounded-lg mt-1" v-for="(division,dIndex) in force.divisions" :key="'Force_'+fIndex+'Division_'+dIndex">
            <div>
              {{ division.name }}:
              <div class="inline cursor-pointer" v-if="division.squads.length < division.limit_squad || division.limit_squad == -1" @click="goNewSquad(division.id)">
                <svg class="w-5 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#1F2937">
                  <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
                </svg>
              </div>
              <div class="inline" v-else>
                <svg class="w-5 inline " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#1F2937">
                  <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                </svg>
              </div>
            </div>
            <div class="w-full" v-if="division.squads.length > 0">
              <div v-for="(squad,sqIndex) in division.squads" :key="'Force_'+fIndex+'Division_'+dIndex+'Squad_'+sqIndex">
                <hr>
                {{ squad.name }} ({{ squad.amount }})
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="flex flex-col bg-gray-100 rounded-3xl my-5 p-4 text-lg w-11/12" v-if="register.data.division_id != 0">
        <p class="font-bold text-2xl">
          <svg class="w-10 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#1F2937">
            <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
          </svg>
          Register as {{ register.setting.force_name }} {{ register.setting.name }} squad
        </p>
        <p>test</p>
        <p>Squad name <t-input v-model="register.data.name"/></p>
        <p>Number of Players
          <t-richSelect v-model="register.data.amount" :options="register.setting.options"/>
        </p>
        <p>
          Your Steam link
          <t-input v-model="register.data.steam_id"/>
        </p>
        <t-button class="mt-2" @click="createSquad">register</t-button>
      </div>
    </div>
  </div>
</template>

<script>
import qs from 'qs';

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
    modes: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      battleInfo: {
        battleName: '',
        mapName: '',
        mode: '',
        startTime: new Date().toString(),
        meetingTime: new Date().toString(),
      },
      divisions: [],
      register: {
        data: {
          division_id: 0,
          name: '',
          amount: 1,
          steam_id: '',
        },
        setting: {
          limit_squad_player: 1,
          limit_total_player: 1,
          name: '',
          options: [],
          force_name: '',
        },
      },
    };
  },
  mounted() {
    this.battleInfo.battleName = this.battle.name;
    this.battleInfo.mapName = this.battle.map.name;
    this.battleInfo.mode = Object.keys(this.modes)[this.battle.mode];
    const meeting = new Date(this.battle.meeting_at);
    this.battleInfo.meetingTime = `${meeting.getFullYear()}/${meeting.getMonth() + 1}/${meeting.getDate()} ${meeting.getHours()}:${this.minutes_with_leading_zeros(meeting)} GMT+8:00`;
    const start = new Date(this.battle.match_at);
    this.battleInfo.startTime = `${start.getFullYear()}/${start.getMonth() + 1}/${start.getDate()} ${start.getHours()}:${this.minutes_with_leading_zeros(start)} GMT+8:00`;
    this.divisions = [...this.battle.forces[0].divisions, ...this.battle.forces[1].divisions];
  },
  methods: {
    goNewSquad(squadId) {
      const targetDiv = this.divisions.find((element) => element.id == squadId);
      this.register.setting.limit_squad_player = targetDiv.limit_squad_player;
      this.register.setting.limit_total_player = targetDiv.limit_total_player;
      this.register.setting.name = targetDiv.name;
      this.register.data.division_id = squadId;
      for (let i = 1; i <= targetDiv.limit_squad_player; i++) {
        this.register.setting.options.push(i);
      }
      this.register.setting.force_name = (targetDiv.force_id == 1) ? 'Axis' : 'Allied';
    },
    createSquad() {
      axios.post(this.links.joinApi, qs.stringify(this.register.data)).then((response) => {
        if (response.status === 200) {
          console.log('Success!');
          // console.log(`Squad: ${response.data.result}`);
        } else {
          console.log('Failed!');
          console.log(response.data.msg);
        }
      }).finally(() => {
        window.location.reload();
      });
    },
    minutes_with_leading_zeros(dt) {
      return (dt.getMinutes() < 10 ? '0' : '') + dt.getMinutes();
    },
  },
};
</script>

<style scoped>

</style>
