<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Estudiante Component</div>
                    <div class="card-body">
                        I'm a student component.
                        Soy un componente de estudiante.
                        {{ name }}
                        <input type="text" v-model="name" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'StudentComponent',
        data() {
            return {
                name: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
