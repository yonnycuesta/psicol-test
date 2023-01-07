<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-sm-8">
        <div class="card">
          <div class="card-header">
            Nueva Clase
            <router-link href="#" to="/classes" class="btn btn-dark float-right"
              >Listado <i class="fas fa-arrow-left-long"></i></router-link
            >
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
                    <input type="text" class="form-control" v-model="day" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="cHour">Hora</label>
                    <input
                      type="text"
                      class="form-control"
                      v-model="cHour"
                    />
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
        };
    },
}
</script>