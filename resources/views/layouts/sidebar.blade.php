<v-list-tile @click="">
    <v-list-tile-action>
        <v-icon>home</v-icon>
    </v-list-tile-action>
    <v-list-tile-content>
        <v-list-tile-title>Home</v-list-tile-title>
    </v-list-tile-content>
</v-list-tile>
<v-list-tile @click="">
    <v-list-tile-action>
        <v-icon>contact_mail</v-icon>
    </v-list-tile-action>
    <v-list-tile-content>
        <v-list-tile-title>Contact</v-list-tile-title>
    </v-list-tile-content>
</v-list-tile>
<v-list-tile @click="logout('{{route('logout')}}','{{url('/')}}')">
    <v-list-tile-action>
        <v-icon>directions_walk</v-icon>
    </v-list-tile-action>
    <v-list-tile-content>
        <v-list-tile-title>Logout</v-list-tile-title>
    </v-list-tile-content>
</v-list-tile>
