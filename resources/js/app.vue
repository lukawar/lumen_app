<template>
    <v-app id="inspire">
        <v-app-bar
            app
            color="cyan"
            dark
        >
            <v-spacer></v-spacer>
            <v-toolbar-title>App Wizard</v-toolbar-title>
        </v-app-bar>

        <v-content>
            <v-stepper v-model="e1">
                <v-stepper-header>
                    <v-stepper-step :complete="e1 > 1" step="1">Name of step 1</v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step :complete="e1 > 2" step="2">Name of step 2</v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step step="3">Name of step 3</v-stepper-step>
                </v-stepper-header>

                <v-stepper-items>
                    <v-stepper-content step="1">
                        <v-card
                            class="mb-12"
                            color="grey lighten-1"
                            height="200px"
                        ></v-card>

                        <v-btn
                            color="primary"
                            @click="e1 = 2"
                        >
                            Continue
                        </v-btn>

                        <v-btn text>Cancel</v-btn>
                    </v-stepper-content>

                    <v-stepper-content step="2">
                        <v-card
                            class="mb-12"
                            color="grey lighten-1"
                            height="200px"
                        ></v-card>

                        <v-btn
                            color="primary"
                            @click="e1 = 3"
                        >
                            Continue
                        </v-btn>

                        <v-btn text>Cancel</v-btn>
                    </v-stepper-content>

                    <v-stepper-content step="3">
                        <v-card
                            class="mb-12"
                            color="grey lighten-1"
                            height="200px"
                        ></v-card>

                        <v-btn
                            color="primary"
                            @click="e1 = 1"
                        >
                            Continue
                        </v-btn>

                        <v-btn text>Cancel</v-btn>
                    </v-stepper-content>
                </v-stepper-items>
            </v-stepper>
        </v-content>


        <v-footer
            color="cyan"
            app
        >
            <v-spacer></v-spacer>

            <span class="white--text">&copy; {{ new Date().getFullYear() }}</span>
        </v-footer>
    </v-app>
</template>

<script>
export default {
    name: 'app',
    props: {
        source: String,
    },
    data () {
        return {
            e1: 1,
        }
    },
}
</script>
