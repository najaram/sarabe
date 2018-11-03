<template>
  <v-container 
    fluid 
    grid-list-md>
    <v-card tile>
      <v-layout 
        row 
        wrap>
        <v-flex 
          xs12 
          py-0>
          <v-card
            :color="color"
            tile 
            flat>
            <v-layout 
              row 
              wrap 
              fill-height 
              my-0 
              mr-0 
              p-5 
              py-3>
              <v-flex
                xs8
                pl-4 
                class="m-0 text-xs-left headline">
                <h3>{{ title }}</h3>
                <h2 class="m-0">{{ count }}</h2>
              </v-flex>
              <v-flex 
                xs4
                class="m-0 white--text title">
                <v-icon large>{{ icon }}</v-icon>
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
    name: "DashboardCountPage",
    props: {
        color: {
            type: String,
            default: "primary"
        },
        icon: {
            type: String,
            default: "fitness_center"
        },
        title: {
            type: String,
            default: "activities"
        },
        count: {
            type: String,
            default: "activities"
        }
    }
};
</script>

<style scoped>
.theme--light.v-icon {
    color: white;
}
h3 {
    color: #ffffff;
    font-size: 16px;
}
h2 {
  font-size: 1.8em;
    color: #ffffff;
}
</style>
