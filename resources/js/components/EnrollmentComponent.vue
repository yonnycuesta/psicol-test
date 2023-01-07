<template>
  <div class="container">
    <div class="row justify-content-center">
      <!-- <div class="col-md-10">
        <div class="card">
          <div class="card-header">Estudiante Component</div>
          <div class="card-body">
            I'm a student component. Soy un componente de estudiante.
            {{ name }}
            <input type="text" v-model="name" class="form-control" />
          </div>
        </div>
      </div> -->
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Listado de Matrículas</div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Estudiante</th>
                  <th scope="col">Clases</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="enrollment in enrollments.data" :key="enrollment.id">
                  <td>
                    {{
                      enrollment.student.name +
                      " " +
                      enrollment.student.lastname
                    }}
                  </td>
                  <td></td>
                  <td>{{ enrollment.date_enrolled }}</td>
                  <td></td>
                  <td>
                    <a
                      href="#"
                      class="btn btn-secondary m-1"
                      title="Ver detalles"
                    >
                      <i class="fas fa-eye"> D</i>
                    </a>
                  </td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="7">
                    <pagination
                      :data="enrollments"
                      @pagination-change-page="getEnrollments"
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
  name: "EnrollmentComponent",
  data() {
    return {
      name: "",
      enrollments: {},
    };
  },
  mounted() {
    this.getEnrollments();
  },
  methods: {
    getEnrollments(page = 1) {
      axios
        .get("/enrollments?page=" + page)
        .then((response) => {
          this.enrollments = response.data.enrollments;
          console.log(this.enrollments);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
