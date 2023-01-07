import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: '/subjects',
        name: 'subjects',
        component: () => import("../components/SubjectComponent.vue")
    },
    {
        path: '/students',
        name: 'students',
        component: () => import("../components/StudentComponent.vue")
    },
    {
        path: '/students/create',
        name: 'students.create',
        component: () => import("../components/creates/StudentCreateComponent.vue")
    },
    {
        path: '/teachers',
        name: 'teachers',
        component: () => import("../components/TeacherComponent.vue")
    },
    {
        path: '/classes',
        name: 'classes',
        component: () => import("../components/ClassComponent.vue")
    },
    {
        path: '/enrollments',
        name: 'enrollments',
        component: () => import("../components/EnrollmentComponent.vue")
    },
]

export const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router