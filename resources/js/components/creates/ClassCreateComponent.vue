<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-sm-8">
        <div class="card">
          <div class="card-header">
            Nueva Clase
            <router-link
              href="#"
              to="/classes"
              class="btn btn-dark float-right"
              >Listado <i class="fas fa-arrow-left-long"></i
            ></router-link>
          </div>
          <div class="card-body">
            <form
              class="forms-sample"
              role="form"
              @submit.prevent="createClass()"
            >
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="day">Day</label>
                    <select class="form-control" v-model="day">
                      <option v-for="day in days" :value="day.name" :key="day.id">
                        {{ day.name }}
                      </option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="cHour">Hora</label>
                    <input type="time" class="form-control" v-model="cHour" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="teacher_id">Profesor</label>
                    <select class="form-control" v-model="teacher_id">
                      <option value="1">1</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="subject_id">Materia</label>
                    <select class="form-control" v-model="subject_id">
                      <option value="1">1</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <button class="btn btn-success float-right" type="submit">
                    Agregar
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "ClassCreateComponent",
  data() {
    return {
      day: "",
      cHour: "",
      teacher_id: "",
      subject_id: "",
      days: [
        { id: 1, name: "Lunes" },
        { id: 2, name: "Martes" },
        { id: 3, name: "Miercoles" },
        { id: 4, name: "Jueves" },
        { id: 5, name: "Viernes" },
        { id: 6, name: "Sabado" },
      ],
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    getTeachers() {
      axios.get("/api/teachers").then((response) => {
        this.teachers = response.data;
      });
    },
  }
};
</script>