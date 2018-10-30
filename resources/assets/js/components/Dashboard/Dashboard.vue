<template>
  <v-layout 
    row 
    wrap 
    class="my-1">
    <v-flex
      xs8
      py-0>
    </v-flex>
    <v-flex
      xs4 
      py-0>
      <dashboard-count
              title="Activities"
        color="blue lighten-1" 
        icon="supervisor_account"/>
      <dashboard-count
              title="Members"
        color="teal accent-3"
        icon="fitness_center"/>
      <dashboard-count
              title="Services"
              color="orange lighten-1"
              icon="fitness_center"
      />
    </v-flex>
  </v-layout>
</template>

<script>
import DashboardCount from "./DashboardCount";

export default {
    name: "Dashboard",
    components: {
        DashboardCount
    }
};
</script>

<style scoped>
</style>
