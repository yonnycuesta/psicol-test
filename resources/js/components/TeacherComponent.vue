<template>
  <div class="container">
    <div class="row justify-content-center">
      <!-- <div class="col-md-10">
        <div class="card">
          <div class="card-header">Estudiante Component</div>
          <div class="card-body">
            I'm a teacher component. Soy un componente de estudiante.
            {{ name }}
            <input type="text" v-model="name" class="form-control" />
          </div>
        </div>
      </div> -->
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Listado de Profesores</div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">DNI</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Teléfono</th>
                  <th scope="col">Dirección</th>
                  <th scope="col">Ciudad</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="teacher in teachers.data" :key="teacher.id">
                    <td>{{ teacher.dni }}</td>
                    <td>{{ teacher.name }}</td>
                    <td>{{ teacher.email }}</td>
                    <td>{{ teacher.phone }}</td>
                    <td>{{ teacher.address }}</td>
                    <td>{{ teacher.city }}</td>
                    <td>
                        <a href="#" class="btn btn-dark m-1" title="Ver Clases">
                            <i class="fas fa-eye">C</i>
                        </a>
                        <a href="#" class="btn btn-secondary m-1" title="Ver Materias">
                            <i class="fas fa-eye">M</i>
                        </a>
                    </td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="7">
                    <pagination
                      :data="teachers"
                      @pagination-change-page="getTeachers"
                    ></pagination>
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "TeacherComponent",
  data() {
    return {
      name: "",
      teachers: {},
    };
  },
  mounted() {
    this.getTeachers();
  },
  methods: {
    getTeachers(page = 1) {
      axios
        .get("/teachers?page=" + page)
        .then((response) => {
          this.teachers = response.data.teachers;
          console.log(this.teachers);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>