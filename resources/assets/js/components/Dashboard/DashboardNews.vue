<template>
  <v-container 
    fluid 
    grid-list-md>
    <v-card tile>
      <v-layout 
        row 
        wrap>
        <v-flex x12>
          <v-card 
            tile 
            flat>
            <p>dashboard news!</p>
          </v-card>
        </v-flex>
      </v-layout>
    </v-card>
  </v-container>
</template>

<script>
export default {
    name: "DashboardNews",
    data () {
        return {
            items: []
        }
    }
};
</script>

<style scoped>
</style>
