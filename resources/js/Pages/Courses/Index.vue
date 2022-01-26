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
                   class="float-left bg-indigo-500 text-white px-2 py-1 text-sm mt-3 inline-block rounded hover:bg-indigo-700">
                    Show Episodes
                </a>
                <form v-if="course.user_id === $page.props.user.id" class="float-right" @submit.prevent="deleteCourse">
                    <input type="hidden" id="courseId" :value="course.id">
                    <button type="submit" class="bg-red-500 text-white px-2 py-1 text-sm mt-3 inline-block rounded hover:bg-red-700">
                        Delete Course
                    </button>
                </form>
                <div class="clear-both"></div>
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

    props: {
        courses: {
            type: Object,
            required: true,
        }
    },

    data() {
        return {
            coursesList: this.courses
        }
    },

    methods: {
        async deleteCourse() {
              const response = await axios.delete('/courses/');
              if(response.data.status === 'success') {

              } else {

              }
        },
    },

    // Called synchronously immediately after the instance has been initialized, before data observation and event/watcher setup.
    beforeCreate() {
        console.log('beforeCreate');
    },
    // Called synchronously after the instance is created. At this stage, the instance has finished processing the options
    // which means the following have been set up: data observation, computed properties, methods, watch/event callbacks.
    created() {
        console.log('created');
    },
    // Called right before the mounting begins: the render function is about to be called for the first time.
    beforeMount() {
        console.log('beforeMount');
    },
    // Called after the instance has been mounted, where element, passed to app.mount is replaced by the newly created vm.$el
    mounted() {
        console.log('mounted');

        this.$nextTick(function () {
            // Code that will run only after the
            // entire view has been rendered
        })
    },
    // Called when data changes, before the DOM is patched.
    beforeUpdate() {
        console.log('beforeUpdate');
    },
    // Called after a data change causes the virtual DOM to be re-rendered and patched.
    updated() {
        console.log('updated');

        this.$nextTick(function () {
            // Code that will run only after the
            // entire view has been re-rendered
        })
    },
    // Called right before a component instance is unmounted. At this stage the instance is still fully functional.
    beforeUnmount() {
        console.log('beforeUnmount');
    },
    // Called after a component instance has been unmounted.
    unmounted() {
        console.log('unmounted');
    },
}
</script>
