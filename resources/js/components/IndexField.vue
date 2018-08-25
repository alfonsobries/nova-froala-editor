<template>
    <excerpt>
        <froalaView v-model="field.value"></froalaView>
    </excerpt>
</template>

<script>
import Excerpt from './Excerpt.vue'

export default {
    props: ['resourceName', 'field'],

    components: { Excerpt },
}
</script>