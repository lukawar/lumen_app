import Router from "vue-router";

export default new Router({
    mode: "history",
    routes: [
        {
            meta: {visibleInMenu: true, icon: "home", title: "PULPIT"},
            path: "/example",
            name: "example",
            //component: dashboard,
        }
    ]
});
