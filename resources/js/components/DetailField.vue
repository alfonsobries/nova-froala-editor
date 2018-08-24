<template>
    <panel-item :field="field">
        <template v-if="display" slot="value">
            <youtube :video-id="videoId" :player-vars="playerOptions" :mute="mute"></youtube>
        </template>
    </panel-item>
</template>

<script>
    import Vue from 'vue'

    import VueYouTubeEmbed, {YouTubePlayer, getIdFromURL} from 'vue-youtube-embed'

    Vue.use(VueYouTubeEmbed, {global: false});

    export default {
        props: ['resource', 'resourceName', 'resourceId', 'field'],

        components: {
            'youtube': YouTubePlayer
        },

        computed: {
            display() {
                return this.videoId.length > 1 && this.field.value.indexOf('http') === 0;
            },

            videoId() {
                return getIdFromURL(this.field.value);
            },

            playerOptions() {
                if(this.field.options.playerOptions.length > 0) {
                    return this.field.options.playerOptions;
                }
                return {
                    autoplay: true
                }
            },

            mute() {
                return this.field.options.mute | true;
            }
        },

    }
</script>
