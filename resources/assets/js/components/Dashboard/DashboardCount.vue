<template>
  <div>
    <dashboard-count-page
      title="Activities"
      color="blue lighten-1"
      icon="fitness_center"/>
    <dashboard-count-page
      title="Members"
      color="teal accent-3"
      icon="supervisor_account"/>
    <dashboard-count-page
      title="Services"
      color="orange lighten-1"
      icon="settings_applications"
    />
  </div>
</template>

<script>
import DashboardCountPage from "./DashboardCountPage";

export default {
    name: "DashboardCount",
    components: {
        DashboardCountPage
    }
};
</script>

<style scoped>
</style>
