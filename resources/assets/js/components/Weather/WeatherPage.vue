<template>
    <v-container fluid grid-list-md>
        <v-card tile>
            <v-layout row wrap>
                <v-flex xs12 py-0>
                    <v-card tile flat>
                        <v-layout v-if="weather.currently" row wrap fill-height my-0 mr-0 p-5 py-3>
                            <v-flex xs4 pl-4 class="m-0 text-xs-left headline">
                                <skycon :condition="weather.currently.icon" :width=80 :height=80 />
                            </v-flex>
                            <v-flex xs8 pl-4 class="m-0 text-xs-left headline">
                                <h2>{{ weather.currently.temperature }}</h2>
                                <p>{{ weather.currently.summary }}</p>
                                <p>Wind: {{ weather.currently.windSpeed }} mph</p>
                            </v-flex>
                        </v-layout>
                    </v-card>
                </v-flex>
            </v-layout>
        </v-card>
    </v-container>
</template>

<script>
    export default {
        data () {
            return {
                coordsPlace: {
                    sta_rosa: { lat: 14.2843, lng: 121.0889 },
                },
                weather: ''
            }
        },
        props: {
            width: {
                type: Number,
                default: 64
            },

            height: {
                type: Number,
                default: 64
            },

            // Weather condition
            condition: {
                type: String,
                default: null
            }
        },
        mounted () {
            this.getWeather();
        },
        methods: {
            getWeather() {
                axios.get('weather?lat='+this.coordsPlace.sta_rosa.lat+'&lng='+this.coordsPlace.sta_rosa.lng).then((response) => {
                    this.weather = response.data;
                })
            }
        }
    }
</script>

<style scoped>
    p {
        font-size: 14px;
        margin-bottom: 0;
    }
    h2 {
        margin-bottom: 0;
    }
</style>
