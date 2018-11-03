<template>
  <v-layout row>
    <v-flex xs12 >
      <v-card class="p-4">
        <v-list two-line>
          <h2 class="text-sm-left pb-2">Current news</h2>
          <template v-for="(item, index) in items">
            <v-list-tile 
              :key="item.title" 
              avatar 
              target="_blank" 
              @click="goToLink(item.url)">
              <v-list-tile-avatar>
                <img :src="item.urlToImage">
              </v-list-tile-avatar>
              <v-list-tile-content>
                <v-list-tile-title v-html="item.title"/>
                <v-list-tile-sub-title v-html="item.description"/>
              </v-list-tile-content>
            </v-list-tile>
            <v-divider
              :inset="item.inset"
              :key="index"
            />
          </template>
        </v-list>
      </v-card>
    </v-flex>
  </v-layout>
</template>

<script>
export default {
    name: "DashboardNewsList",
    props: {
        items: {
            type: Array,
            required: true
        }
    },
    methods: {
        goToLink(url) {
            window.location.href = url;
        }
    }
};
</script>

<style scoped>
</style>
