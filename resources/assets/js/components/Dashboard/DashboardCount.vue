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
                class="m-0 text-xs-left white--text headline">
                <span>{{ title }}</span>
              </v-flex>
              <v-flex 
                xs4
                class="m-0 white--text title">
                <v-icon :color="color">{{ icon }}</v-icon>
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
    name: "DashboardCount",
    props: {
        color: {
            type: String,
            default: "primary"
        },
        icon: {
            type: String
        },
        title: {
            type: String
        }
    }
};
</script>

<style scoped>
.theme--light.v-icon {
    color: white;
}
  span {
    color: #333;
    font-size: 16px;
  }

</style>
