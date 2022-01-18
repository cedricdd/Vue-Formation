<template>
    <app-layout>
        <template #header>
            Liste des formations
        </template>
        <div class="py-4" v-for="course in this.coursesList" v-bind:key="course.id">
            <div class="mx-8 bg-blue-200 rounded shadow p-4">
                <div class="text-sm text-black-500">Mis en ligne par: {{ course.user.name }}</div>
                <div class="flex justify-between items-center">
                    <div class="text-4xl">
                        {{ course.title }}
                    </div>
                    <div>{{  course.episodes_count }} épisodes</div>
                </div>
                <div class="text-sm text-black-300">{{ course.description }}</div>
                <a :href="route('courses.show', course.id)" class="bg-indigo-500 text-white px-2 py-1 text-sm mt-3 inline-block rounded hover:bg-indigo-700">
                    Voir la Formation
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
