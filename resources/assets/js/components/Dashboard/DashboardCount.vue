<template>
  <div>
    <dashboard-count-page
      :count="activities"
      title="Activities"
      color="blue lighten-1"
      icon="fitness_center"
    />
    <dashboard-count-page
      :count="members"
      title="Members"
      color="teal accent-3"
      icon="supervisor_account"
    />
    <dashboard-count-page
      :count="services"
      title="Services"
      color="orange lighten-1"
      icon="settings_applications"
    />

    <dashboard-count-page
            :count="services"
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
