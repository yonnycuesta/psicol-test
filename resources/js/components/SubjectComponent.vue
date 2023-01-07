<template>
  <div class="container">
    <div class="row justify-content-center">
      <!-- <div class="col-md-10">
        <div class="card">
          <div class="card-header">Estudiante Component</div>
          <div class="card-body">
            I'm a subject component. Soy un componente de estudiante.
            {{ name }}
            <input type="text" v-model="name" class="form-control" />
          </div>
        </div>
      </div> -->
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Listado de Materias</div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Código</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Descripción</th>
                  <th scope="col">Créditos</th>
                  <th scope="col">Área de conocimiento</th>
                  <th scope="col">Tipo</th>
                  <th scope="col">Profesor</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="subject in subjects" :key="subject.id">
                    <td>{{ subject.code }}</td>
                    <td>{{ subject.name }}</td>
                    <td>{{ subject.description }}</td>
                    <td>{{ subject.credits }}</td>
                    <td>{{ subject.knowledge_area }}</td>
                    <td>
                        <span v-if="subject.type == 'obligatory'" class="text-danger">Obligatoria</span>
                        <span v-else class="text-success">Electiva</span>
                    </td>
                    <td>{{ subject.teacher.name }}</td>
                    <td>
                        <a href="#" class="btn btn-danger m-1" title="Eliminar Materia">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
              </tbody>
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
  name: "SubjectComponent",
  data() {
    return {
      name: "",
      subjects: [],
    };
  },
  mounted() {
    this.getSubjects();
  },
  methods: {
    getSubjects() {
      axios
        .get("/subjects")
        .then((response) => {
          this.subjects = response.data.subjects;
          console.log(this.subjects);
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>