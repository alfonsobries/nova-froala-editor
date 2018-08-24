<template>
    <div>
        {{ field.value }}
        <span @click="start" v-if="couldStart">▶</span>
        <span @click="stop" v-if="display">✖</span>
        <youtube v-if="display" :video-id="videoId" :player-vars="playerOptions" :mute="mute" />
    </div>
</template>

<script>
    import Vue from 'vue'

    import VueYouTubeEmbed, {getIdFromURL, YouTubePlayer} from 'vue-youtube-embed'

    Vue.use(VueYouTubeEmbed, {global: false});
export default {
    props: ['resourceName', 'field'],

    components: {
        'youtube': YouTubePlayer
    },

    data() {
        return {
            play: false,
        };
    },

    methods: {
        start() {
            this.play = true;
        },

        stop() {
            this.play = false;
        }
    },

    computed: {
        display() {
            if(this.videoId.length > 1 && this.field.value.indexOf('http') === 0) {
                return this.play
            }
            return false
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
        },

        couldStart() {
            if (this.videoId.length > 1 && this.field.value.indexOf('http') === 0) {
                return !this.play;
            }
            return false;
        },

    }
}
</script>