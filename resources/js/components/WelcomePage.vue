<template>
  <div class="flex items-center justify-center h-screen font-mono font-semibold">
    <!-- <div class="w-full">
      <t-button :href="links.next">Link to last battle page</t-button>
      <t-button :href="links.history">Link to all battle page</t-button>
    </div> -->
    <div class="flex flex-col w-9/12 md:w-5/6 bg-gradient-to-br from-gray-50 opacity-70 min-h-3/4 rounded-3xl items-center">
      <div class="h-10 w-full rounded-3xl bg-gray-50 bg-opacity-50 items-center justify-center text-center">
        <h1 class="text-4xl">HLL Pacific Exercise</h1>
      </div>
      <div class="flex flex-col bg-gray-100 bg-opacity-90 w-5/6 rounded-3xl mt-5 p-4">
        <p>HLL Pacific Exercise is a public game but on squad level, players are no longer individuals , in Asia time zone (GMT+8). The core value of Hell let loose is to use military tactics: maneuver, flank, ambush, frontal assault. All this can not be achieved withoutaround squad play. we offer a more competitive game</p>
      </div>
      <div class="flex flex-col bg-gray-100 bg-opacity-90 rounded-3xl mt-5 w-5/6 p-4">
        <h3 class="text-lg">How to join:</h3>
        <ul>
          <li>
            <svg class="w-5 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="orange">
              <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            team up with friends, 1 for cmdr, 5-6 for infantry squad, 2-3 for tank, 2 for recon, 1-2 for arty.
          </li>
          <li>
            <svg class="w-5 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="orange">
              <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            registration on website, opens every Monday, first come first serve.
          </li>
          <li>
            <svg class="w-5 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="orange">
              <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            confirmation via steam, check your friend requests
          </li>
          <li>
            <svg class="w-5 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="orange">
              <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            squad leader join Discord 20:00 GMT+8(make sure your discord and steam names are the same)
          </li>
          <li>
            <svg class="w-5 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="orange">
              <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            if you don’t join on time you lose the reservation
          </li>
        </ul>
      </div>
      <div class="flex flex-col bg-gray-100 bg-opacity-90 rounded-3xl mt-5 w-5/6 p-4">
        <h3 class="text-lg">Basic rules:</h3>
        <ul>
          <li>
            <svg class="w-5 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#10B981">
              <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
            </svg>
            command language: simple English, squad language: see as you fit. 
          </li>
          <li>
            <svg class="w-5 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#10B981">
              <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
            </svg>
            be cooperative, responsive, coordinate, follow instructions.
          </li>
        </ul>
      </div>
      <div class="flex flex-col bg-gray-100 bg-opacity-90 rounded-3xl mt-5 w-5/6 p-4">
        <h3 class="text-lg">Basic rules:</h3>
        <ul>
          <li>
            <svg class="w-5 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#818CF8">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
            </svg>
            Every Saturday 20:00 GMT+8
          </li>
          <li>
            <svg class="w-5 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#818CF8">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
            </svg>
            20:00 squad leaders join Discord
          </li>
          <li>
            <svg class="w-5 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#818CF8">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
            </svg>
            20:00 - 20:15 team balance
          </li>
          <li>
            <svg class="w-5 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#818CF8">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
            </svg>
            20:15 - 20:30 commander/squad leader briefing, everyone join the server on the opposite team
          </li>
          <li>
            <svg class="w-5 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#818CF8">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
            </svg>
            20:20 - 20:30  Map reset. One round on set map. Have Fun.
          </li>
          <li>
            <svg class="w-5 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#818CF8">
              <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
            </svg>
            20:30 - 22:00 game on, have fun!
          </li>
        </ul>
      </div>
      <div class="flex flex-wrap bg-gray-100 bg-opacity-100 rounded-3xl my-5 w-5/6 p-4 justify-evenly content-evenly">
        <div class="flex flex-row items-center bg-gradient-to-r from-indigo-400 via-purple-300 to-pink-300 p-2 rounded-2xl cursor-pointer " @click="goDiscord">
          <p class="text-lg break-words">Join us on discord</p>
          <svg class="w-20" fill="#23272A" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 245 240">
            <path d="M104.4 103.9c-5.7 0-10.2 5-10.2 11.1s4.6 11.1 10.2 11.1c5.7 0 10.2-5 10.2-11.1.1-6.1-4.5-11.1-10.2-11.1zM140.9 103.9c-5.7 0-10.2 5-10.2 11.1s4.6 11.1 10.2 11.1c5.7 0 10.2-5 10.2-11.1s-4.5-11.1-10.2-11.1z"/><path d="M189.5 20h-134C44.2 20 35 29.2 35 40.6v135.2c0 11.4 9.2 20.6 20.5 20.6h113.4l-5.3-18.5 12.8 11.9 12.1 11.2 21.5 19V40.6c0-11.4-9.2-20.6-20.5-20.6zm-38.6 130.6s-3.6-4.3-6.6-8.1c13.1-3.7 18.1-11.9 18.1-11.9-4.1 2.7-8 4.6-11.5 5.9-5 2.1-9.8 3.5-14.5 4.3-9.6 1.8-18.4 1.3-25.9-.1-5.7-1.1-10.6-2.7-14.7-4.3-2.3-.9-4.8-2-7.3-3.4-.3-.2-.6-.3-.9-.5-.2-.1-.3-.2-.4-.3-1.8-1-2.8-1.7-2.8-1.7s4.8 8 17.5 11.8c-3 3.8-6.7 8.3-6.7 8.3-22.1-.7-30.5-15.2-30.5-15.2 0-32.2 14.4-58.3 14.4-58.3 14.4-10.8 28.1-10.5 28.1-10.5l1 1.2c-18 5.2-26.3 13.1-26.3 13.1s2.2-1.2 5.9-2.9c10.7-4.7 19.2-6 22.7-6.3.6-.1 1.1-.2 1.7-.2 6.1-.8 13-1 20.2-.2 9.5 1.1 19.7 3.9 30.1 9.6 0 0-7.9-7.5-24.9-12.7l1.4-1.6s13.7-.3 28.1 10.5c0 0 14.4 26.1 14.4 58.3 0 0-8.5 14.5-30.6 15.2z"/>
          </svg>
        </div>
        <div class="flex flex-row items-center bg-gradient-to-r from-indigo-400 via-purple-300 to-pink-300 p-2 rounded-2xl cursor-pointer" @click="goNext">
          Join next battle
          <svg class="w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#23272A">
            <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z" />
          </svg>
        </div>
        <!-- <div class="flex flex-row items-center bg-gradient-to-r from-indigo-400 via-purple-300 to-pink-300 p-2 rounded-2xl cursor-not-allowed" @click="goHistory">
          View previous match
          <svg class="w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#23272A">
            <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm14 1a1 1 0 11-2 0 1 1 0 012 0zM2 13a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2zm14 1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd" />
          </svg>
        </div> -->
      </div>
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
  methods: {
    goDiscord() {
      window.open('https://discord.gg/77D9Te7S3H ')
    },
    goNext() {
      location.href = this.links.next
    },
    goHistory() {
      //location.href = this.links.history
    }
  }
};
</script>

<style scoped>

</style>
