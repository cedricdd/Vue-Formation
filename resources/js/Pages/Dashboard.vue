<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="w-full">
                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="submit">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                Title
                            </label>
                            <input v-model="form.title"
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="title" type="text" placeholder="Enter formation title">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                Description
                            </label>
                            <textarea v-model="form.description"
                                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                      id="description" type="text" placeholder="Enter formation description"></textarea>
                        </div>
                        <div class="mb-4">
                            <h2 class="text-2xl">Episodes in this Course</h2>
                            <div v-for="(episode, index) in form.episodes" v-bind:key="index" class="mt-6">
                                <label class="block text-gray-700 text-sm font-bold my-2" for="title-ep-{{ index + 1 }}">
                                    Episode title #{{ index + 1 }}
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       v-model="form.episodes[index].title" id="title-ep-{{ index + 1 }}" type="text" placeholder="Enter episode title">

                                <label class="block text-gray-700 text-sm font-bold my-2" for="description-ep-{{ index + 1 }}">
                                    Episode description #{{ index + 1 }}
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       v-model="form.episodes[index].description" id="description-ep-{{ index + 1 }}" type="text" placeholder="Enter episode description">

                                <label class="block text-gray-700 text-sm font-bold my-2" for="video-ep-{{ index + 1 }}">
                                    Episode video URL #{{ index + 1 }}
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                       v-model="form.episodes[index].video_url" id="video-ep-{{ index + 1 }}" type="text" placeholder="Enter episode video URL">

                                <button
                                    class="bg-red-500 hover:bg-red-700 text-white text-sm py-1 px-2 my-2 rounded focus:outline-none focus:shadow-outline"
                                    v-if="index > 0" @click.prevent="removeEpisode(index)">
                                    Remove Episode #{{ index + 1 }}
                                </button>
                            </div>
                        </div>

                        <button
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            v-if="form.episodes.length < 15" @click.prevent="addEpisode">
                            + Add Episode
                        </button>
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2"
                            type="submit">
                            Create Formation
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import {defineComponent} from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'

export default defineComponent({
    components: {
        AppLayout,
    },

    data() {
        return {
            form: {
                title: null,
                description: null,
                episodes: [
                    {
                        title: null,
                        description: null,
                        video_url: null
                    },
                ],
            },
        }
    },

    methods: {
        addEpisode() {
            this.form.episodes.push({
                title: null,
                description: null,
                video_url: null
            });
        },
        removeEpisode(index) {
            this.form.episodes.splice(index, 1)
        },
        submit() {
            this.$inertia.post("/courses", this.form);
        },
    },
})
</script>
