<template>
  <div class="container">
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">...</div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            Listado de Estudiantes
            <router-link
              href="#"
              to="/students/create"
              class="btn btn-primary float-right"
              >Nuevo</router-link
            >
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
                    <button
                      class="btn btn-secondary m-1"
                      @click="showModalSubject(student.id)"
                      title="Ver Materias"
                    >
                      <i class="fas fa-eye">M</i>
                    </button>
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
      studentSubjects: [],
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

    showModalSubject(id) {
      // $("#exampleModal").modal("show");
      axios
        .get("/students/" + id)
        .then((response) => {
          this.studentSubjects = response.data.student;
          console.log('Subjects',this.studentSubjects);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
