<template>
  <div>
    <dashboard-count-page
      :count="activities"
      title="Activities"
      color="red"
      icon="fitness_center"
    />
    <dashboard-count-page
      :count="members"
      title="Members"
      color="light-blue "
      icon="supervisor_account"
    />
    <dashboard-count-page
      :count="services"
      title="Services"
      color="orange"
      icon="settings_applications"
    />

    <weather-page />
  </div>
</template>

<script>
import DashboardCountPage from "./DashboardCountPage";

export default {
    name: "DashboardCount",
    components: {
        DashboardCountPage
    },
    props: {
        activities: {
            type: String
        },
        members: {
            type: String
        },
        services: {
            type: String
        }
    }
};
</script>

<style scoped>
</style>
