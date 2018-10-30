<v-toolbar color="light-blue darken-3" dark fixed app>
    <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
    <v-toolbar-title>{{ env('APP_NAME') }}</v-toolbar-title>
</v-toolbar>
