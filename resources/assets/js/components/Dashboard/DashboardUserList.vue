<template>
  <v-container fluid>
    <v-layout>
      <v-flex xs12>
        <v-data-table
          :headers="headers"
          :items="items"
          class="elevation-1"
        >
          <template 
            slot="headerCell" 
            slot-scope="props">
            <v-tooltip bottom>
              <span slot="activator">
                {{ props.header.text }}
              </span>
              <span>
                {{ props.header.text }}
              </span>
            </v-tooltip>
          </template>
          <template 
            slot="items" 
            slot-scope="props">
            <td class="text-xs-left">{{ props.item.last_name }}</td>
            <td class="text-xs-left">{{ props.item.first_name }}</td>
            <td class="text-xs-left">{{ props.item.address }}</td>
            <td class="text-xs-left">{{ props.item.phone }}</td>
            <td class="text-xs-left">{{ props.item.birthday }}</td>
            <td class="text-xs-left">
              <v-btn
                slot="activator"
                icon
                light>
                <v-icon color="light-blue lighten-1">visibility</v-icon>
              </v-btn>
            </td>
            <td class="text-xs-left">
              <v-btn
                      slot="activator"
                      icon
                      light>
                <v-icon color="red darken-1">delete</v-icon>
              </v-btn>
            </td>
          </template>
        </v-data-table>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
export default {
    name: "DashboardUserList",
    data() {
        return {
            headers: [
                {
                    text: "Last name",
                    value: "last_name",
                    align: "left",
                    sortable: false
                },
                {
                    text: "First name",
                    value: "first_name",
                    align: "left",
                    sortable: false
                },
                {
                    text: "Address",
                    value: "address",
                    align: "left",
                    sortable: false
                },
                {
                    text: "Phone",
                    value: "phone",
                    align: "left",
                    sortable: false
                },
                {
                    text: "Birthday",
                    value: "birthday",
                    align: "left",
                    sortable: false
                },
                { text: "View", value: false, align: "left", sortable: false },
                { text: "Delete", value: false, align: "left", sortable: false },
            ],
            items: []
        };
    },
    mounted() {
        this.getUsers();
    },
    methods: {
        getUsers() {
            axios.get("/members").then(response => {
                this.items = response.data.data;
            });
        }
    }
};
</script>

<style scoped>
</style>
