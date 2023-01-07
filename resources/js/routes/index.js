import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: '/home',
        name: 'subjects',
        component: () => import("../components/SubjectComponent.vue")
    },
    {
        path: '/subjects/create',
        name: 'subjects.create',
        component: () => import("../components/creates/SubjectCreateComponent.vue")
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
        path: '/teachers/create',
        name: 'teachers.create',
        component: () => import("../components/creates/TeacherCreateComponent.vue")
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