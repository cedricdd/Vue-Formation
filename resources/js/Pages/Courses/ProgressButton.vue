<template>
    <div>
        <button class="rounded p-2 text-white" v-bind:class="this.isWatched ? 'bg-blue-300' : 'bg-green-500'" @click="toggleProgress()">
            {{ this.isWatched ? "Completed" : "Mark Complete" }}
        </button>
    </div>
</template>

<script>
    export default {
        props: {
            episodeId: {
                type: Number,
                required: true,
            },
            watchedEpisodes: {
                type: Array,
                required: true,
            },
        },

        data() {
          return {
              watchedEps: this.watchedEpisodes,
              isWatched: null,
          }
        },

        methods: {
            toggleProgress() {
                axios.post('/toggleProgress', {
                    episodeId: this.episodeId,
                })
                .then(response => {
                    if(response.status == "200") {
                        this.isWatched ^= 1;
                        this.$emit('clicked', this.isWatched)
                    }
                })
                .catch(error => console.log(error));
            },

            isWatchedEpisode() {
                return this.watchedEps.find(episode => episode.id === this.episodeId) ? true : false;
            }
        },

        beforeMount() {
          this.isWatched = this.isWatchedEpisode();
        }
    }
</script>
