<template>
    <app-layout>
        <template #header>
            Liste des formations
        </template>
        <div class="py-4" v-for="course in this.coursesList" v-bind:key="course.id">
            <div class="mx-8 bg-blue-200 rounded shadow p-4">
                <div class="flex justify-between items-center">
                    <div class="text-4xl">{{ course.title }}</div>
                    <div>25 Episodes</div>
                </div>
                <div class="text-sm text-black-300">{{ course.description }}</div>
                <a class="bg-indigo-500 text-white px-2 py-1 text-sm mt-3 inline-block rounded hover:bg-indigo-700">
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

        data() {
            return {
                coursesList: this.courses
            }
        },

        props: ['courses'],

        mounted() {
            console.log(this.coursesList);
        }
    }
</script>
