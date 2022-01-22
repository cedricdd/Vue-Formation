<template>
    <div class="w-full bg-gray-200 rounded-full mt-6">
        <div class="bg-green-500 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-l-full" :style="`width: ${percentage}%`"> {{ percentage }}%</div>
    </div>
</template>

<script>
export default {
    name: "ProgressBar",

    props: {
      max: {
          type: Number,
          required: true,
      },
      current: {
          type: Number,
          required: true,
      },
    },

    computed: {
        percentage() {
            return ((this.current / this.max) * 100).toFixed(2);
        },
    },
}
</script>

