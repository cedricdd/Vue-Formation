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
                <ul v-for="(episode, index) in courseShow.episodes" v-bind:key="episode.id">
                    <li class="mt-3">
                        #{{ index + 1 }} - {{ episode.title }}
                        <button class="text-gray-500 focus:text-indigo-500 focus:outline-none" @click="switchEpisode(index)">Voir l'épisode</button>
                    </li>
                </ul>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
    components: {
        AppLayout
    },

    props: ['course'],

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
