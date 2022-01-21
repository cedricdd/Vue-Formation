<template>
    <app-layout>
        <template #header>
            {{ course.title }}
        </template>
        <div class="py-4 mx-8">
            <div class="text-4xl text-center my-4">{{ courseShow.episodes[currentKey].title }}</div>
            <iframe class="w-full h-screen" :src="courseShow.episodes[currentKey].video_url" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="mt-4 text-black-500">{{ courseShow.episodes[currentKey].description }}</div>

            <div class="mt-6">
                <ul id="list_episodes">
                    <li v-for="(episode, index) in courseShow.episodes" v-bind:key="episode.id"
                        v-bind:class="index % 2 ? 'bg-white' : ''"
                        class="mt-2 p-2 rounded flex justify-between items-center shadow">
                        <div>
                            #{{ index + 1 }} - {{ episode.title }}
                            <button class="text-gray-500 border border-slate-500 rounded px-1 hover:text-black focus:text-indigo-500 focus:outline-none"
                                    v-bind:class="index % 2 ? 'bg-grey' : 'bg-white'" @click="switchEpisode(index)">
                                Show Episode
                            </button>
                        </div>
                        <progress-button :episode-id="episode.id" :watched-episodes="watched" />
                    </li>
                </ul>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";
import ProgressButton from "./ProgressButton";

export default {
    components: {
        AppLayout,
        ProgressButton,
    },

    props: {
        course: {
            type: Object,
            required: true,
        },
        watched: {
            type: Array,
            default: [],
        }
    },

    data() {
        return {
            currentKey: 0,
            courseShow: this.course
        }
    },

    methods: {
      switchEpisode(index) {
          this.currentKey = index;

          window.scrollTo({
              top: 0,
              left: 0,
              behavior: "smooth",
          })
      }
    },
}
</script>
