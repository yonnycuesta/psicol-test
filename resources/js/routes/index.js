import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: '/courses',
        name: 'courses',
        component: () => import("../components/CourseComponent.vue")
    },
    {
        path: '/students',
        name: 'students',
        component: () => import("../components/StudentComponent.vue")
    },
]

export const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router