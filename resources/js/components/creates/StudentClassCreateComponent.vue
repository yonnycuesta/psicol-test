<template>
    <div class="container">
 <div class="row justify-content-center">
      <div class="col-md-8 col-sm-8">
        <div class="card">
          <div class="card-header">
            Nueva Clase
            <router-link href="#" to="/students" class="btn btn-dark float-right"
              >Anterior <i class="fas fa-arrow-left-long"></i
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
                    <label for="studentId">Estudiante</label>
                    <select class="form-control form-select" v-model="studentId">
                      <option> 1</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="stClass">Clase</label>
                    <select
                      class="form-control form-select"
                      v-model="stClassId">
                      <option>
                        2
                      </option>
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
    name: "StudentClassCreateComponent",
    data() {
        return {
            studentId: "",
            stClassId: "",
        };
    },
}
</script>