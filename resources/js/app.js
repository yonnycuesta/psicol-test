/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import axios from 'axios';
import {router} from './routes/index';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import CourseComponent from './components/CourseComponent.vue';
import HomeComponent from './components/HomeComponent.vue';
import StudentComponent from './components/StudentComponent.vue';
import TeacherComponent from './components/TeacherComponent.vue';
import SubjectComponent from './components/SubjectComponent.vue';
import ClassComponent from './components/ClassComponent.vue';
import EnrollmentComponent from './components/EnrollmentComponent.vue';

app.component('course-component', CourseComponent);
app.component('home-component', HomeComponent);
app.component('student-component', StudentComponent);
app.component('teacher-component', TeacherComponent);
app.component('subject-component', SubjectComponent);
app.component('class-component', ClassComponent);
app.component('enrollment-component', EnrollmentComponent);

// API URL
axios.defaults.baseURL = 'http://localhost:8000/api';

app.use(router, axios);
app.mount('#app');
