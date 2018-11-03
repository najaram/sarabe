<template>
  <v-container 
    fluid 
    grid-list-md>
    <v-card tile>
      <v-layout 
        row 
        wrap>
        <v-flex 
          x12 
          class="p-0">
          <v-card 
            tile 
            flat>
            <dashboard-news-list :items="items"/>
          </v-card>
        </v-flex>
      </v-layout>
    </v-card>
  </v-container>
</template>

<script>
export default {
    name: "DashboardNews",
    data() {
        return {
            items: []
        };
    },
    mounted() {
        this.getNews();
    },
    methods: {
        getNews() {
            axios
                .get("/news-api?path=top-headlines?country=ph")
                .then(response => {
                    this.items = response.data.articles;
                });
        }
    }
};
</script>

<style scoped>
</style>
