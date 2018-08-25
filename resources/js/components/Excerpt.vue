<template>
    <div>
        <slot v-if="expanded" class="markdown" />

        <a
            @click="toggle"
            class="cursor-pointer dim inline-block text-primary font-bold"
            :class="{ 'mt-6': expanded }"
            aria-role="button"
        >
            {{ showHideLabel }}
        </a>
    </div>
</template>

<script>
export default {
    
    data: () => ({ expanded: false }),

    methods: {
        toggle() {
            this.expanded = !this.expanded
        },
    },

    computed: {
        showHideLabel() {
            return !this.expanded ? 'Show Content' : 'Hide Content'
        },
    },
}
</script>
