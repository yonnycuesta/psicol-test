<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Listado de Estudiantes
            <router-link href="#" to="/students/create" class="btn btn-primary float-right">Nuevo</router-link>
          </div>
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
                <tr v-for="student in students.data" :key="student.id">
                    <td>{{ student.dni }}</td>
                    <td>{{ student.name }}</td>
                    <td>{{ student.email }}</td>
                    <td>{{ student.phone }}</td>
                    <td>{{ student.address }}</td>
                    <td>{{ student.city }}</td>
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
                      :data="students"
                      @pagination-change-page="getStudents"
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
  name: "StudentComponent",
  data() {
    return {
      name: "",
      students: {},
    };
  },
  mounted() {
    this.getStudents();
  },
  methods: {
    getStudents(page = 1) {
      axios
        .get("/students?page=" + page)
        .then((response) => {
          this.students = response.data.students;
          console.log(this.students);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
