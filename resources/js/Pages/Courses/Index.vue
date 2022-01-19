<template>
    <app-layout>
        <template #header>
            List of Courses
        </template>
        <div class="py-4" v-for="course in this.coursesList" v-bind:key="course.id">
            <div class="mx-8 bg-blue-200 rounded shadow p-4">
                <div class="text-sm text-black-500 inline-block">Created By: {{ course.user.name }}</div>
                -
                <div class="text-sm inline-block">
                    <span>{{ course.participants }}</span>
                    <span v-if="course.participants > 1"> participants</span><span v-else> participant</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="text-4xl">
                        {{ course.title }}
                    </div>
                    <div>{{ course.episodes_count }} épisodes</div>
                </div>
                <div class="text-sm text-black-300">{{ course.description }}</div>
                <a :href="route('courses.show', course.id)"
                   class="bg-indigo-500 text-white px-2 py-1 text-sm mt-3 inline-block rounded hover:bg-indigo-700">
                    Show Episode
                </a>
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

    props: ['courses'],

    data() {
        return {
            coursesList: this.courses
        }
    },
}
</script>
