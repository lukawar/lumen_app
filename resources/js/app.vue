<template>
    <v-app id="inspire">
        <v-app-bar app color="cyan" dark>
            <v-spacer></v-spacer>
            <v-toolbar-title>App Wizard</v-toolbar-title>
        </v-app-bar>

        <v-content>
            <v-stepper v-model="e1">
                <v-stepper-header>
                    <v-stepper-step :complete="e1 > 1" step="1">Krok 1</v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step :complete="e1 > 2" step="2">Krok 2</v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step step="3">Krok 3</v-stepper-step>
                </v-stepper-header>

                <v-stepper-items>
                    <!-- STEP1 -->
                    <v-stepper-content step="1">
                        <v-container justify="center">
                            <v-row>
                                <v-col cols="12">
                                    <v-combobox
                                        v-model="states"
                                        :items="items"
                                        label="Wybierz województwo"
                                    ></v-combobox>

                                </v-col>
                                <v-col cols="6" sm="6" md="6">
                                    <v-menu
                                        ref="menuFrom"
                                        v-model="menuFrom"
                                        :close-on-content-click="false"
                                        :return-value.sync="dateFrom"
                                        transition="scale-transition"
                                        offset-y
                                        min-width="290px"
                                    >
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-text-field
                                                v-model="dateFrom"
                                                label="Data od"
                                                prepend-icon="event"
                                                readonly
                                                v-bind="attrs"
                                                v-on="on"
                                            ></v-text-field>
                                        </template>
                                        <v-date-picker v-model="dateFrom" no-title scrollable max="2025-12-31" min="1950-01-01">
                                            <v-spacer></v-spacer>
                                            <v-btn text color="primary" @click="menuFrom = false">Anuluj</v-btn>
                                            <v-btn text color="primary" @click="$refs.menuFrom.save(dateFrom)">OK</v-btn>
                                        </v-date-picker>
                                    </v-menu>
                                </v-col>

                                <v-col cols="6" sm="6" md="6">
                                    <v-menu
                                        ref="menuTo"
                                        v-model="menuTo"
                                        :close-on-content-click="false"
                                        :return-value.sync="dateTo"
                                        transition="scale-transition"
                                        offset-y
                                        min-width="290px"
                                    >
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-text-field
                                                v-model="dateTo"
                                                label="Data od"
                                                prepend-icon="event"
                                                readonly
                                                v-bind="attrs"
                                                v-on="on"
                                            ></v-text-field>
                                        </template>
                                        <v-date-picker v-model="dateTo" no-title scrollable max="2025-12-31" min="1950-01-01">
                                            <v-spacer></v-spacer>
                                            <v-btn text color="primary" @click="menuTo = false">Anuluj</v-btn>
                                            <v-btn text color="primary" @click="$refs.menuTo.save(dateTo)">OK</v-btn>
                                        </v-date-picker>
                                    </v-menu>
                                </v-col>

                                <v-col cols="12" md="12">
                                    <v-text-field
                                        v-model="email"
                                        :rules="emailRules"
                                        label="E-mail"
                                        required
                                        id="gi"
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12" md="12"> <v-text-field
                                    v-model="mixedString2"
                                    label="Wygenerowany ciąg znaków"
                                    required
                                    ref="letters"
                                    @click="rletters(this)"
                                ></v-text-field></v-col>
                                <v-col cols="12" md="12"><h3 id="charPosition" @click="getltr(this)">{{mixedString2}}</h3></v-col>
                                <v-col cols="12" md="12"><template v-slot:ltr="{ item }">
                                    <v-chip v-for="(l, i) in ltr" :key="i">
                                        {{ l }}
                                    </v-chip>
                                </template></v-col>
                            </v-row>

                        </v-container>


                        <v-btn color="primary" @click="step1">Dalej</v-btn>
                    </v-stepper-content>

                    <!-- STEP2 -->
                    <v-stepper-content step="2">
                        <v-card class="mb-12" color="lighten-1" height="200px">
                            <v-row>
                                <v-col cols="12" md="12">
                                    <v-text-field
                                        v-model="mixedString"
                                        label="Wygenerowany ciąg znaków"
                                        required

                                    ></v-text-field>
                                </v-col>
                                <v-col cols="10" md="10">
                                    <v-text-field
                                        v-model="uuid"
                                        label="UUID"
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="2" md="2"><v-btn @click="getUUID" color="error" dark large>Generuj nowy UUID</v-btn></v-col>
                            </v-row>
                        </v-card>

                        <v-btn color="primary" @click="step2">Dalej</v-btn>
                        <v-btn text @click="step2back">Cofnij</v-btn>
                    </v-stepper-content>

                    <!-- STEP3 -->
                    <v-stepper-content step="3">
                        <v-card class="mb-12" color="grey lighten-1" height="200px"></v-card>

                        <v-btn color="primary" @click="e1 = 1">Continue</v-btn><v-btn text>Cofnij</v-btn>
                    </v-stepper-content>
                </v-stepper-items>
            </v-stepper>
        </v-content>


        <v-footer color="cyan" app>
            <v-spacer></v-spacer>

            <span class="white--text">&copy; {{ new Date().getFullYear() }}</span>
        </v-footer>
    </v-app>
</template>

<script>
import axios from "axios";
export default {
    name: 'app',
    props: {
        source: String,
    },
    data () {
        return {
            e1: 1,
            states: [],
            items: [],
            ltr: [],
            dateFrom: new Date().toISOString().substr(0, 10),
            dateTo: new Date().toISOString().substr(0, 10),
            menuFrom: false,
            menuTo: false,
            valid: false,
            email: '',
            mixedString: '',
            mixedString2: 'sdfsdfsdfsfdsfsfrwtrgfsgf',
            uuid: null,
            emailRules: [
                v => !!v || 'E-mail jest wymagany',
                v => /.+@.+/.test(v) || 'E-mail musi być poprawny i w domenie com.pl',
            ],
        }
    },
    methods: {
        step1() {
            this.mixed(this.states, this.email);
            this.e1 = 2
        },
        step2() {
            this.mixed(this.states, this.email);
            this.e1 = 3
        },
        step2back() {
            this.e1 = 1
        },
        mixed(states, email) {
            axios
                .post("/api/utils/mixed", {
                    strings: [states, email],
                    headers: {
                        "Content-type": "application/x-www-form-urlencoded"
                    }
                })
                .then(response => {
                    this.mixedString = response.data.mixed;
                })
                .catch(e => {
                    console.log(e);
                });
        },
        getUUID() {
            axios
                .get("/api/utils/uuid", {})
                .then(response => {
                    this.uuid = response.data.uuid;
                })
                .catch(e => {
                    console.log(e);
                });
        },
        getltr(element) {
            console.log(element.innerHTML)
        }

    },
    created() {
        axios
            .get("/api/utils/states", {})
            .then(response => {
                this.items = response.data;
            })
            .catch(e => {
                console.log(e);
            });
    }

}

</script>
