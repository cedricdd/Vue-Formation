<template>
    <app-layout>
        <template #header>
            {{ course.title }}
        </template>
        <div class="py-4 mx-8">
            <div class="text-2xl">{{ courseShow.episodes[currentKey].title }}</div>
            <iframe class="w-full h-screen" :src="courseShow.episodes[currentKey].video_url" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="text-sm text-black-500">{{ courseShow.episodes[currentKey].description }}</div>

            <div class="mt-6">
                <ul id="list_episodes">
                    <li v-for="(episode, index) in courseShow.episodes" v-bind:key="episode.id" class="mt-2 p-2 rounded flex justify-between items-center">
                        <div>
                            #{{ index + 1 }} - {{ episode.title }}
                            <button class="text-gray-500 border-2 rounded px-1 hover:text-black focus:text-indigo-500 focus:outline-none" @click="switchEpisode(index)">Show Episode</button>
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

    props: ['course', 'watched'],

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
